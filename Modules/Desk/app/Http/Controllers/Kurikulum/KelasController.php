<?php

namespace Modules\Desk\Http\Controllers\Kurikulum;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Desk\Services\Kurikulum\KelasService;
use Modules\Desk\Services\TingkatService;

class KelasController extends Controller
{
    use ApiResponseTrait;
    protected $mainServices;
    protected $ComboServices;
    public function __construct(
        KelasService $mainServices,
        TingkatService $ComboServices,
    ) {
        $this->mainServices = $mainServices;
        $this->ComboServices = $ComboServices;
    }

    public function store(Request $request)
    {
        $save['name']           = $request->name;
        $save['kurikulum_id']   = $request->kurikulum_id;
        $save['tingkat_id']     = $request->tingkat_id;
        $r = $this->mainServices->store($save);
        return $this->apiResponse()
            ->services($r)
            ->send();
    }

    public function update(Request $request, $id)
    {
        $save['name']           = $request->name;
        $save['kurikulum_id']   = $request->kurikulum_id;
        $save['tingkat_id']     = $request->tingkat_id;
        $r = $this->mainServices->update($id, $save);
        return $this->apiResponse()
            ->services($r)
            ->send();
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $r = $this->mainServices->delete($id);
        return $this->apiResponse()
            ->services($r)
            ->send();
    }

    public function comboTingkat()
    {
        $r = $this->ComboServices->getComboOptions();
        return $this->apiResponse()
            ->services($r)
            ->send();
    }

    public function table(Request $request)
    {
        $filter = [];
        $filter['kurikulum_id'] = $request->kurikulum_id;
        return $this->mainServices->table($filter);
    }
}
