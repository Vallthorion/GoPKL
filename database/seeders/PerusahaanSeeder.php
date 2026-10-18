<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Perusahaan;

class PerusahaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Perusahaan::create([
            'nama_perusahaan' => 'PT. Teknologi Indonesia',
            'alamat' => 'Jl. Merdeka No. 123, Kelurahan Cipete, Kecamatan Cilandak',
            'jurusan_dibutuhkan' => json_encode(['SIJA']),
            'bidang' => 'Information Technology',
            'kuota' => 10,
            'deskripsi' => 'Perusahaan teknologi terkemuka yang fokus pada solusi software dan networking untuk berbagai industri. Kami menawarkan program PKL yang komprehensif dengan mentor berpengalaman.'
        ]);

        Perusahaan::create([
            'nama_perusahaan' => 'CV. Mitra Usaha Digital',
            'alamat' => 'Jl. Ahmad Yani No. 456, Kelurahan Kemayoran, Kecamatan Kemayoran',
            'jurusan_dibutuhkan' => json_encode(['SIJA']),
            'bidang' => 'Software Development',
            'kuota' => 8,
            'deskripsi' => 'Spesialis dalam pengembangan aplikasi web dan mobile. Kami percaya pada pembelajaran praktis dan memberikan kesempatan kepada siswa untuk berkontribusi pada proyek nyata.'
        ]);

        Perusahaan::create([
            'nama_perusahaan' => 'PT. Sistem Jaringan Nusantara',
            'alamat' => 'Jl. Gatot Subroto No. 789, Kelurahan Kuningan, Kecamatan Mampang Praptani',
            'jurusan_dibutuhkan' => json_encode(['SIJA']),
            'bidang' => 'Network Infrastructure',
            'kuota' => 12,
            'deskripsi' => 'Perusahaan terpercaya dalam penyediaan solusi jaringan dan infrastruktur IT untuk perusahaan besar dan menengah. Lingkungan kerja yang supportif dan full dengan teknologi terbaru.'
        ]);

        Perusahaan::create([
            'nama_perusahaan' => 'Startup. Code Innovation Lab',
            'alamat' => 'Jl. Sudirman No. 321, Kelurahan Petisah, Kecamatan Medan Petisah',
            'jurusan_dibutuhkan' => json_encode(['SIJA']),
            'bidang' => 'Tech Startup',
            'kuota' => 6,
            'deskripsi' => 'Startup inovatif yang mengembangkan solusi teknologi terdepan. Budaya kerja yang fleksibel, kolaboratif, dan mendorong kreativitas. Sempurna untuk siswa yang ingin mempelajari perkembangan teknologi terkini.'
        ]);

        Perusahaan::create([
            'nama_perusahaan' => 'PT. Solusi Komputer Utama',
            'alamat' => 'Jl. Diponegoro No. 654, Kelurahan Setiabudi, Kecamatan Setiabudi',
            'jurusan_dibutuhkan' => json_encode(['SIJA']),
            'bidang' => 'Computer Solutions',
            'kuota' => 5,
            'deskripsi' => 'Penyedia layanan komputer dan maintenance profesional. Kami menawarkan pengalaman langsung dalam troubleshooting hardware, instalasi sistem, dan dukungan teknis kepada klien korporat.'
        ]);
    }
}

