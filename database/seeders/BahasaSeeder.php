<?php

namespace Database\Seeders;

use App\Models\Bahasa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class BahasaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data tetap untuk Bahasa Indonesia dan Inggris
        $bahasaData = [
            [
                'id' => Str::uuid(), // UUID unik
                'kode' => 'id',
                'nama' => 'Bahasa Indonesia',
                'translations' => json_encode([
                    'menu_home' => 'Beranda',
                    'menu_about' => 'Tentang',
                    'menu_contact' => 'Kontak',
                ]),
                'deskripsi' => 'Bahasa resmi Indonesia',
                'aktif' => true,
            ],
            [
                'id' => Str::uuid(), // UUID unik
                'kode' => 'en',
                'nama' => 'English',
                'translations' => json_encode([
                    'menu_home' => 'Home',
                    'menu_about' => 'About',
                    'menu_contact' => 'Contact',
                ]),
                'deskripsi' => 'Official language of the United Kingdom',
                'aktif' => true,
            ],
        ];

        foreach ($bahasaData as $bahasa) {
            Bahasa::updateOrCreate(
                ['kode' => $bahasa['kode']],
                $bahasa
            );
        }
    }
}
