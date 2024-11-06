<?php

namespace Modules\Desk\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use Modules\Desk\Services\ComboService;
use Modules\Desk\Services\Management\AkunUserService;

class UserController extends Controller
{
    use ApiResponseTrait;
    protected $mainServices;
    protected $comboServices;
    public function __construct(
        AkunUserService $mainServices,
        ComboService $comboServices
    ) {
        $this->mainServices = $mainServices;
        $this->comboServices = $comboServices;
    }

    public function update(Request $request, $id)
    {
        $save['name'] = $request->name;
        $save['primary_role_id'] = $request->main_role;
        $r = $this->mainServices->update($id,$save,$request->sub_role);
        return $this->apiResponse()
            ->services($r)
            ->send();
    }

    public function show(Request $request)
    {
        $id = $request->id;
        $r = $this->mainServices->getUserId($id);
        return $this->apiResponse()
            ->services($r)
            ->send();
    }

    public function comboRole()
    {
        $r = [];
        $r = $this->comboServices->role();
        return $this->apiResponse()
            ->services($r)
            ->send();
    }

    public function mainTable(Request $request)
    {
        $filter = [];
        return $this->mainServices->table($filter);
    }
}
