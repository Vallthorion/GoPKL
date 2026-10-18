<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Siswa;
use App\Models\Perusahaan;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        // Get siswa data berdasarkan user yang login
        $siswa = Siswa::where('user_id', $user->id)->firstOrFail();
        
        // Get semua data perusahaan
        $perusahaans = Perusahaan::all();
        
        $approvedBooking = Booking::where('siswa_id', $siswa->id)
            ->where('status', 'diterima')
            ->first();

        $pengajuanAktif = Booking::where('siswa_id', $siswa->id)
            ->whereIn('status', ['pending', 'diterima'])
            ->count();
        
        return view('siswa.dashboard', [
            'siswa' => $siswa,
            'perusahaans' => $perusahaans,
            'approvedBooking' => $approvedBooking,
            'pengajuanAktif' => $pengajuanAktif,
        ]);
    }
}
