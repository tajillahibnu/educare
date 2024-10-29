<?php

namespace Modules\Desk\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use Modules\Desk\Services\KurikulumService;

class KurikulumController extends Controller
{
    use ApiResponseTrait;
    protected $mainServices;
    public function __construct(KurikulumService $mainServices)
    {
        $this->mainServices = $mainServices;
    }

    public function store(Request $request)
    {
        $save['name'] = $request->name;
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
    public function update_status(Request $request)
    {
        $save['is_active'] = (int) $request->status;
        $r = $this->mainServices->update($request->kurikulum_id,$save);
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
