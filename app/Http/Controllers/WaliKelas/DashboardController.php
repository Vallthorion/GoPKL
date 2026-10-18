<?php

namespace App\Http\Controllers\WaliKelas;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $guru = Guru::where('user_id', $user->id)->firstOrFail();

        // ==========================
        // DATA SISWA WALI KELAS
        // ==========================
        $siswasQuery = Siswa::where('guru_id', $guru->id);

        $totalSiswa = $siswasQuery->count();

        // Tabel tetap pagination
        $siswas = $siswasQuery->paginate(10);

        // ==========================
        // DATA GLOBAL UNTUK GRAFIK
        // ==========================

        // Semua siswa wali kelas
        $allSiswas = Siswa::where('guru_id', $guru->id)
            ->with('bookings')
            ->get();

        $allSiswaIds = $allSiswas->pluck('id')->toArray();

        // Grafik Status Booking
        $statusCounts = [
            'pending' => Booking::whereIn('siswa_id', $allSiswaIds)
                ->where('status', 'pending')
                ->count(),

            'diterima' => Booking::whereIn('siswa_id', $allSiswaIds)
                ->where('status', 'diterima')
                ->count(),

            'ditolak' => Booking::whereIn('siswa_id', $allSiswaIds)
                ->where('status', 'ditolak')
                ->count(),
        ];

        // Total siswa sedang PKL
        $siswaSedangPKL = $allSiswas->filter(function ($s) {
            return $s->bookings->where('status', 'diterima')->count() > 0;
        })->count();

        // Grafik Status PKL
        $pklStatus = [
            'pending' => $allSiswas->filter(function ($s) {
                return $s->bookings->where('status', 'pending')->count() > 0;
            })->count(),

            'diterima' => $siswaSedangPKL,

            'ditolak' => $allSiswas->filter(function ($s) {
                return $s->bookings->where('status', 'ditolak')->count() > 0;
            })->count(),

            'belum' => $allSiswas->filter(function ($s) {
                return $s->bookings->count() == 0;
            })->count(),
        ];

        // ==========================
        // CANDLESTICK CHART
        // ==========================
        $candleData = [];

        for ($i = 29; $i >= 0; $i--) {

            $date = now()->subDays($i);

            $pending = Booking::whereIn('siswa_id', $allSiswaIds)
                ->where('status', 'pending')
                ->whereDate('created_at', $date->toDateString())
                ->count();

            $diterima = Booking::whereIn('siswa_id', $allSiswaIds)
                ->where('status', 'diterima')
                ->whereDate('created_at', $date->toDateString())
                ->count();

            $ditolak = Booking::whereIn('siswa_id', $allSiswaIds)
                ->where('status', 'ditolak')
                ->whereDate('created_at', $date->toDateString())
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

        return view(
            'wali-kelas.dashboard',
            compact(
                'guru',
                'siswas',
                'totalSiswa',
                'siswaSedangPKL',
                'statusCounts',
                'pklStatus',
                'candleData'
            )
        );
    }

    public function siswa()
    {
        $user = Auth::user();
        $guru = Guru::where('user_id', $user->id)->firstOrFail();

        // Get filter status from query parameter
        $pklStatus = request('status', '');

        // Query siswa yang diajar oleh wali kelas ini
        $query = Siswa::where('guru_id', $guru->id);

        // Filter berdasarkan status PKL
        if ($pklStatus === 'active') {
            // Active: ada booking dengan status 'diterima'
            $query->whereHas('bookings', function ($q) {
                $q->where('status', 'diterima');
            });
        } elseif ($pklStatus === 'inactive') {
            // Inactive: tidak ada booking dengan status 'diterima' (pending, ditolak, atau belum apply)
            $query->whereDoesntHave('bookings', function ($q) {
                $q->where('status', 'diterima');
            });
        }

        $siswas = $query->paginate(10)->appends(request()->query());

        return view('wali-kelas.siswa.index', compact('guru', 'siswas', 'pklStatus'));
    }

    public function siswaDetail($id)
    {
        $user = Auth::user();
        $guru = Guru::where('user_id', $user->id)->firstOrFail();

        $siswa = Siswa::findOrFail($id);

        // Pastikan siswa ini adalah siswa dari wali kelas ini
        if ($siswa->guru_id !== $guru->id) {
            abort(403, 'Unauthorized');
        }

        // Ambil booking siswa
        $bookings = $siswa->bookings()->latest()->get();

        return view('wali-kelas.siswa.detail', compact('guru', 'siswa', 'bookings'));
    }
}
