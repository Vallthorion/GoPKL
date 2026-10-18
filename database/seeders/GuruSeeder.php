<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Guru;
use Illuminate\Support\Facades\Hash;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Wali Kelas - Login dengan NIP
        $nip1 = '198501012010011001';
        $user1 = User::updateOrCreate(
            ['username' => $nip1],
            [
                'password' => Hash::make($nip1),
                'role' => 'guru',
            ]
        );

        Guru::updateOrCreate(
            ['nip' => $nip1],
            [
                'user_id' => $user1->id,
                'nama' => 'Ibu Siti Nurhaliza',
                'type' => 'wali_kelas',
            ]
        );

        // Kakomsli - Login dengan NIP
        $nip2 = '198601152011012002';
        $user2 = User::updateOrCreate(
            ['username' => $nip2],
            [
                'password' => Hash::make($nip2),
                'role' => 'guru',
            ]
        );

        Guru::updateOrCreate(
            ['nip' => $nip2],
            [
                'user_id' => $user2->id,
                'nama' => 'Bapak Ahmad Ridho',
                'type' => 'kakomsli',
            ]
        );

        // Wali Kelas XII SIJA 2 - Login dengan NIP
        $nip3 = '199104282022211015';
        $user3 = User::updateOrCreate(
            ['username' => $nip3],
            [
                'password' => Hash::make($nip3),
                'role' => 'guru',
            ]
        );

        Guru::updateOrCreate(
            ['nip' => $nip3],
            [
                'user_id' => $user3->id,
                'nama' => 'Herman Efendi, S.Kom, Gr.',
                'type' => 'wali_kelas',
            ]
        );

        // Kakomsli - Login dengan NIP
        $nip4 = '198506032009032003';
        $user4 = User::updateOrCreate(
            ['username' => $nip4],
            [
                'password' => Hash::make($nip4),
                'role' => 'guru',
            ]
        );

        Guru::updateOrCreate(
            ['nip' => $nip4],
            [
                'user_id' => $user4->id,
                'nama' => 'Ratna Puspita Sari, S.ST.',
                'type' => 'kakomsli',
            ]
        );
    }
}

