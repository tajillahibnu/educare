<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        \Illuminate\Support\Facades\DB::enableQueryLog(); // Aktifkan query log

        $user = Auth::user();
        $user = auth()->user();
        $roles = $user->roles; // Ambil semua role yang dimiliki user

        // Ambil menu berdasarkan role user
        $menus = Menu::whereHas('roles', function ($query) use ($roles) {
            $query->whereIn('role_id', $roles->pluck('id'));
        })
            ->with(['children' => function ($query) use ($roles) {
                $query->whereHas('roles', function ($subQuery) use ($roles) {
                    $subQuery->whereIn('role_id', $roles->pluck('id'));
                });
            }])
            ->whereNull('parent_id') // Hanya ambil menu utama
            ->get();

        // Tampilkan query log
        // dd(\Illuminate\Support\Facades\DB::getQueryLog());
        // Debugging untuk melihat data
        // dd($menus); // Hentikan eksekusi dan tampilkan data


        // var_dump($menus);
        // exit;
        // Ambil permission user berdasarkan role
        $permissions = Permission::whereHas('roles', function ($query) use ($roles) {
            $query->whereIn('role_id', $roles->pluck('id'));
        })->get();

        return view('dashboard', compact('menus', 'permissions'));
    }
}
