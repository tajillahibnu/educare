<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    public function index()
    {
        // Mendapatkan user yang sedang login
        $user = Auth::user();

        // Mendapatkan semua menu yang sesuai dengan role user
        $menus = Menu::whereHas('roles', function ($query) use ($user) {
            $query->whereIn('roles.id', $user->roles->pluck('id'));
        })->with('children')->get();

        // $user = auth()->user();
        // $roles = $user->roles;
        // $menus = Menu::whereHas('roles', function ($query) use ($roles) {
        //     $query->whereIn('role_id', $roles->pluck('id'));
        // })->get();

        return view('menus.index', compact('menus'));
    }
}
