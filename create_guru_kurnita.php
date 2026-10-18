<?php

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(\Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\User;
use App\Models\Guru;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

$nip = '198611182022212008';
$nama = 'Kurnita Listiani, S.Pd.';
$kelas = 'XII SIJA 1';

echo "🔍 Memeriksa guru dengan NIP: $nip\n";

// Check if guru already exists
$existingGuru = Guru::where('nip', $nip)->first();
if ($existingGuru) {
    echo "⚠️  Guru dengan NIP ini sudah ada\n";
    echo "  Nama: " . $existingGuru->nama . "\n";
    echo "  User ID: " . $existingGuru->user_id . "\n";
    exit;
}

echo "\n📝 Membuat guru baru...\n";

// Create user
$username = 'guru_' . substr($nip, -6);
$user = User::create([
    'username' => $username,
    'password' => Hash::make($nip),  // Use NIP as initial password
    'role' => 'guru',
]);

// Create guru record
$guru = Guru::create([
    'user_id' => $user->id,
    'nip' => $nip,
    'nama' => $nama,
    'type' => 'guru_mapel',  // guru mata pelajaran
]);

echo "✅ Guru berhasil dibuat!\n";
echo "  ID: " . $guru->id . "\n";
echo "  NIP: " . $guru->nip . "\n";
echo "  Nama: " . $guru->nama . "\n";
echo "  Username: " . $username . "\n";
echo "  Password awal: " . $nip . "\n";

// Get students in XII SIJA 1
echo "\n🔍 Mencari siswa di kelas $kelas...\n";
$siswas = DB::table('siswas')->where('kelas', $kelas)->get();

echo "📊 Ditemukan " . count($siswas) . " siswa di kelas $kelas\n";

if (count($siswas) > 0) {
    echo "\n📌 Mengaitkan guru dengan siswa...\n";
    $updated = DB::table('siswas')
        ->where('kelas', $kelas)
        ->update(['guru_id' => $guru->id]);
    
    echo "✅ $updated siswa telah diaitkan dengan guru ini\n";
    
    echo "\n📋 Daftar siswa:\n";
    foreach ($siswas as $siswa) {
        echo "  - " . $siswa->nis . ": " . $siswa->nama . "\n";
    }
} else {
    echo "⚠️  Belum ada siswa di kelas $kelas\n";
    echo "   Anda dapat menambahkan siswa nanti\n";
}

echo "\n✨ Setup selesai! Guru siap digunakan.\n";
echo "📍 Login dengan username: $username\n";
