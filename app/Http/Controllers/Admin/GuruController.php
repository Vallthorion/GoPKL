<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class GuruController extends Controller
{
    // =========================
    // READ + SEARCH
    // =========================
    public function index(Request $request)
    {
        $search = $request->query('search');
        $type = $request->query('type');
        $query = Guru::with('user');

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('nama', 'like', '%' . $search . '%')
                  ->orWhere('nip', 'like', '%' . $search . '%');
            });
        }
        if ($type) {
            $query->where('type', $type);
        }
        
        $gurus = $query->orderBy('nama')->paginate(10);
        
        return view('admin.guru.index', compact('gurus', 'search', 'type'));
    }

    // =========================
    // CREATE
    // =========================
    public function create()
    {
        return view('admin.guru.create');
    }

    // =========================
    // STORE
    // =========================
    public function store(Request $request)
    {
        $request->validate([
            'nip'    => 'required|unique:gurus,nip',
            'nama'   => 'required|min:3',
            'type'   => 'required|in:wali_kelas,kakomsli,kaprog_pplg',
            'kelas'  => 'nullable|string',
        ]);

        DB::transaction(function () use ($request) {
            $username = $request->nip;
            
            // Cek apakah username sudah ada
            $existingUser = User::where('username', $username)->first();
            if ($existingUser) {
                throw new \Exception('NIP sudah terdaftar sebagai username');
            }

            $user = User::create([
                'username' => $username,
                'password' => Hash::make($username),
                'role'     => 'guru',
            ]);

            Guru::create([
                'user_id' => $user->id,
                'nip'     => $request->nip,
                'nama'    => $request->nama,
                'type'    => $request->type,
                'kelas'   => $request->kelas,
            ]);
        });

        return redirect()->route('admin.guru.index')
            ->with('success', '✓ Guru ' . $request->nama . ' berhasil ditambahkan!');
    }

    // =========================
    // EDIT
    // =========================
    public function edit(Guru $guru)
    {
        return view('admin.guru.edit', compact('guru'));
    }

    // =========================
    // UPDATE
    // =========================
    public function update(Request $request, Guru $guru)
    {
        $request->validate([
            'nip'    => 'required|unique:gurus,nip,' . $guru->id,
            'nama'   => 'required|min:3',
            'type'   => 'required|in:wali_kelas,kakomsli,kaprog_pplg',
            'kelas'  => 'nullable|string',
        ]);

        $guru->update([
            'nip'  => $request->nip,
            'nama' => $request->nama,
            'type' => $request->type,
            'kelas' => $request->kelas,
        ]);

        return redirect()->route('admin.guru.index')
            ->with('success', '✓ Data guru ' . $request->nama . ' berhasil diperbarui!');
    }

    // =========================
    // DELETE
    // =========================
    public function destroy(Guru $guru)
    {
        $nama = $guru->nama;
        
        DB::transaction(function () use ($guru) {
            $guru->user->delete();
            $guru->delete();
        });

        return redirect()->route('admin.guru.index')
            ->with('success', '✓ Guru ' . $nama . ' berhasil dihapus!');
    }

    // =========================
    // EXPORT PDF
    // =========================
    public function exportPdf(Request $request)
    {
        $search = $request->query('search');
        $type = $request->query('type');
        $query = Guru::with('user')->orderBy('nama');

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('nama', 'like', '%' . $search . '%')
                  ->orWhere('nip', 'like', '%' . $search . '%');
            });
        }
        
        if ($type) {
            $query->where('type', $type);
        }
        
        $gurus = $query->get();
        $exportDate = now()->format('d/m/Y H:i:s');
        
        return view('admin.guru.export-pdf', compact('gurus', 'exportDate', 'search', 'type'));
    }
}
