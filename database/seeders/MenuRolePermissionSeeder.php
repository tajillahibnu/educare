<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuRolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::where('name', 'Admin')->first();
        $userRole = Role::where('name', 'User')->first();

        $permissions = Permission::all();

        $menus = Menu::all();

        foreach ($menus as $menu) {
            foreach ($permissions as $permission) {
                // Contoh: Role Admin memiliki semua permission
                $menu->roles()->attach($adminRole->id, ['permission_id' => $permission->id]);

                // Contoh: Role User hanya memiliki permission 'read'
                if ($permission->name == 'read') {
                    $menu->roles()->attach($userRole->id, ['permission_id' => $permission->id]);
                }
            }
        }
    }
}
