<?php

namespace Modules\Desk\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Services\DataTableService;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use Modules\Desk\Services\ShowPageService;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    use ApiResponseTrait;

    // protected ShowPageService $pageService;

    // public function __construct(ShowPageService $pageService)
    // {
    //     $this->pageService = $pageService;
    // }

    public function mainTable(Request $request)
    {
        $searchKeyword = $request->input('search.value'); // Mengambil keyword dari DataTables
        return DataTableService::draw('users')
            ->select(['users.id', 'users.name', 'users.email', 'roles.name AS role_name'])
            ->join('roles', [
                ['roles.id', '=', 'users.primary_role_id'],
            ])
            ->showQueries(true)
            // ->where('users.id','IN',['1','2'])
            ->toJson();
    }
}
