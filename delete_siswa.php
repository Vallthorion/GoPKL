<?php

require __DIR__ . '/bootstrap/app.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(\Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Siswa;

// Cari siswa dari kelas XII SIJA 1 dan XII SIJA 2
$siswas = Siswa::whereIn('kelas', ['XII SIJA 1', 'XII SIJA 2'])->get();

echo "📋 Siswa yang akan dihapus:\n";
foreach ($siswas as $siswa) {
    echo "- {$siswa->nis}: {$siswa->nama} ({$siswa->kelas})\n";
}

echo "\n";

// Hapus data
$count = 0;
foreach ($siswas as $siswa) {
    if ($siswa->user) {
        $siswa->user->delete();
    }
    $siswa->delete();
    $count++;
}

echo "✅ Berhasil menghapus $count siswa dari XII SIJA 1 dan XII SIJA 2\n";
