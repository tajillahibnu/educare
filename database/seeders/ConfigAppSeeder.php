<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfigAppSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('configs')->insert([
            [
                'config_kode'   => 'sekolah.name',
                'config_name'   => 'sekolah_name',
                'config_title'  => 'nama sekolah',
                'config_tipe'   => 'sekolah',
                'config_value'  => 'SMKN XX DODO',
                'config_input'  => 'input',
            ],
            [
                'config_kode'   => 'sekolah.alamat',
                'config_name'   => 'sekolah_alamat',
                'config_title'  => 'alamat sekolah',
                'config_tipe'   => 'sekolah',
                'config_value'  => 'JL. Jalan Pemuda Kota Surabaya, Jawa Timur',
                'config_input'  => 'input',
            ],
            [
                'config_kode'   => 'sekolah.tipe',
                'config_name'   => 'sekolah_tipe',
                'config_title'  => 'jenis sekolah',
                'config_tipe'   => 'sekolah',
                'config_value'  => 'SMA',
                'config_input'  => 'input',
            ],
            [
                'config_kode'   => 'sekolah.is_smk',
                'config_name'   => 'sekolah_is_smk',
                'config_title'  => 'mode smk',
                'config_tipe'   => 'sekolah',
                'config_value'  => true,
                'config_input'  => 'input',
            ],
            [
                'config_kode'   => 'sekolah.email',
                'config_name'   => 'sekolah_email',
                'config_title'  => 'email sekolah',
                'config_tipe'   => 'sekolah',
                'config_value'  => 'smk@demo.sch.id',
                'config_input'  => 'input',
            ],
            [
                'config_kode'   => 'sekolah.tlpn',
                'config_name'   => 'sekolah_tlpn',
                'config_title'  => 'telepon sekolah',
                'config_tipe'   => 'sekolah',
                'config_value'  => '0341 88899000',
                'config_input'  => 'input',
            ],
            [
                'config_kode'   => 'app.title',
                'config_name'   => 'app_title',
                'config_title'  => 'nama singkat app',
                'config_tipe'   => 'app',
                'config_value'  => 'EDUCARE',
                'config_input'  => 'input',
            ],
            [
                'config_kode'   => 'app.name',
                'config_name'   => 'app_name',
                'config_title'  => 'nama app',
                'config_tipe'   => 'app',
                'config_input'  => 'input',
                'config_value'  => 'Administrasi Kegiatan dan Data Edukasi',
            ],
            [
                'config_kode'   => 'app.deskripsi',
                'config_name'   => 'app_deskripsi',
                'config_title'  => 'deskripsi',
                'config_tipe'   => 'app',
                'config_input'  => 'textarea',
                'config_value'  => 'EDUCARE adalah platform yang mendukung pengelolaan administrasi dan kegiatan edukasi di sekolah untuk menciptakan lingkungan belajar yang lebih baik',
            ],
            [
                'config_kode'   => 'app.favicon',
                'config_name'   => 'app_favicon',
                'config_title'  => 'favicon',
                'config_tipe'   => 'app',
                'config_input'  => 'file',
                'config_value'  => 'Icon halaman',
            ],
            [
                'config_kode'   => 'app.logo',
                'config_name'   => 'app_logo',
                'config_title'  => 'logo',
                'config_tipe'   => 'app',
                'config_input'  => 'file',
                'config_value'  => 'logo admin',
            ],
            [
                'config_kode'   => 'kbm.tahun',
                'config_name'   => 'tahun_pelajaran',
                'config_title'  => 'Tahun Pelajaran',
                'config_tipe'   => 'kbm',
                'config_input'  => 'input',
                'config_value'  => '2024/2025',
            ],
            [
                'config_kode'   => 'kbm.semester',
                'config_name'   => 'semester_active',
                'config_title'  => 'semester',
                'config_tipe'   => 'kbm',
                'config_input'  => 'input',
                'config_value'  => '1',
            ],
            [
                'config_kode'   => 'kbm.semester_mulai',
                'config_name'   => 'semester_mulai',
                'config_title'  => 'semester mulai',
                'config_tipe'   => 'kbm',
                'config_input'  => 'input',
                'config_value'  => date('Y-m-d'),
            ],
            [
                'config_kode'   => 'kbm.semester_akhir',
                'config_name'   => 'semester akhir',
                'config_title'  => 'semester akhir',
                'config_tipe'   => 'kbm',
                'config_input'  => 'input',
                'config_value'  => date('Y-m-d', strtotime('+6 month', strtotime(date('Y-m-d')))),
            ],
            [
                'config_kode'   => 'attendance_siswa.masuk',
                'config_name'   => 'jam_masuk',
                'config_title'  => 'Jam Masuk',
                'config_tipe'   => 'attendance',
                'config_input'  => 'time',
                'config_value'  => '07:00',
            ],
            [
                'config_kode'   => 'attendance_siswa.keluar',
                'config_name'   => 'jam_pulang',
                'config_title'  => 'Jam Pulang',
                'config_tipe'   => 'attendance',
                'config_input'  => 'time',
                'config_value'  => '13:00',
            ],
        ]);
        $this->saveSMTPEmail();
    }

    private function saveSMTPEmail()
    {
        DB::table('configs')->insert([
            [
                'config_kode'   => 'email.address',
                'config_name'   => 'email_address',
                'config_title'  => 'alamat email',
                'config_tipe'   => 'smtp',
                'config_value'  => 'demo@gmail.com',
                'config_input'  => 'input',
            ],
            [
                'config_kode'   => 'email.name',
                'config_name'   => 'email_name',
                'config_title'  => 'nama pengirim',
                'config_tipe'   => 'smtp',
                'config_value'  => 'educare',
                'config_input'  => 'input',
            ],
            [
                'config_kode'   => 'email.port',
                'config_name'   => 'email_port',
                'config_title'  => 'port email',
                'config_tipe'   => 'smtp',
                'config_value'  => '465',
                'config_input'  => 'input',
            ],
            [
                'config_kode'   => 'email.username',
                'config_name'   => 'email_username',
                'config_title'  => 'user email',
                'config_tipe'   => 'smtp',
                'config_value'  => 'demo@gmail.com',
                'config_input'  => 'input',
            ],
            [
                'config_kode'   => 'email.password',
                'config_name'   => 'email_password',
                'config_title'  => 'password email',
                'config_tipe'   => 'smtp',
                'config_value'  => 'jxhiwemcdrofecwg',
                'config_input'  => 'input',
            ],
        ]);
    }
}
