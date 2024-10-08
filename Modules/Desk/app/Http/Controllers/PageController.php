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

    public function mainTable(Request $request)
    {
        $query = DB::table('menus');

        // foreach ($request->input('columns') as $key => $column) {
        //     if ($column['searchable'] == 'true' && !empty($column['search']['value'])) {
        //         $searchValue = $column['search']['value'];
        //         $columnName = $column['data'];
        //         $query->orWhere($columnName, 'LIKE', "%$searchValue%");
        //     }
        // }

        $data = $query->get();

        return DataTables::of($data)
            ->addColumn('action', function ($detail) {
                return '
                <a href="javascript:void(0);" class="btn btn-icon btn-outline btn-outline-primary btn-flex btn-center btn-sm menu-dropdown" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"><i class="fa fa-gear"></i></a>
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true" data-popper-placement="bottom-end">
                    <div class="menu-item px-3">
                        <a href="javascript:void(0);" data-permision="mapel-update" onclick="onView(this)" data-param="' . base64_encode(json_encode($detail)) . '" class="menu-link px-3">Edit</a>
                    </div>
                    <div class="menu-item px-3">
                        <a href="javascript:void(0);" data-permision="mapel-delete" onclick="onDelete(this)" data-param="' . base64_encode(json_encode($detail)) . '" class="menu-link px-3">Delete</a>
                    </div>
                </div>
                ';
            })->toJson();
    }
}
