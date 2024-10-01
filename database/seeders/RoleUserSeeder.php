<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil beberapa user dan role dari database
        $user1 = User::first(); // Ambil user pertama
        $user2 = User::skip(1)->first(); // Ambil user kedua
        $adminRole = Role::where('name', 'admin')->first();
        $userRole = Role::where('name', 'user')->first();

        // Hubungkan user dengan role
        if ($user1 && $adminRole) {
            DB::table('role_user')->insert([
                'user_id' => $user1->id,
                'role_id' => $adminRole->id,
            ]);
        }

        if ($user2 && $userRole) {
            DB::table('role_user')->insert([
                'user_id' => $user2->id,
                'role_id' => $userRole->id,
            ]);
        }
    }
}
