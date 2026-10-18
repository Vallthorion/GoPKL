<?php

// app/Http/Controllers/Admin/PerusahaanController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PerusahaanController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search', '');
        
        $query = Perusahaan::latest();
        
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nama_perusahaan', 'LIKE', '%' . $search . '%')
                  ->orWhere('bidang', 'LIKE', '%' . $search . '%')
                  ->orWhere('jurusan_dibutuhkan', 'LIKE', '%' . $search . '%');
            });
        }
        
        // Hitung total dari semua perusahaan (sebelum pagination)
        $totalPerusahaan = (clone $query)->count();
        $totalKuota = (clone $query)->sum('kuota');
        
        $perusahaans = $query->paginate(6);
        
        // Jika request adalah AJAX, kembalikan hanya list partial
        if ($request->ajax()) {
            return view('admin.perusahaan.table-list', compact('perusahaans'))->render();
        }
        
        return view('admin.perusahaan.index', compact('perusahaans', 'totalPerusahaan', 'totalKuota'));
    }

    public function create()
    {
        return view('admin.perusahaan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_perusahaan' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
            'bidang' => 'required',
            'jurusan_dibutuhkan' => 'required|array',
            'kuota' => 'required|integer|min:1',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();
        $data['jurusan_dibutuhkan'] = json_encode($data['jurusan_dibutuhkan']);
        
        // Set default empty string for deskripsi if not provided
        if (empty($data['deskripsi'])) {
            $data['deskripsi'] = '';
        }

        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $folder = public_path('image/perusahaan');
            if (!File::exists($folder)) {
                File::makeDirectory($folder, 0755, true);
            }
            $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move($folder, $filename);
            $data['gambar'] = $filename;
        }

        Perusahaan::create($data);

        return redirect()->route('admin.perusahaan.index')
            ->with('success', '✓ Perusahaan ' . $request->nama_perusahaan . ' berhasil ditambahkan!');
    }

    public function show(Perusahaan $perusahaan)
    {
        return redirect()->route('admin.perusahaan.edit', $perusahaan);
    }

    public function edit(Perusahaan $perusahaan)
    {
        return view('admin.perusahaan.edit', compact('perusahaan'));
    }

    public function update(Request $request, Perusahaan $perusahaan)
    {
        $request->validate([
            'nama_perusahaan' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
            'bidang' => 'required',
            'jurusan_dibutuhkan' => 'required|array',
            'kuota' => 'required|integer|min:1',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();
        $data['jurusan_dibutuhkan'] = json_encode($data['jurusan_dibutuhkan']);
        
        // Set default empty string for deskripsi if not provided
        if (empty($data['deskripsi'])) {
            $data['deskripsi'] = '';
        }

        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $folder = public_path('image/perusahaan');
            if (!File::exists($folder)) {
                File::makeDirectory($folder, 0755, true);
            }
            $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move($folder, $filename);

            if ($perusahaan->gambar && File::exists($folder . '/' . $perusahaan->gambar)) {
                File::delete($folder . '/' . $perusahaan->gambar);
            }

            $data['gambar'] = $filename;
        }

        $perusahaan->update($data);

        return redirect()->route('admin.perusahaan.index')
            ->with('success', '✓ Data perusahaan ' . $request->nama_perusahaan . ' berhasil diperbarui!');
    }

    public function destroy(Perusahaan $perusahaan)
    {
        $nama = $perusahaan->nama_perusahaan;
        $perusahaan->delete();

        return redirect()->route('admin.perusahaan.index')
            ->with('success', '✓ Perusahaan ' . $nama . ' berhasil dihapus!');
    }

    public function exportPdf()
    {
        $perusahaans = Perusahaan::latest()->get();
        $totalPerusahaan = $perusahaans->count();
        $totalKuota = $perusahaans->sum('kuota');

        return view('admin.perusahaan.pdf-export', compact('perusahaans', 'totalPerusahaan', 'totalKuota'));
    }
}

