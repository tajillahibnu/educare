<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->firstName,
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'employee_type' => $this->faker->randomElement(['guru', 'karyawan']),
            'NIK' => $this->faker->unique()->numerify('##############'),
            'NIP' => $this->faker->optional()->numerify('###########'),
            'photo' => $this->faker->imageUrl(),
            'start_date' => $this->faker->date(),
            'birth_date' => $this->faker->date(),
            'gender' => $this->faker->randomElement(['L', 'P']), // Jenis kelamin
            'address' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'is_active' => $this->faker->boolean() // Menentukan status aktif
        ];
    }
}
