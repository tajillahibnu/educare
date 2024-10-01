<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Bahasa;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bahasa>
 */
class BahasaFactory extends Factory
{
    protected $model = Bahasa::class;

    public function definition()
    {
        $languages = [
            'id' => 'Bahasa Indonesia',
            'en' => 'English',
        ];

        // Pilih bahasa secara acak dari array
        $kode = array_rand($languages);
        $nama = $languages[$kode];

        // Nama menu umum
        $translations = [
            'menu_home' => $this->faker->word(),
            'menu_about' => $this->faker->word(),
            'menu_contact' => $this->faker->word(),
        ];

        return [
            'id' => Str::uuid(), // UUID unik
            'kode' => $kode, // Kode bahasa yang sudah ditentukan
            'nama' => $nama, // Nama bahasa yang sesuai dengan kode
            'translations' => json_encode($translations), // JSON untuk data i18n
            'deskripsi' => $this->faker->sentence(), // Deskripsi acak
            'aktif' => $this->faker->boolean(80), // Status aktif dengan probabilitas 80% true
        ];
    }

}
