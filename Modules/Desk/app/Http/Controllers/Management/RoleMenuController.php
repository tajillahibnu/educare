<?php

namespace Modules\Desk\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Desk\Services\ComboService;
use Modules\Desk\Services\RoleMenuService;

class RoleMenuController extends Controller
{
    use ApiResponseTrait;
    protected $mainServices;
    protected $comboServices;
    public function __construct(
        RoleMenuService $mainServices,
        ComboService $comboServices
    ) {
        $this->mainServices = $mainServices;
        $this->comboServices = $comboServices;
    }

    public function listmenu(Request $request){
        $role_id = $request->role_id;
        $r = $this->mainServices->listRole($role_id);
        return $this->apiResponse()
            ->services($r)
            ->send();
    }

    
    public function comboRole()
    {
        $r = $this->comboServices->role();
        return $this->apiResponse()
            ->services($r)
            ->send();
    }
}
