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
        // $userRole = Role::where('name', 'Guru')->first();
        // $permissions = Permission::all();
        $this->adminPermision();
        $this->keryawanPermision();
        $this->guruPermision();
        $this->siswaPermision();
    }

    function adminPermision()
    {
        $role = Role::where('kode', 'admin')->first();
        $menus = Menu::all();
        foreach ($menus as $menu) {
            $menu->roles()->attach($role->id);
        }
    }

    function keryawanPermision()
    {
        $role = Role::where('kode', 'karyawan')->first();
        $menus = Menu::whereIn('url', ['dashboard','jurnalkbm'])->get();
        foreach ($menus as $menu) {
            $menu->roles()->attach($role->id);
        }
    }
    
    function guruPermision()
    {
        $role = Role::where('kode', 'guru')->first();
        $menus = Menu::whereIn('url', ['dashboard','jurnalkbm'])->get();
        // $menus = Menu::where('name','Dashboard')->whereIn('type', ['guru'])->get();
        foreach ($menus as $menu) {
            $menu->roles()->attach($role->id);
        }
    }
    function siswaPermision()
    {
        $role = Role::where('kode', 'siswa')->first();
        $menus = Menu::whereIn('name', ['Dashboard'])->get();
        foreach ($menus as $menu) {
            $menu->roles()->attach($role->id);
        }
    }
}
