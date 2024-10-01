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
        Role::create(['name' => 'Admin', 'description' => 'Administrator']);
        Role::create(['name' => 'User', 'description' => 'Regular User']);
        Role::create(['name' => 'Editor', 'description' => 'Content Editor']);
    }
}
