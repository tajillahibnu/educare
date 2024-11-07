<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['kode' => 'admin','name' => 'Admin', 'description' => 'Administrator']);
        Role::create(['kode' => 'guru','name' => 'Guru', 'description' => 'Regular User']);
        Role::create(['kode' => 'karyawan','name' => 'Karyawan', 'description' => 'Content Editor']);
        Role::create(['kode' => 'siswa','name' => 'Siswa', 'description' => 'Content Editor']);
    }
}
