<?php

namespace Database\Seeders;

use App\Models\infroman;
use App\Models\Jurusan;
use App\Models\timeLine;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $roleAdmin = Role::create(['name' => 'admin']);
        Role::create(['name' => 'guru']);
        Role::create(['name' => 'calon-siswa']);

        User::firstOrCreate(
            ['email' => 'spmb@smkislam1.sch.id'],
            [
                'name' => 'SPMB Admin',
                'username' => 'adminspmb',
                'password' => 'password',
                'email_verified_at' => now(),
            ]
        )->assignRole($roleAdmin);

        Jurusan::create(['nama_jurusan' => 'Teknik Komputer & Jaringan', 'deskripsi_jurusan' => 'Ahli dalam infrastruktur jaringan, server, dan fiber optik.', 'kode_jurusan' => 'TKJ']);
        Jurusan::create(['nama_jurusan' => 'Program Siaran dan Produksi Televisi', 'deskripsi_jurusan' => 'Kreator konten digital, videografi, dan desain grafis.', 'kode_jurusan' => 'PSPT']);
        Jurusan::create(['nama_jurusan' => 'Seni Animasi 2D/3D', 'deskripsi_jurusan' => 'Desain karakter, modeling 3D, dan motion graphic.', 'kode_jurusan' => 'Animasi']);
        Jurusan::create(['nama_jurusan' => 'Otomatisasi Tata Kelola Perkantoran', 'deskripsi_jurusan' => 'Manajemen administrasi modern dan public speaking.', 'kode_jurusan' => 'OTKP']);
        Jurusan::create(['nama_jurusan' => 'Akuntansi Keuangan Lembaga', 'deskripsi_jurusan' => 'Pengelolaan keuangan, pajak, dan software akuntansi.', 'kode_jurusan' => 'AKL']);
        Jurusan::create(['nama_jurusan' => 'Bisnis Retail', 'deskripsi_jurusan' => 'Digital marketing, e-commerce, dan kewirausahaan.', 'kode_jurusan' => 'BR']);

        timeLine::create([
            'title' => 'GEL 1',
            'description' => 'Pendaftaran Awal',
            'date' => '2025-03-01 to 2025-04-30',
        ]);

        timeLine::create([
            'title' => 'VERIF',
            'description' => 'Verifikasi Berkas (Offline)',
            'date' => '2025-05-01 to 2025-05-05',
        ]);

        timeLine::create([
            'title' => 'HASIL',
            'description' => 'Pengumuman Kelulusan',
            'date' => '2025-05-10',
        ]);

        timeLine::create([
            'title' => 'DAFTAR ULANG',
            'description' => 'Daftar Ulang Peserta Didik Baru',
            'date' => '2025-05-11 to 2025-05-15',
        ]);

        $informan = [
            ['nama_informan' => 'Drs. H MUKHOLIS, Mm', 'status' => 'guru'],
            ['nama_informan' => 'Drs. Mu\'ajam', 'status' => 'guru'],
            ['nama_informan' => 'Drs. H. Suwoto Afandi', 'status' => 'guru'],
            ['nama_informan' => 'M. Jauhan Nasirin, S.Pd.', 'status' => 'guru'],
            ['nama_informan' => 'Ahsan Ainuridwan, S.Pd.', 'status' => 'guru'],
            ['nama_informan' => 'Dra. Ruri Awaningsih', 'status' => 'guru'],
            ['nama_informan' => 'Agus Hariyanto', 'status' => 'guru'],
            ['nama_informan' => 'Muhammad Fikri Ferdiansyah, SS', 'status' => 'guru'],
            ['nama_informan' => 'Irvana Rozie Choirul', 'status' => 'guru'],
            ['nama_informan' => 'Ahmad Hakim, S.Pd.', 'status' => 'guru'],
            ['nama_informan' => 'Drs. Ilham Mukholik', 'status' => 'guru'],
            ['nama_informan' => 'Basirun, S.Pd.', 'status' => 'guru'],
            ['nama_informan' => 'Taufik Ridho, A.Md.', 'status' => 'guru'],
            ['nama_informan' => 'Anik Noer Wahtyuni', 'status' => 'guru'],
            ['nama_informan' => 'Dewi Rofi\'ah, S.Kom', 'status' => 'guru'],
            ['nama_informan' => 'Finda khoirunnisa', 'status' => 'guru'],
            ['nama_informan' => 'Mahbub Afandi, S.Pd.', 'status' => 'guru'],
            ['nama_informan' => 'Heri Setiawan', 'status' => 'guru'],
            ['nama_informan' => 'Ibnu ngaulansyah, S.Kom', 'status' => 'guru'],
            ['nama_informan' => 'Jamitun, S.Kom', 'status' => 'guru'],
            ['nama_informan' => 'Tri Yeni Anjarsari, S.Pd.I', 'status' => 'guru'],
            ['nama_informan' => 'Ifan Dwi Febriana, S.Pd.', 'status' => 'guru'],
            ['nama_informan' => 'Kukuh Dwi Pratama, s.Pd.', 'status' => 'guru'],
            ['nama_informan' => 'Zahrotul mufidah, S.Pd.', 'status' => 'guru'],
            ['nama_informan' => 'Nurul Hidayah, S.Pd. (BI)', 'status' => 'guru'],
            ['nama_informan' => 'Zulfikar Dzakaria Musafak, S.Pd.', 'status' => 'guru'],
            ['nama_informan' => 'Aris Khusnul Wafa, S.Pd.', 'status' => 'guru'],
            ['nama_informan' => 'Rikhanatul Hamidah, S.Pd.', 'status' => 'guru'],
            ['nama_informan' => 'Antin Alysa Maryana', 'status' => 'guru'],
            ['nama_informan' => 'Siti Nur Asiyah, S.Pd.I', 'status' => 'guru'],
            ['nama_informan' => 'Eni Ratnaningtias, S.Pd.', 'status' => 'guru'],
            ['nama_informan' => 'M. Nizar AM.', 'status' => 'guru'],
            ['nama_informan' => 'Hermin Widyastuti, S.E.', 'status' => 'guru'],
            ['nama_informan' => 'Ika Sukrun Nikmawati', 'status' => 'guru'],
            ['nama_informan' => 'Dewi Atiqah, S.Pd.', 'status' => 'guru'],
            ['nama_informan' => 'Dafina Nurjayanti, A.Md', 'status' => 'guru'],
            ['nama_informan' => 'Dharis Septian Putri, S.Pd', 'status' => 'guru'],
            ['nama_informan' => 'Eva Tri Ramadhani, S.Sos', 'status' => 'guru'],
            ['nama_informan' => 'Fildzah Zatayummi, S.Kom', 'status' => 'guru'],
            ['nama_informan' => 'Kirana Hainun Afilia, S.Pd', 'status' => 'guru'],
            ['nama_informan' => 'M. Hasbi Wakafa, S.Kom', 'status' => 'guru'],
            ['nama_informan' => 'Nanang Apriansyah, S.Pd.I', 'status' => 'guru'],
            ['nama_informan' => 'Ninda Cintya Pradani, S.Pd', 'status' => 'guru'],
            ['nama_informan' => 'Suci Wulandari, S.Pd', 'status' => 'guru'],
            ['nama_informan' => 'Hariadi Setyo Perwira', 'status' => 'guru'],
            ['nama_informan' => 'Anung Jati Nugraha Mukti, S.Pd', 'status' => 'guru'],
            ['nama_informan' => 'Khoirurohmah', 'status' => 'guru'],
            ['nama_informan' => 'Nurul Hidayah, S.Pd. (MAT)', 'status' => 'guru'],
            ['nama_informan' => 'Musini', 'status' => 'guru'],
            ['nama_informan' => 'FENY ELMA SETYORINI S.Ikom', 'status' => 'guru'],
            ['nama_informan' => 'Khoirul Anwar', 'status' => 'guru'],
            ['nama_informan' => 'M. Ridhol Mahbub', 'status' => 'guru'],
            ['nama_informan' => 'Ahmad Rifa\'i', 'status' => 'guru'],
            ['nama_informan' => 'Mahsusodin', 'status' => 'guru'],
            ['nama_informan' => 'Sukiman', 'status' => 'guru'],
            ['nama_informan' => 'Anas Riqi Ananta', 'status' => 'guru'],
            ['nama_informan' => 'Andika Ruliawan, S.Pd', 'status' => 'guru'],
            ['nama_informan' => 'Riska Muhsinnatunnisa', 'status' => 'guru'],
            ['nama_informan' => 'Musthofa', 'status' => 'guru'],
            ['nama_informan' => 'Mukalam', 'status' => 'guru'],
        ];

        foreach ($informan as $data) {
            infroman::create($data);
        }
    }
}
