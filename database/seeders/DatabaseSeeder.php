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
            BahasaSeeder::class,
            TingkatSeeder::class,
            RoleSeeder::class,
            RoleUserSeeder::class,
            MenuSeeder::class,
            PermissionSeeder::class,
            MenuRolePermissionSeeder::class,
            MapelSeeder::class,
            AcademicYearSeeder::class,
            KelompokMapelSeeder::class,
        ]);

        
        $affectedRows = User::where(['primary_role_id' => null])->where('id', '<=', '11')->update(['primary_role_id' => 2]);
        $affectedRows = User::where(['primary_role_id' => null])->where('id', '>', '11')->update(['primary_role_id' => 4]);
        $affectedRows = User::where(['email' => 'admin@demo.com'])->update(['primary_role_id' => 1]);
    }
}
