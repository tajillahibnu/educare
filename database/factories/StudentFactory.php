<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nis' => $this->faker->unique()->numberBetween(1000, 9999), // NIS unik
            'name' => $this->faker->name(), // Nama siswa
            'date_of_birth' => $this->faker->date(), // Tanggal lahir
            'gender' => $this->faker->randomElement(['L', 'P']), // Jenis kelamin
            'address' => $this->faker->address(), // Alamat
            'phone_number' => $this->faker->phoneNumber(), // Nomor telepon
            'email' => $this->faker->unique()->safeEmail(), // Email
            'photo' => $this->faker->imageUrl(),
            'is_active' => $this->faker->boolean() // Status aktif
        ];

    }
}
