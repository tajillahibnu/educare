<?php

namespace Modules\Desk\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Services\DataTableService;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use Modules\Desk\Services\Management\SiswaService;

class SiswaController extends Controller
{
    use ApiResponseTrait;
    protected $mainServices;
    protected $ComboServices;
    public function __construct(
        SiswaService $mainServices,
    ) {
        $this->mainServices = $mainServices;
    }
    public function mainTable(Request $request)
    {
        $filter = [];
        // $filter['kurikulum_id'] = $request->kurikulum_id;
        return $this->mainServices->table($filter);
    }
}
