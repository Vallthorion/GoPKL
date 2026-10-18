<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Booking;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
 public function index()
{
    $user = auth()->user();
    $guru = $user->guru;

    // Ambil seluruh siswa wali kelas / guru
    $siswas = $guru->siswas()
        ->with(['bookings', 'user'])
        ->get();

    $siswaIds = $siswas->pluck('id');

    // =========================
    // STATISTIK DASHBOARD
    // =========================

    $totalSiswa = $siswas->count();

    // Total siswa yang sedang diterima PKL (dari siswa yang diasuh wali kelas)
    $siswaSedangPKL = $siswas->filter(function($siswa) {
        return $siswa->bookings->where('status', 'diterima')->count() > 0;
    })->count();

    $pengajuanMenunggu = Booking::whereIn('siswa_id', $siswaIds)
        ->where('status', 'pending')
        ->count();

    $pengajuanDitolak = Booking::whereIn('siswa_id', $siswaIds)
        ->where('status', 'ditolak')
        ->count();

    // =========================
    // DATA TABEL BOOKING
    // =========================

    $bookings = Booking::with(['siswa', 'perusahaan'])
        ->whereIn('siswa_id', $siswaIds)
        ->latest()
        ->get();

    // =========================
    // CHART STATUS BOOKING
    // =========================

    $statusCounts = [
        'pending' => Booking::whereIn('siswa_id', $siswaIds)
            ->where('status', 'pending')
            ->count(),

        'diterima' => Booking::whereIn('siswa_id', $siswaIds)
            ->where('status', 'diterima')
            ->count(),

        'ditolak' => Booking::whereIn('siswa_id', $siswaIds)
            ->where('status', 'ditolak')
            ->count(),
    ];

    // =========================
    // CHART STATUS PKL SISWA
    // =========================

    $pendingSiswa = Booking::whereIn('siswa_id', $siswaIds)
        ->where('status', 'pending')
        ->distinct()
        ->count('siswa_id');

    $diterimaSiswa = Booking::whereIn('siswa_id', $siswaIds)
        ->where('status', 'diterima')
        ->distinct()
        ->count('siswa_id');

    $ditolakSiswa = Booking::whereIn('siswa_id', $siswaIds)
        ->where('status', 'ditolak')
        ->distinct()
        ->count('siswa_id');

    $sudahApply = Booking::whereIn('siswa_id', $siswaIds)
        ->distinct()
        ->count('siswa_id');

    $pklStatus = [
        'pending' => $pendingSiswa,
        'diterima' => $diterimaSiswa,
        'ditolak' => $ditolakSiswa,
        'belum' => max(0, $totalSiswa - $sudahApply),
    ];

    // =========================
    // CANDLESTICK CHART
    // =========================

    $candleData = [];

    for ($i = 29; $i >= 0; $i--) {

        $date = now()->subDays($i);

        $pending = Booking::whereIn('siswa_id', $siswaIds)
            ->where('status', 'pending')
            ->whereDate('created_at', $date)
            ->count();

        $diterima = Booking::whereIn('siswa_id', $siswaIds)
            ->where('status', 'diterima')
            ->whereDate('created_at', $date)
            ->count();

        $ditolak = Booking::whereIn('siswa_id', $siswaIds)
            ->where('status', 'ditolak')
            ->whereDate('created_at', $date)
            ->count();

        $total = $pending + $diterima + $ditolak;

        if ($total > 0) {
            $candleData[] = [
                'x' => $date->format('d M'),
                'y' => [
                    $pending,
                    max($pending, $diterima, $ditolak, $total),
                    min($pending, $diterima, $ditolak),
                    $total
                ]
            ];
        }
    }

    return view('guru.dashboard', compact(
        'guru',
        'siswas',
        'bookings',
        'totalSiswa',
        'siswaSedangPKL',
        'pengajuanMenunggu',
        'pengajuanDitolak',
        'statusCounts',
        'pklStatus',
        'candleData'
    ));
}

    
    

    public function siswa()
    {
        $user = auth()->user();
        $guru = $user->guru;

        $siswas = $guru->siswas()
            ->with(['user', 'bookings'])
            ->paginate(15);

        return view('guru.siswa.index', [
            'guru' => $guru,
            'siswas' => $siswas,
        ]);
    }

    public function siswaDetail($id)
    {
        $user = auth()->user();
        $guru = $user->guru;

        $siswa = $guru->siswas()
            ->with(['user', 'bookings', 'bookings.perusahaan'])
            ->findOrFail($id);

        $bookings = $siswa->bookings()->with('perusahaan')->get();

        return view('guru.siswa.detail', [
            'guru' => $guru,
            'siswa' => $siswa,
            'bookings' => $bookings,
        ]);
    }
}
