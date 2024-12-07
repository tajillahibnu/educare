<?php

namespace Database\Seeders;

use App\Models\ClassModel;
use App\Models\Employee;
use App\Models\Student;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'admin@demo.com',
        ]);
        
        User::factory(20)->create();
        Employee::factory(10)->create();
        ClassModel::factory(5)->create();
        Student::factory(10)->create();


        $this->call([
            ConfigAppSeeder::class,
            BahasaSeeder::class,
            RoleSeeder::class,
            MenuSeeder::class,
            PermissionSeeder::class,
            MenuRolePermissionSeeder::class,
            MapelSeeder::class,
            AcademicYearSeeder::class,
            KelompokMapelSeeder::class,
            RoleUserSeeder::class,
            TingkatSeeder::class,
        ]);
    }
}
