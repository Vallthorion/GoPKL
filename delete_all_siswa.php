<?php

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(\Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Siswa;

echo "🔍 Menghitung data siswa...\n";
$count = Siswa::count();

if ($count === 0) {
    echo "✅ Database sudah kosong, tidak ada data siswa.\n";
    exit;
}

echo "⚠️  Akan menghapus $count siswa...\n";

// Hapus semua siswa dan user-nya
$siswas = Siswa::all();
$deleted = 0;

foreach ($siswas as $siswa) {
    try {
        // Hapus user jika ada
        if ($siswa->user) {
            $siswa->user->delete();
        }
        // Hapus siswa
        $siswa->delete();
        $deleted++;
    } catch (\Exception $e) {
        echo "❌ Error menghapus siswa {$siswa->nis}: {$e->getMessage()}\n";
    }
}

echo "✅ Berhasil menghapus $deleted siswa dan user terkait!\n";
echo "📊 Sisa siswa di database: " . Siswa::count() . "\n";
