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
use Illuminate\Support\Facades\DB;
use Modules\Desk\Services\ShowPageService;
use Yajra\DataTables\Facades\DataTables;

class PageController extends Controller
{
    use ApiResponseTrait;

    protected ShowPageService $pageService;

    public function __construct(ShowPageService $pageService)
    {
        $this->pageService = $pageService;
    }


    public function loadPage(Request $request)
    {
        // Cek apakah ada parameter khusus yang dikirim dari axios
        $page = $request->input('params');
        $menu = json_decode(decryptData($page), true);

        // Panggil service untuk render HTML
        $html = $this->pageService->show($request);
        // Kembalikan HTML yang sudah dirender sebagai respons
        // $r['html'] = $html['html'];
        // $r['html'] = $html;
        return $this->apiResponse()
            ->data($html, true)
            ->send(200);
    }
}
