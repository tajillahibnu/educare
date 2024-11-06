<?php

namespace Modules\Desk\Repositories;

use App\Models\Role as MainModel;
use App\Repositories\BaseRepository;

class RoleRepository extends BaseRepository
{
    public function __construct(MainModel $model)
    {
        parent::__construct($model);
    }
}
