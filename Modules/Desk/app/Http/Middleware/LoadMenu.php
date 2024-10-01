<?php

namespace Modules\Desk\Http\Middleware;

use App\Models\Menu;
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
            $userRole = Auth::user()->role;

            // if (!session()->has('menus')) {
                // $menus = $this->menuNav();
                $menus = Menu::where('type', 'admin')
                    ->whereNull('parent_id')
                    ->orderBy('menu_order', 'ASC')
                    ->get();
                foreach ($menus as $value) {
                    $value->name = ucwords($value->name);
                    $value->sub_menu = $this->subMenuNav($value->id);;
                }
                View::share('menus', $menus);

                // session(['menus' => $menus]);
                // session()->put('menus', $menus);
            // }
        }

        return $next($request);
    }

    private function menuNav()
    {
        $aArrData = Menu::where('type', 'admin')
            ->whereNull('parent_id')
            ->orderBy('menu_order', 'ASC')
            ->get();
        foreach ($aArrData as $value) {
            $value->name = ucwords($value->name);
            $value->sub_menu = $this->subMenuNav($value->id);
        }
        return $aArrData;
    }

    private function subMenuNav($id)
    {
        $aArrSubMenu = Menu::where('parent_id', $id)->get();
        if (!$aArrSubMenu->isEmpty()) {
            foreach ($aArrSubMenu as $key => $value) {
                $value->name = ucwords($value->name);
                $value->sub_menu = $this->subMenuNav($value->id);
            }
        }
        // return $aArrSubMenu->isEmpty() ? (object)[] : $aArrSubMenu;
        return $aArrSubMenu->isEmpty() ? [] : $aArrSubMenu;
    }
}
