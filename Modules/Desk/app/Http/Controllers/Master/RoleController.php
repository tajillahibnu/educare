<?php

namespace Modules\Desk\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Services\DataTableService;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    use ApiResponseTrait;

    // protected ShowPageService $pageService;

    // public function __construct(ShowPageService $pageService)
    // {
    //     $this->pageService = $pageService;
    // }

    public function mainTable(Request $request)
    {
        return DataTableService::draw('roles')
            ->addColumn('action', function ($detail) {
                return '
                <div class="btn-group">
                    <button type="button" class="btn btn-primary btn-icon rounded-pill dropdown-toggle hide-arrow waves-effect waves-light" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="ti ti-dots-vertical"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" style="">
                        <li><a class="dropdown-item waves-effect" href="javascript:void(0);">Edit</a></li>
                    </ul>
                </div>';
            })
            ->toJson();
    }
}
