
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PerusahaanController;
use App\Http\Controllers\Admin\GuruController;
use App\Http\Controllers\Siswa\DashboardController as SiswaDashboardController;
use App\Http\Controllers\Guru\DashboardController as GuruDashboardController;
use App\Http\Controllers\WaliKelas\DashboardController as WaliKelasDashboardController;
use App\Http\Controllers\Kakomsli\DashboardController as KakomsliDashboardController;
use App\Http\Controllers\KaprogPplg\DashboardController as KaprogPplgDashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Halaman utama
Route::get('/', function () {
    return view('welcome');
});

// Routes autentikasi (tidak perlu middleware)
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Routes admin
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/pengajuan', [\App\Http\Controllers\Admin\PengajuanController::class, 'index'])->name('pengajuan.index');
    Route::get('/pengajuan/aktif', [\App\Http\Controllers\Admin\PengajuanController::class, 'aktif'])->name('pengajuan.aktif');
    Route::put('/pengajuan/{id}', [\App\Http\Controllers\Admin\PengajuanController::class, 'update'])->name('pengajuan.update');
    
    // Siswa routes - custom routes BEFORE resource
    Route::get('/siswa/export/csv', [SiswaController::class, 'export'])->name('siswa.export');
    Route::get('/siswa/export/pdf', [SiswaController::class, 'exportPdf'])->name('siswa.exportPdf');
    Route::get('/siswa/export/template', [SiswaController::class, 'exportTemplate'])->name('siswa.template');
    Route::get('/siswa/import', [SiswaController::class, 'importView'])->name('siswa.importView');
    Route::post('/siswa/import', [SiswaController::class, 'import'])->name('siswa.storeImport');
    Route::get('/siswa/search', [SiswaController::class, 'liveSearch'])->name('siswa.search');
    Route::resource('siswa', SiswaController::class, ['names' => 'siswa']);
    
    // Guru routes - custom routes BEFORE resource
    Route::get('/guru/export/pdf', [GuruController::class, 'exportPdf'])->name('guru.exportPdf');
    Route::resource('guru', GuruController::class, ['names' => 'guru']);
    
    // Perusahaan routes - custom routes BEFORE resource
    Route::get('/perusahaan/export/pdf', [PerusahaanController::class, 'exportPdf'])->name('perusahaan.exportPdf');
    Route::resource('perusahaan', PerusahaanController::class, ['names' => 'perusahaan']);
    Route::get('/laporan', [\App\Http\Controllers\Admin\LaporanController::class, 'index'])->name('laporan');
});

// Routes siswa
Route::middleware(['auth', 'role:siswa'])->prefix('siswa')->name('siswa.')->group(function () {
    Route::get('/dashboard', [SiswaDashboardController::class, 'index'])->name('dashboard');
    Route::get('/booking', [\App\Http\Controllers\Siswa\BookingController::class, 'index'])->name('booking.index');
    Route::get('/booking/status', [\App\Http\Controllers\Siswa\BookingController::class, 'status'])->name('booking.status');
    Route::post('/booking', [\App\Http\Controllers\Siswa\BookingController::class, 'store'])->name('booking.store');
    Route::get('/booking/{perusahaan}', [\App\Http\Controllers\Siswa\BookingController::class, 'konfirmasi'])->name('booking.konfirmasi');
    Route::post('/booking/{perusahaan}', [\App\Http\Controllers\Siswa\BookingController::class, 'ajukan'])->name('booking.ajukan');
    Route::get('/booking/detail/{id}', [\App\Http\Controllers\Siswa\BookingController::class, 'detail'])->name('booking.detail');
});

// Routes guru
Route::middleware(['auth', 'role:guru'])->prefix('guru')->name('guru.')->group(function () {
    Route::get('/dashboard', [GuruDashboardController::class, 'index'])->name('dashboard');
    Route::get('/siswa', [GuruDashboardController::class, 'siswa'])->name('siswa.index');
    Route::get('/siswa/{id}', [GuruDashboardController::class, 'siswaDetail'])->name('siswa.detail');
});

// Routes wali kelas
Route::middleware(['auth', 'role:guru', 'guru.type:wali_kelas'])->prefix('wali-kelas')->name('wali.')->group(function () {
    Route::get('/dashboard', [WaliKelasDashboardController::class, 'index'])->name('dashboard');
    Route::get('/siswa', [WaliKelasDashboardController::class, 'siswa'])->name('siswa.index');
    Route::get('/siswa/{id}', [WaliKelasDashboardController::class, 'siswaDetail'])->name('siswa.detail');
});

// Routes kakomsli
Route::middleware(['auth', 'role:guru', 'guru.type:kakomsli'])->prefix('kakomsli')->name('kakomsli.')->group(function () {
    Route::get('/dashboard', [KakomsliDashboardController::class, 'index'])->name('dashboard');
    Route::get('/siswa', [KakomsliDashboardController::class, 'siswa'])->name('siswa.index');
    Route::get('/siswa/export/pdf', [KakomsliDashboardController::class, 'exportPdf'])->name('siswa.exportPdf');
    Route::get('/siswa/{id}', [KakomsliDashboardController::class, 'siswaDetail'])->name('siswa.detail');
});

// Routes kaprog_pplg
Route::middleware(['auth', 'role:guru', 'guru.type:kaprog_pplg'])->prefix('kaprog-pplg')->name('kaprog_pplg.')->group(function () {
    Route::get('/dashboard', [KaprogPplgDashboardController::class, 'index'])->name('dashboard');
    Route::get('/siswa', [KaprogPplgDashboardController::class, 'siswa'])->name('siswa.index');
    Route::get('/siswa/export/pdf', [KaprogPplgDashboardController::class, 'exportPdf'])->name('siswa.exportPdf');
    Route::get('/siswa/{id}', [KaprogPplgDashboardController::class, 'siswaDetail'])->name('siswa.detail');
});