<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ClassModel>
 */
class ClassModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->generateUniqueClassName(), // Memanggil fungsi untuk nama kelas yang unik
            'level' => $this->faker->randomElement(['SD', 'SMP', 'SMA', 'SMK']),
            'program_studi' => $this->faker->randomElement(['Teknik Jaringan', 'Rekayasa Perangkat Lunak', 'Multimedia']),
            'is_active' => $this->faker->boolean(),
        ];

    }

    private function generateUniqueClassName()
    {
        // 'name' => 'Kelas ' . $this->faker->randomElement(['X', 'XI', 'XII']) . ' ' . $this->faker->randomElement(['RPL 1', 'RPL 2', 'TKJ 1', 'PPLG 1']), // Nama kelas untuk SMK

        // Menggunakan unique() untuk memastikan nama kelas tidak duplikat
        return 'Kelas '.$this->faker->randomElement(['X', 'XI', 'XII']) . ' ' . $this->faker->randomElement(['RPL 1', 'RPL 2', 'TKJ 1', 'PPLG 1']).' '.$this->faker->unique()->sentence(1, true); // Menghasilkan kalimat yang unik sebagai nama kelas
    }

}
