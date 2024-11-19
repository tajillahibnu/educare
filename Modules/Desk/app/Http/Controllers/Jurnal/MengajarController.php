<?php

namespace Modules\Desk\Http\Controllers\Jurnal;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use Modules\Desk\Services\Jurnal\MengajarService;

class MengajarController extends Controller
{
    use ApiResponseTrait;
    protected $mainServices;
    protected $comboServices;
    public function __construct(
        MengajarService $mainServices,
        // ComboService $comboServices
    ) {
        $this->mainServices = $mainServices;
        // $this->comboServices = $comboServices;
    }

    public function mainTable(Request $request)
    {
        $filter = [];
        return $this->mainServices->table($filter);
    }
}
