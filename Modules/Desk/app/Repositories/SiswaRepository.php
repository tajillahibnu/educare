<?php

namespace Modules\Desk\Repositories;

use App\Models\Student as MainModel;
use App\Repositories\BaseRepository;

class SiswaRepository extends BaseRepository
{
    public function __construct(MainModel $model)
    {
        parent::__construct($model);
    }
}
