<?php

namespace Modules\Desk\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\RoleUser;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Traits\ApiResponseTrait;
use Modules\Desk\Services\ShowPageService;

class DeskController extends Controller
{
    use ApiResponseTrait;
    protected $pageServices;
    public function __construct(
        ShowPageService $pageServices,
    ) {
        $this->pageServices = $pageServices;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Cek apakah user sudah login
        if (Auth::check()) {
            // Jika sudah login, tampilkan halaman dashboard
            $userId = Auth::user()->id;
            $roleActive = session('akses_module');
            $shortcut = RoleUser::where('user_id', $userId)
                ->whereNotIn('kode', [$roleActive])
                ->join('roles', 'role_user.role_id', '=', 'roles.id') // Join ke tabel roles
                ->get();
            return view('desk::index', compact('shortcut'));
        } else {
            // Jika belum login, tampilkan halaman login
            return view('desk::Auth.index', compact('data'));
        }
    }

    public function showLoginForm()
    {
        return view('desk::Auth.index');
    }

    public function switchModule(Request $request)
    {
        $aa = $request->set_module;
        $r = $this->pageServices->changeModule($aa);
        return $this->apiResponse()
            ->services($r)
            ->send();
    }

    public function loadContent(Request $request)
    {
        // $data  = $request->input('params');
        // $data = json_decode(base64_decode($data), true);

        // dd($data);
        // exit;
        // // $menus = Menu::where('type', 'admin')
        // //     ->whereNull('parent_id')
        // //     ->orderBy('menu_order', 'ASC')
        // //     ->get();
        // // foreach ($menus as $value) {
        // //     $value->name = ucwords($value->name);
        // //     $value->sub_menu = [];
        // // }
        // // dd($menus);
        // // exit;
        // // Ambil konten berdasarkan ID menu
        // // Anda bisa mengubah ini sesuai dengan logika yang diinginkan
        // $content = "Ini adalah konten dari menu ID: " . $request->input('id');
        // return $this->apiResponse(true, $content, 'Data retrieved successfully');
        // // Kembalikan respons dalam bentuk HTML
        // // return response()->json([
        // //     'content' => $content
        // // ]);
    }
}
