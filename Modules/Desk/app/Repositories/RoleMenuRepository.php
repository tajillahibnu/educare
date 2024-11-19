<?php

namespace Modules\Desk\Repositories;

use App\Models\MenuRole as MainModel;
use App\Repositories\BaseRepository;

class RoleMenuRepository extends BaseRepository
{
    public function __construct(MainModel $model)
    {
        parent::__construct($model);
    }

    public function fetchMenuRole($roleId)
    {
        $getAll = MainModel::where('role_id', $roleId)
            ->join('menus', 'menu_roles.menu_id', '=', 'menus.id') // Join ke tabel roles
            ->get();
        return $getAll;
    }
}
