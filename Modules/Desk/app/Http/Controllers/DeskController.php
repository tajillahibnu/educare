<?php

namespace Modules\Desk\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Traits\ApiResponseTrait;

class DeskController extends Controller
{
    use ApiResponseTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Cek apakah user sudah login
        if (Auth::check()) {
            // Jika sudah login, tampilkan halaman dashboard
            return view('desk::index');
        } else {
            
            // Jika belum login, tampilkan halaman login
            return view('desk::Auth.index',compact('data'));
        }
    }

    public function showLoginForm()
    {
        return view('desk::Auth.index');
    }

    public function loadContent(Request $request)
    {
        $data  = $request->input('params');
        $data = json_decode(base64_decode($data),true);
        
        dd($data);
        exit;
        // $menus = Menu::where('type', 'admin')
        //     ->whereNull('parent_id')
        //     ->orderBy('menu_order', 'ASC')
        //     ->get();
        // foreach ($menus as $value) {
        //     $value->name = ucwords($value->name);
        //     $value->sub_menu = [];
        // }
        // dd($menus);
        // exit;
        // Ambil konten berdasarkan ID menu
        // Anda bisa mengubah ini sesuai dengan logika yang diinginkan
        $content = "Ini adalah konten dari menu ID: " . $request->input('id');
        return $this->apiResponse(true, $content, 'Data retrieved successfully');
        // Kembalikan respons dalam bentuk HTML
        // return response()->json([
        //     'content' => $content
        // ]);
    }
}
