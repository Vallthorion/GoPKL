<?php

namespace App\Http\Controllers\Kakomsli;

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

    // Total siswa seluruh database
    $jumlahSiswa = Siswa::count();

    // Total siswa yang sedang PKL (status diterima)
    $jumlahSedangPKL = Siswa::whereHas('bookings', function ($q) {
        $q->where('status', 'diterima');
    })->count();

    // Tabel siswa tetap menggunakan pagination
    $siswas = Siswa::paginate(10);

    // Total booking seluruh database
    $totalBooking = Booking::count();

    // Statistik status booking
    $statusCounts = [
        'pending' => Booking::where('status', 'pending')->count(),
        'diterima' => Booking::where('status', 'diterima')->count(),
        'ditolak' => Booking::where('status', 'ditolak')->count(),
    ];

    // Distribusi siswa per kelas
    $kelasCounts = Siswa::select('kelas')
        ->selectRaw('COUNT(*) as count')
        ->groupBy('kelas')
        ->orderByRaw("CAST(SUBSTRING_INDEX(kelas, ' ', -1) AS UNSIGNED)")
        ->get();

    $kelasLabels = $kelasCounts->pluck('kelas')->toArray();
    $kelasData = $kelasCounts->pluck('count')->toArray();

    // Status PKL seluruh siswa
    $pklStatus = [
        'pending' => Siswa::whereHas('bookings', function ($q) {
            $q->where('status', 'pending');
        })->count(),

        'diterima' => Siswa::whereHas('bookings', function ($q) {
            $q->where('status', 'diterima');
        })->count(),

        'ditolak' => Siswa::whereHas('bookings', function ($q) {
            $q->where('status', 'ditolak');
        })->count(),

        'belum' => Siswa::doesntHave('bookings')->count(),
    ];

    // Data trend 30 hari
    $candleData = [];

    for ($i = 29; $i >= 0; $i--) {

        $date = now()->subDays($i);

        $pending = Booking::where('status', 'pending')
            ->whereDate('created_at', $date->toDateString())
            ->count();

        $diterima = Booking::where('status', 'diterima')
            ->whereDate('created_at', $date->toDateString())
            ->count();

        $ditolak = Booking::where('status', 'ditolak')
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
        'kakomsli.dashboard',
        compact(
            'guru',
            'siswas',
            'jumlahSiswa',
            'jumlahSedangPKL',
            'totalBooking',
            'statusCounts',
            'kelasLabels',
            'kelasData',
            'pklStatus',
            'candleData'
        )
    );
}
    public function siswa()
    {
        $user = Auth::user();
        $guru = Guru::where('user_id', $user->id)->firstOrFail();

        // Ambil filter kelas dan status PKL dari query parameter
        $selectedKelas = request('kelas', '');
        $pklStatus = request('status', '');

        // Query siswa dengan filter kelas (jika ada)
        $query = Siswa::query();
        if ($selectedKelas) {
            $query->where('kelas', $selectedKelas);
        }

        // Filter berdasarkan status PKL
        if ($pklStatus === 'active') {
            // Active: ada booking dengan status 'diterima'
            $query->whereHas('bookings', function ($q) {
                $q->where('status', 'diterima');
            });
        } elseif ($pklStatus === 'inactive') {
            // Inactive: tidak ada booking dengan status 'diterima'
            $query->whereDoesntHave('bookings', function ($q) {
                $q->where('status', 'diterima');
            });
        }

        // Urutkan berdasarkan nomor kelas, kemudian nama siswa
        $query->orderByRaw("CAST(SUBSTRING_INDEX(kelas, ' ', -1) AS UNSIGNED)")
            ->orderBy('nama');

        // Paginate hasil query dan preserve query parameters
        $siswas = $query->paginate(10)->appends(request()->query());

        // Ambil semua kelas yang unik untuk dropdown filter, diurutkan berdasarkan nomor kelas
        $allClasses = Siswa::distinct()
            ->pluck('kelas')
            ->sortBy(function ($kelas) {
                // Extract nomor dari "XII SIJA 1" -> 1
                preg_match('/\d+/', $kelas, $matches);
                return (int)($matches[0] ?? 999);
            })
            ->values();

        return view('kakomsli.siswa.index', compact('guru', 'siswas', 'allClasses', 'selectedKelas', 'pklStatus'));
    }

    public function siswaDetail($id)
    {
        $user = Auth::user();
        $guru = Guru::where('user_id', $user->id)->firstOrFail();

        $siswa = Siswa::findOrFail($id);

        // Ambil booking siswa
        $bookings = $siswa->bookings()->latest()->get();

        return view('kakomsli.siswa.detail', compact('guru', 'siswa', 'bookings'));
    }

    public function exportPdf()
    {
        $user = Auth::user();
        $guru = Guru::where('user_id', $user->id)->firstOrFail();

        // Ambil filter kelas dan status PKL dari query parameter
        $selectedKelas = request('kelas', '');
        $pklStatus = request('status', '');

        // Query siswa dengan filter kelas (jika ada)
        $query = Siswa::with(['bookings' => function ($q) {
            $q->latest();
        }, 'bookings.perusahaan']);

        if ($selectedKelas) {
            $query->where('kelas', $selectedKelas);
        }

        // Filter berdasarkan status PKL
        if ($pklStatus === 'active') {
            $query->whereHas('bookings', function ($q) {
                $q->where('status', 'diterima');
            });
        } elseif ($pklStatus === 'inactive') {
            $query->whereDoesntHave('bookings', function ($q) {
                $q->where('status', 'diterima');
            });
        }

        $siswas = $query->orderByRaw("CAST(SUBSTRING_INDEX(kelas, ' ', -1) AS UNSIGNED)")
            ->orderBy('nama')
            ->get();

        $allClasses = Siswa::distinct()
            ->pluck('kelas')
            ->sortBy(function ($kelas) {
                preg_match('/\d+/', $kelas, $matches);
                return (int)($matches[0] ?? 999);
            })
            ->values();

        $exportDate = now()->format('d/m/Y H:i:s');

        return view('kakomsli.siswa.export-pdf', compact('guru', 'siswas', 'allClasses', 'selectedKelas', 'pklStatus', 'exportDate'));
    }
}
