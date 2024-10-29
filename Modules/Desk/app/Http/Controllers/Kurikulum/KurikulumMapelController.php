<?php

namespace Modules\Desk\Http\Controllers\Kurikulum;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use Exception;
use Modules\Desk\Services\Kurikulum\KelompokMapelService;
use Modules\Desk\Services\Kurikulum\MapelServices as KurikulumMapelServices;

class KurikulumMapelController extends Controller
{
    use ApiResponseTrait;
    protected $mainservices;
    protected $mapelKurikulum;
    public function __construct(
        KurikulumMapelServices $mapelKurikulum
    ) {
        $this->mapelKurikulum = $mapelKurikulum;
    }

    public function save_mapel(Request $request)
    {
        try {
            $res = $this->mapelKurikulum->enrolMapel($request->group_id, $request->mapel_id);
            return $this->apiResponse()
                ->services($res)
                ->send();
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage());
            // throw new Exception('Internal server malfunction.');
        }
    }
}
