<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * SISTEM PKL (PRAKTIK KERJA LAPANGAN)
 * 
 * Cara Kerja Sistem:
 * 1. SISWA mengajukan pengajuan PKL dengan memilih perusahaan dan guru pembimbing melalui aplikasi
 * 2. WALI KELAS melihat data siswa di kelasnya dan status pengajuan mereka, dapat memberikan persetujuan awal
 * 3. KAKONSLI (Konselor) memonitor seluruh siswa di sekolah dan status PKL mereka
 * 4. KAPROG melihat data siswa jurusan PPLG dan status booking PKL mereka
 * 5. ADMIN mengelola semua data siswa, guru, perusahaan, dan approve/reject pengajuan PKL
 * 6. Setelah approve dari admin, siswa bisa mulai magang di perusahaan tersebut
 * 
 * Status Booking yang ada:
 * - PENDING: Pengajuan sedang menunggu persetujuan admin
 * - DITERIMA: Pengajuan sudah disetujui, siswa bisa mulai PKL
 * - DITOLAK: Pengajuan ditolak oleh admin
 * 
 * Fitur Utama:
 * - Dashboard untuk monitoring status PKL semua siswa
 * - Grafik visualisasi status pengajuan dan distribusi siswa
 * - Table data siswa dengan pencarian dan filter
 * - Form pengajuan PKL yang mudah digunakan
 * - Laporan PDF untuk export data siswa
 */

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
