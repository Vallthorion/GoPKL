<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Booking;
use App\Models\Perusahaan;

class ResetPengajuan extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reset:pengajuan {kuota=10 : Kuota perusahaan setelah reset}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Hapus semua pengajuan (booking) dan reset kuota perusahaan';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Booking::truncate();
        $kuota = (int) $this->argument('kuota');
        Perusahaan::query()->update(['kuota' => $kuota]);
        $this->info('Semua pengajuan dihapus dan kuota perusahaan direset ke ' . $kuota);
    }
}
