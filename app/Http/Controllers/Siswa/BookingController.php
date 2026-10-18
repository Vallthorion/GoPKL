<?php
namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Perusahaan;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $siswa = $user->siswa;

        $approvedBooking = null;
        if ($siswa) {
            $approvedBooking = Booking::where('siswa_id', $siswa->id)
                ->where('status', 'diterima')
                ->with('perusahaan')
                ->first();
        }

        $perusahaans = Perusahaan::paginate(8); // Pagination perusahaan
        $bookings = collect();
        if ($siswa) {
            $bookings = Booking::where('siswa_id', $siswa->id)
                ->with('perusahaan')
                ->latest()
                ->paginate(8); // Pagination booking
        }
        return view('siswa.booking', compact('perusahaans', 'bookings', 'siswa', 'approvedBooking'));
    }

    public function status()
    {
        $user = Auth::user();
        $siswa = $user->siswa;

        $approvedBooking = Booking::where('siswa_id', $siswa->id)
            ->where('status', 'diterima')
            ->with('perusahaan')
            ->first();

        if (! $approvedBooking) {
            return redirect()->route('siswa.booking.index')
                ->with('error', 'Anda belum memiliki penerimaan PKL. Silakan ajukan booking terlebih dahulu.');
        }

        return view('siswa.status-pkl', compact('approvedBooking', 'siswa'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'perusahaan_id' => 'required|exists:perusahaans,id',
        ]);
        $user = Auth::user();
        $siswa = $user->siswa;
        $siswaId = $siswa ? $siswa->id : $user->id;
        
        // Cek apakah siswa sudah punya booking yang diterima (sudah PKL)
        $approvedBooking = Booking::where('siswa_id', $siswaId)
            ->where('status', 'diterima')
            ->first();
        if ($approvedBooking) {
            return redirect()->back()->with('error', 'Anda sudah diterima di sebuah perusahaan dan sedang melakukan PKL. Tidak dapat booking lagi.');
        }
        
        // Cek booking ke perusahaan yang sama
        $existingBooking = Booking::where('siswa_id', $siswaId)
            ->where('perusahaan_id', $request->perusahaan_id)
            ->first();
        if ($existingBooking) {
            return redirect()->route('siswa.booking.detail', $existingBooking->id)
                ->with('error', 'Anda sudah pernah booking ke perusahaan ini.');
        }
        // Hitung booking aktif (pending/diterima)
        $activeBookings = Booking::where('siswa_id', $siswaId)
            ->whereIn('status', ['pending', 'diterima'])
            ->count();
        if ($activeBookings >= 3) {
            return redirect()->back()->with('error', 'Anda hanya dapat memiliki maksimal 3 booking aktif.');
        }
        Booking::create([
            'siswa_id' => $siswaId,
            'perusahaan_id' => $request->perusahaan_id,
            'status' => 'pending',
        ]);
        return redirect()->route('siswa.booking.index')->with('success', 'Booking berhasil diajukan!');
    }

    // Halaman konfirmasi booking
    public function konfirmasi($perusahaan)
    {
        $perusahaan = Perusahaan::findOrFail($perusahaan);
        $user = Auth::user();
        $siswa = $user->siswa;
        $siswaId = $siswa ? $siswa->id : $user->id;

        $approvedBooking = Booking::where('siswa_id', $siswaId)
            ->where('status', 'diterima')
            ->first();

        if ($approvedBooking) {
            return redirect()->route('siswa.booking.index')
                ->with('error', 'Anda sudah diterima di sebuah perusahaan dan sedang melakukan PKL. Tidak dapat booking lagi.');
        }

        return view('siswa.konfirmasi-booking', compact('perusahaan', 'siswa'));
    }

    // Proses pengajuan booking dari halaman konfirmasi
    public function ajukan(Request $request, $perusahaan)
    {
        $perusahaan = Perusahaan::findOrFail($perusahaan);
        $user = Auth::user();
        $siswa = $user->siswa;
        $siswaId = $siswa ? $siswa->id : $user->id;
        
        // Cek apakah siswa sudah punya booking yang diterima (sudah PKL)
        $approvedBooking = Booking::where('siswa_id', $siswaId)
            ->where('status', 'diterima')
            ->first();
        if ($approvedBooking) {
            return redirect()->back()->with('error', 'Anda sudah diterima di sebuah perusahaan dan sedang melakukan PKL. Tidak dapat booking lagi.');
        }
        
        // Cek booking ke perusahaan yang sama
        $existingBooking = Booking::where('siswa_id', $siswaId)
            ->where('perusahaan_id', $perusahaan->id)
            ->first();
        if ($existingBooking) {
            return redirect()->route('siswa.booking.detail', $existingBooking->id)
                ->with('error', 'Anda sudah pernah booking ke perusahaan ini.');
        }
        // Cek kuota
        if ($perusahaan->kuota < 1) {
            return redirect()->back()->with('error', 'Kuota perusahaan sudah habis.');
        }
        // Hitung booking aktif (pending/diterima)
        $activeBookings = Booking::where('siswa_id', $siswaId)
            ->whereIn('status', ['pending', 'diterima'])
            ->count();
        if ($activeBookings >= 3) {
            return redirect()->back()->with('error', 'Anda hanya dapat memiliki maksimal 3 booking aktif.');
        }
        // Simpan pengajuan
        Booking::create([
            'siswa_id' => $siswaId,
            'perusahaan_id' => $perusahaan->id,
            'status' => 'pending',
        ]);
        return redirect()->route('siswa.booking.index')->with('success', 'Pengajuan booking berhasil diajukan, menunggu konfirmasi admin.');
    }

    // Halaman detail booking
    public function detail($id)
    {
        $booking = Booking::with(['perusahaan', 'siswa'])->findOrFail($id);
        $user = Auth::user();
        $siswa = $user->siswa;
        // Pastikan hanya siswa yang berhak bisa melihat
        if ($booking->siswa_id !== ($siswa ? $siswa->id : $user->id)) {
            abort(403, 'Unauthorized');
        }
        return view('siswa.detail-booking', compact('booking', 'siswa'));
    }
}
