<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat permission untuk menu tertentu
        $menu = Menu::find(1); // Contoh untuk menu pertama

        Permission::create([
            'menu_id' => $menu->id,
            'name' => 'create',
            'description' => 'Create access for this menu'
        ]);

        Permission::create([
            'menu_id' => $menu->id,
            'name' => 'read',
            'description' => 'Read access for this menu'
        ]);

        Permission::create([
            'menu_id' => $menu->id,
            'name' => 'update',
            'description' => 'Update access for this menu'
        ]);

        Permission::create([
            'menu_id' => $menu->id,
            'name' => 'delete',
            'description' => 'Delete access for this menu'
        ]);
    }
}
