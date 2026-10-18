<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Perusahaan;

class PengajuanController extends Controller
{
    public function index()
    {
        // Hanya tampilkan pengajuan dengan status pending
        $bookings = Booking::with('siswa','perusahaan')
                            ->where('status', 'pending')
                            ->latest()
                            ->get();
        
        // Hitung booking yang sudah diterima
        $diterima = Booking::where('status', 'diterima')->count();
        
        // Total semua pengajuan
        $totalPengajuan = Booking::count();
        
        return view('admin.Pengajuan.index', compact('bookings', 'diterima', 'totalPengajuan'));
    }

    public function aktif()
    {
        // Tampilkan siswa yang sedang melakukan PKL (status diterima)
        $bookings = Booking::with('siswa','perusahaan')
                            ->where('status', 'diterima')
                            ->latest()
                            ->get();
        return view('admin.Pengajuan.aktif', compact('bookings'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:diterima,ditolak',
        ]);
        $booking = Booking::findOrFail($id);
        $perusahaan = $booking->perusahaan;

        // Jika status diubah menjadi diterima
        if ($request->status === 'diterima') {
            // Cek kuota
            if ($perusahaan->kuota < 1) {
                return redirect()->back()->with('error', 'Kuota perusahaan sudah habis!');
            }
            // Jika sebelumnya bukan diterima, baru kurangi kuota
            if ($booking->status !== 'diterima') {
                $perusahaan->kuota -= 1;
                $perusahaan->save();
            }
        }
        // Jika status diubah menjadi ditolak dan sebelumnya diterima, kembalikan kuota
        elseif ($request->status === 'ditolak' && $booking->status === 'diterima') {
            $perusahaan->kuota += 1;
            $perusahaan->save();
        }

        $booking->status = $request->status;
        $booking->save();
        
        // Jika dari halaman aktif, redirect kembali ke halaman aktif
        if ($request->filled('from') && $request->input('from') === 'aktif') {
            return redirect()->route('admin.pengajuan.aktif')->with('success', 'Status booking diperbarui!');
        }
        
        return redirect()->route('admin.pengajuan.index')->with('success', 'Status booking diperbarui!');
    }
}
