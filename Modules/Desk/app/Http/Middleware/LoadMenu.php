<?php

namespace Modules\Desk\Http\Middleware;

use App\Models\Menu;
use App\Models\MenuRole;
use App\Models\MenuRolePermission;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class LoadMenu
{
    /**
     * Handle an incoming request.
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $roleActive = session('akses_module');
            $menus = MenuRole::select("menus.*")
                ->where('roles.kode', strtolower($roleActive))
                // ->where('type', 'admin')
                ->whereNull('parent_id')
                ->join('roles', 'menu_roles.role_id', '=', 'roles.id') // Join ke tabel roles
                ->join('menus', 'menu_roles.menu_id', '=', 'menus.id') // Join ke tabel roles
                ->orderBy('menu_order', 'ASC')
                ->get();
                // echo $roleActive;
                // dd($menus);
                // exit;
            foreach ($menus as $value) {
                $value->name = ucwords($value->name);
                $value->sub_menu = $this->subMenuNav($value->id, $roleActive);;
            }
            View::share('menus', $menus);
        }

        return $next($request);
    }

    // private function menuNav($roleActive)
    // {
    //     $aArrData = MenuRolePermission::select("menus.*")
    //             ->where('roles.kode', strtolower($roleActive))
    //             ->where('type', 'admin')
    //             ->whereNull('parent_id')
    //             ->join('roles', 'menu_roles.role_id', '=', 'roles.id') // Join ke tabel roles
    //             ->join('menus', 'menu_roles.menu_id', '=', 'menus.id') // Join ke tabel roles
    //             ->orderBy('menu_order', 'ASC')
    //             ->get();
    //     // $aArrData = Menu::where('type', 'admin')
    //     //     ->whereNull('parent_id')
    //     //     ->orderBy('menu_order', 'ASC')
    //     //     ->get();
    //     foreach ($aArrData as $value) {
    //         $value->name = ucwords($value->name);
    //         $value->sub_menu = $this->subMenuNav($value->id);
    //     }
    //     return $aArrData;
    // }

    private function subMenuNav($id, $roleActive)
    {
        $aArrSubMenu = MenuRole::select("menus.*")
            ->where('parent_id', $id)
            ->where('roles.kode', strtolower($roleActive))
            // ->where('type', 'admin')
            ->whereNotNull('parent_id')
            ->join('roles', 'menu_roles.role_id', '=', 'roles.id') // Join ke tabel roles
            ->join('menus', 'menu_roles.menu_id', '=', 'menus.id') // Join ke tabel roles
            ->orderBy('menu_order', 'ASC')
            ->get();
        // $aArrSubMenu = Menu::where('parent_id', $id)->get();
        if (!$aArrSubMenu->isEmpty()) {
            foreach ($aArrSubMenu as $key => $value) {
                $value->name = ucwords($value->name);
                $value->sub_menu = $this->subMenuNav($value->id, $roleActive);
            }
        }
        // return $aArrSubMenu->isEmpty() ? (object)[] : $aArrSubMenu;
        return $aArrSubMenu->isEmpty() ? [] : $aArrSubMenu;
    }
}
