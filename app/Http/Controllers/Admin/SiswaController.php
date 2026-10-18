<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    // =========================
    // READ + SEARCH (NORMAL)
    // =========================
    public function index(Request $request)
    {
        $search = $request->query('search');
        $kelas = $request->query('kelas');
        $query = Siswa::with('guru')->withCount(['bookings as aktif_count' => function($q) {
            $q->where('status', 'diterima');
        }]);

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('nama', 'like', '%' . $search . '%')
                  ->orWhere('nis', 'like', '%' . $search . '%')
                  ->orWhere('jurusan', 'like', '%' . $search . '%')
                  ->orWhere('kelas', 'like', '%' . $search . '%');
            });
        }
        if ($kelas) {
            $query->where('kelas', $kelas);
        }
        $siswas = $query->orderBy('nama')->paginate(10);
        
        // Jika AJAX request, return partial view
        if ($request->ajax() || $request->header('X-Requested-With') === 'XMLHttpRequest') {
            return view('admin.siswa.table', compact('siswas'));
        }
        
        return view('admin.siswa.index', compact('siswas', 'search'));
    }

    // =========================
    // LIVE SEARCH
    // =========================
    public function liveSearch(Request $request)
    {
        $search = $request->query('search', '');
        
        $siswas = Siswa::with('guru')->where('nama', 'like', '%' . $search . '%')
                       ->orWhere('nis', 'like', '%' . $search . '%')
                       ->orWhere('jurusan', 'like', '%' . $search . '%')
                       ->orWhere('kelas', 'like', '%' . $search . '%')
                       ->orderBy('nama')
                       ->get();
        
        return response()->json($siswas);
    }


    // =========================
    // CREATE
    // =========================
    public function create()
    {
        $waliKelas = \App\Models\Guru::where('type', 'wali_kelas')->get();
        return view('admin.siswa.create', compact('waliKelas'));
    }

    // =========================
    // STORE
    // =========================
    public function store(Request $request)
    {
        $request->validate([
            'nis'            => 'required|unique:siswas,nis|unique:users,username',
            'nama'           => 'required',
            'jenis_kelamin'  => 'required|in:Laki-laki,Perempuan',
            'jurusan'        => 'required',
            'kelas'          => 'required',
            'guru_id'        => 'nullable|exists:gurus,id',
        ]);

        DB::transaction(function () use ($request) {
            $user = User::create([
                'username' => $request->nis,
                'password' => Hash::make($request->nis),
                'role'     => 'siswa',
            ]);

            Siswa::create([
                'user_id'        => $user->id,
                'nis'            => $request->nis,
                'nama'           => $request->nama,
                'jenis_kelamin'  => $request->jenis_kelamin,
                'jurusan'        => $request->jurusan,
                'kelas'          => $request->kelas,
                'guru_id'        => $request->guru_id,
            ]);
        });

        return redirect()->route('admin.siswa.index')->with('success', '✓ Siswa ' . $request->nama . ' berhasil ditambahkan!');
    }

    // =========================
    // EDIT
    // =========================
    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        $waliKelas = \App\Models\Guru::where('type', 'wali_kelas')->get();
        return view('admin.siswa.edit', compact('siswa', 'waliKelas'));
    }

    // =========================
    // UPDATE
    // =========================
    public function update(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);

        $request->validate([
            'nis'            => 'required|unique:siswas,nis,' . $siswa->id,
            'nama'           => 'required',
            'jenis_kelamin'  => 'required|in:Laki-laki,Perempuan',
            'jurusan'        => 'required',
            'kelas'          => 'required',
            'guru_id'        => 'nullable|exists:gurus,id',
        ]);

        DB::transaction(function () use ($request, $siswa) {
            $siswa->user->update([
                'username' => $request->nis,
                'password' => Hash::make($request->nis),
            ]);

            $siswa->update([
                'nis'            => $request->nis,
                'nama'           => $request->nama,
                'jenis_kelamin'  => $request->jenis_kelamin,
                'jurusan'        => $request->jurusan,
                'kelas'          => $request->kelas,
                'guru_id'        => $request->guru_id,
            ]);
        });

        return redirect()->route('admin.siswa.index')->with('success', '✓ Data siswa ' . $request->nama . ' berhasil diperbarui!');
    }

    // =========================
    // DELETE
    // =========================
    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);
        $nama = $siswa->nama;

        DB::transaction(function () use ($siswa) {
            $siswa->user->delete();
            $siswa->delete();
        });

        return redirect()->route('admin.siswa.index')->with('success', '✓ Data siswa ' . $nama . ' berhasil dihapus!');
    }

    // =========================
    // EXPORT
    // =========================
    public function export(Request $request)
    {
        $search = $request->query('search');
        $kelas = $request->query('kelas');
        $query = Siswa::query();
        
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('nama', 'like', '%' . $search . '%')
                  ->orWhere('nis', 'like', '%' . $search . '%')
                  ->orWhere('jurusan', 'like', '%' . $search . '%')
                  ->orWhere('kelas', 'like', '%' . $search . '%');
            });
        }
        
        if ($kelas) {
            $query->where('kelas', $kelas);
        }
        
        $siswas = $query->orderBy('nama')->get();
        
        // Create CSV content
        $filename = 'data_siswa_' . date('Y-m-d_His') . '.csv';
        $headers = array(
            "Content-type" => "text/csv; charset=UTF-8",
            "Content-Disposition" => "attachment; filename=$filename",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        );
        
        $callback = function() use ($siswas) {
            $file = fopen('php://output', 'w');
            fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF)); // UTF-8 BOM
            
            // Header row
            fputcsv($file, array('NIS', 'Nama', 'Jenis Kelamin', 'Kelas', 'Jurusan'), ';');
            
            // Data rows
            foreach ($siswas as $siswa) {
                fputcsv($file, array(
                    $siswa->nis,
                    $siswa->nama,
                    $siswa->jenis_kelamin ?? '-',
                    $siswa->kelas,
                    $siswa->jurusan
                ), ';');
            }
            
            fclose($file);
        };
        
        return response()->stream($callback, 200, $headers);
    }

    // =========================
    // EXPORT TEMPLATE
    // =========================
    public function exportTemplate()
    {
        $filename = 'template_siswa.csv';
        $headers = array(
            "Content-type" => "text/csv; charset=UTF-8",
            "Content-Disposition" => "attachment; filename=$filename",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        );
        
        $callback = function() {
            $file = fopen('php://output', 'w');
            fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF)); // UTF-8 BOM
            
            // Header row
            fputcsv($file, array('NIS', 'Nama', 'Jenis Kelamin', 'Kelas', 'Jurusan'), ';');
            
            // Sample rows
            fputcsv($file, array('12345', 'Contoh Nama Siswa 1', 'Laki-laki', 'XII SIJA 1', 'Sistem Informasi'), ';');
            fputcsv($file, array('12346', 'Contoh Nama Siswa 2', 'Perempuan', 'XII SIJA 1', 'Sistem Informasi'), ';');
            
            fclose($file);
        };
        
        return response()->stream($callback, 200, $headers);
    }

    // =========================
    // EXPORT PDF (Print to PDF)
    // =========================
    public function exportPdf(Request $request)
    {
        $search = $request->query('search');
        $kelas = $request->query('kelas');
        $query = Siswa::with(['bookings' => function($q) {
            $q->latest();
        }, 'bookings.perusahaan']);
        
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('nama', 'like', '%' . $search . '%')
                  ->orWhere('nis', 'like', '%' . $search . '%')
                  ->orWhere('jurusan', 'like', '%' . $search . '%')
                  ->orWhere('kelas', 'like', '%' . $search . '%');
            });
        }
        
        if ($kelas) {
            $query->where('kelas', $kelas);
        }
        
        $siswas = $query->orderBy('nama')->get();
        $exportDate = now()->format('d/m/Y H:i:s');
        
        return view('admin.siswa.export-pdf', compact('siswas', 'exportDate'));
    }

    // =========================
    // IMPORT VIEW
    // =========================
    public function importView()
    {
        return view('admin.siswa.import');
    }

    // =========================
    // IMPORT
    // =========================
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:csv,txt|max:5120',
        ], [
            'file.required' => 'File harus dipilih',
            'file.mimes' => 'File harus berformat CSV',
            'file.max' => 'Ukuran file maksimal 5MB',
        ]);

        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();
        $filePath = $file->store('temp');
        $fileFullPath = storage_path('app/' . $filePath);

        try {
            $rows = [];
            $errors = [];
            $successCount = 0;
            $rowNumber = 0;

            // Parse file CSV
            $rows = $this->parseCsvFile($fileFullPath);

            if (empty($rows)) {
                throw new \Exception('File tidak memiliki data atau format tidak valid');
            }

            // Process each row
            foreach ($rows as $row) {
                $rowNumber++;
                
                // Skip jika baris kosong
                if (empty(array_filter($row))) {
                    continue;
                }

                // Validasi kolom (minimal 4, maksimal 5)
                if (count($row) < 4) {
                    $errors[] = "Baris $rowNumber: Kolom tidak lengkap (minimal 4 kolom: NIS, Nama, Jenis Kelamin, Kelas, Jurusan)";
                    continue;
                }

                $nis = trim($row[0]);
                $nama = trim($row[1]);
                $jenis_kelamin = isset($row[2]) ? trim($row[2]) : '';
                $kelas = isset($row[3]) ? trim($row[3]) : '';
                $jurusan = isset($row[4]) ? trim($row[4]) : '';

                // Validasi data
                if (empty($nis)) {
                    $errors[] = "Baris $rowNumber: NIS tidak boleh kosong";
                    continue;
                }
                if (empty($nama)) {
                    $errors[] = "Baris $rowNumber: Nama tidak boleh kosong";
                    continue;
                }
                if (empty($jenis_kelamin) || !in_array($jenis_kelamin, ['Laki-laki', 'Perempuan'])) {
                    $errors[] = "Baris $rowNumber: Jenis kelamin harus 'Laki-laki' atau 'Perempuan'";
                    continue;
                }
                if (empty($kelas)) {
                    $errors[] = "Baris $rowNumber: Kelas tidak boleh kosong";
                    continue;
                }
                if (empty($jurusan)) {
                    $errors[] = "Baris $rowNumber: Jurusan tidak boleh kosong";
                    continue;
                }

                // Check NIS sudah ada
                if (Siswa::where('nis', $nis)->exists()) {
                    $errors[] = "Baris $rowNumber: NIS '$nis' sudah terdaftar";
                    continue;
                }

                // Insert data
                try {
                    DB::transaction(function () use ($nis, $nama, $jenis_kelamin, $kelas, $jurusan) {
                        $user = User::create([
                            'username' => $nis,
                            'password' => Hash::make($nis),
                            'role'     => 'siswa',
                        ]);

                        Siswa::create([
                            'user_id'        => $user->id,
                            'nis'            => $nis,
                            'nama'           => $nama,
                            'jenis_kelamin'  => $jenis_kelamin,
                            'kelas'          => $kelas,
                            'jurusan'        => $jurusan,
                        ]);
                    });

                    $successCount++;
                } catch (\Exception $e) {
                    $errors[] = "Baris $rowNumber: Gagal menyimpan data (" . $e->getMessage() . ")";
                }
            }

            // Cleanup
            unlink($fileFullPath);

            // Return hasil import
            return redirect()->route('admin.siswa.index')->with([
                'import_success' => $successCount,
                'import_errors' => $errors,
                'file_name' => $fileName,
            ]);

        } catch (\Exception $e) {
            unlink($fileFullPath);
            return redirect()->back()->withErrors(['file' => 'Error: ' . $e->getMessage()]);
        }
    }

    // =========================
    // PARSE CSV FILE
    // =========================
    private function parseCsvFile($filePath)
    {
        $rows = [];
        if (($handle = fopen($filePath, 'r')) !== false) {
            $header = null;
            $rowCount = 0;
            
            while (($row = fgetcsv($handle, 1000, ';')) !== false) {
                $rowCount++;
                
                // Skip header row
                if ($rowCount === 1) {
                    continue;
                }

                $rows[] = $row;
            }
            fclose($handle);
        }
        return $rows;
    }

    // =========================
    // NOTE: Excel file support removed - use CSV format instead
    // To convert Excel to CSV: Open in Excel/Sheets and export as CSV
    // =========================
}
