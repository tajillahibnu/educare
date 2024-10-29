<?php

namespace Modules\Desk\Http\Controllers\Kurikulum;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use Modules\Desk\Services\Kurikulum\KelompokMapelService;

class KelompokMapelController extends Controller
{
    use ApiResponseTrait;
    protected $mainServices;
    public function __construct(KelompokMapelService $mainServices)
    {
        $this->mainServices = $mainServices;
    }
    
    public function store(Request $request)
    {
        $save['name']           = $request->name;
        $save['kurikulum_id']   = $request->kurikulum_id;
        $r = $this->mainServices->store($save);
        return $this->apiResponse()
            ->services($r)
            ->send();
    }

    public function update(Request $request, $id)
    {
        $save['name'] = $request->name;
        $r = $this->mainServices->update($id,$save);
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
}
