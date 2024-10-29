<?php

namespace Modules\Desk\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Services\DataTableService;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;
use Modules\Desk\Services\Kurikulum\KelompokMapelService;
use Modules\Desk\Services\Kurikulum\MapelServices as KurikulumMapelServices;
use Modules\Desk\Services\KurikulumService;
use Symfony\Component\HttpFoundation\JsonResponse;

// use Modules\Desk\Services\Master\MapelServices;

class KurikulumController extends Controller
{
    use ApiResponseTrait;
    protected $mainservices;
    protected $KelompokMapelService;
    protected $mapelServices;
    public function __construct(
        KurikulumService $mainservices,
        KelompokMapelService $KelompokMapelService,
        KurikulumMapelServices $mapelServices,
    ) {
        $this->mainservices = $mainservices;
        $this->KelompokMapelService = $KelompokMapelService;
        $this->mapelServices = $mapelServices;
    }


    public function tableMapel(Request $request)
    {
        return $this->mapelServices->table($request->kelompok_id);
    }

    public function tableKelompokMapel(Request $request)
    {
        $filter = [];
        $filter['kurikulum_id'] = $request->kurikulum_id;
        return $this->KelompokMapelService->table($filter);
    }

    public function show(Request $request): JsonResponse
    {
        try {
            $res = $this->mainservices->getKurikulumId($request->kurikulum_id);
            return $this->apiResponse()
                ->services($res)
                ->send();
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage());
        }
    }


    public function mainTable(Request $request)
    {
        return $this->mainservices->table();
    }
}
