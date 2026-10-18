<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use App\Models\Perusahaan;
use App\Models\Pengajuan;

class DashboardController extends Controller
{
    public function index()
    {
        $totalSiswa        = Siswa::count();
        $totalPerusahaan   = Perusahaan::count();
        $totalPengajuan    = Pengajuan::count();
        $pengajuanMenunggu = Pengajuan::where('status','menunggu')->count();
        $pklAktif          = Pengajuan::where('status','diterima')->count();

        $pengajuanTerbaru = Pengajuan::with(['siswa','perusahaan'])
                                ->latest()
                                ->limit(5)
                                ->get();

        $statJurusan = Siswa::selectRaw('jurusan, COUNT(*) as total')
                        ->groupBy('jurusan')
                        ->get();

        return view('admin.dashboard', compact(
            'totalSiswa',
            'totalPerusahaan',
            'totalPengajuan',
            'pengajuanMenunggu',
            'pklAktif',
            'pengajuanTerbaru',
            'statJurusan'
        ));
    }
}
