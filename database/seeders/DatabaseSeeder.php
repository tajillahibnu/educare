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
        
        User::factory(10)->create();
        Employee::factory(10)->create();
        ClassModel::factory(5)->create();
        Student::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'admin@demo.com',
        ]);

        $this->call([
            BahasaSeeder::class,
            RoleSeeder::class,
            RoleUserSeeder::class,
            MenuSeeder::class,
            PermissionSeeder::class,
            MenuRolePermissionSeeder::class,
            MapelSeeder::class,
            AcademicYearSeeder::class,
        ]);

        
        $affectedRows = User::where(['primary_role_id' => null])->update(['primary_role_id' => 2]);
    }
}
