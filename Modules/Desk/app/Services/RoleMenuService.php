<?php

namespace Modules\Desk\Services;

use Modules\Desk\Repositories\RoleMenuRepository;

class RoleMenuService
{
    protected $repository;
    public function __construct(RoleMenuRepository $repository)
    {
        $this->repository = $repository;
    }
    
    public function listRole($roleId){
        $aArrMenus = $this->repository->fetchMenuRole($roleId);
        return $aArrMenus;
        // return $aArrMenus->map(function ($item) {
        //     return [
        //         'id' => $item->id,
        //         'name' => ucwords($item->name)
        //     ];
        // });
    }

}
