<?php

namespace Modules\Desk\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Services\DataTableService;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;
use Modules\Desk\Services\ComboService;
use Modules\Desk\Services\Kurikulum\KelompokMapelService;
use Modules\Desk\Services\Kurikulum\MapelServices as KurikulumMapelServices;
use Modules\Desk\Services\KurikulumService;
use Symfony\Component\HttpFoundation\JsonResponse;

// use Modules\Desk\Services\Master\MapelServices;

class KurikulumController extends Controller
{
    use ApiResponseTrait;
    protected $comboServices;
    protected $mainservices;
    protected $KelompokMapelService;
    protected $mapelServices;
    public function __construct(
        KurikulumService $mainservices,
        KelompokMapelService $KelompokMapelService,
        KurikulumMapelServices $mapelServices,
        ComboService $comboServices,
    ) {
        $this->mainservices = $mainservices;
        $this->KelompokMapelService = $KelompokMapelService;
        $this->mapelServices = $mapelServices;
        $this->comboServices = $comboServices;
    }


    public function tahunTokurikulum(Request $request){
        $save = $request->validate([
            'tingkat_id' => 'required|integer',
            'kurikulum_id' => 'required|integer',
            'tahun_pelajaran' => 'required|string', // Pastikan ini ada
        ]);
        // $save['tingkat_id']         = $request->tingkat_id;
        // $save['kurikulum_id']       = $request->kurikulum_id;
        // $save['tahun_pelajaran']    = $request->tahun_pelajaran;
        $r = $this->mainservices->enrolTahunKurikulum($save);
        return $this->apiResponse()
            ->services($r)
            // ->services($request->input())
            ->send();
    }


    public function combotahunpelajaran()
    {
        $r = $this->comboServices->tahun_pelajaran();
        return $this->apiResponse()
            ->services($r)
            ->send();
    }

    public function combokurikulum()
    {
        $r = $this->comboServices->kurikulum();
        return $this->apiResponse()
            ->services($r)
            ->send();
    }

    public function combotingkat()
    {
        $r = $this->comboServices->tingkat();
        return $this->apiResponse()
            ->services($r)
            ->send();
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

    public function mainTable(Request $request)
    {
        return $this->mainservices->table();
    }
}
