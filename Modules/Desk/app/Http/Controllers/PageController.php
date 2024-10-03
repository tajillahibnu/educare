<?php

namespace Modules\Desk\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Role;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    use ApiResponseTrait;
    public function loadPage(Request $request)
    {
        // Cek apakah ada parameter khusus yang dikirim dari axios
        $page = $request->input('params');
        $menu = decryptData($page);
        // Render Blade view sesuai permintaan
        // if ($page === 'dashboard') {
        //     $html = view('desk::Dashboard.table')->render();
        // } else if ($page === 'profile') {
        //     $html = view('desk::Dashboard.table')->render();
        // } else {
        $html = view('desk::Dashboard.table')->render();
        // }


        $html = json_encode($menu);



        $encryptedHtml = encryptData($html);
        // Kembalikan HTML yang sudah dirender sebagai respons
        $d = Menu::all();
        $r['menu'] = $menu;
        $r['s'] = $d;
        $r['html'] = $encryptedHtml;
        return $this->apiResponse()
            ->success(false)
            ->message('lol')
            ->data($r)
            // ->data($r, true)
            // ->data($r, false, 'params')
            ->send(200);

        // return response()->json([
        //     'success'   => true,
        //     'menu'      => $menu,
        //     'html'      => $encryptedHtml,
        // ]);
    }
}
