<?php

namespace Modules\Desk\Repositories;

use App\Models\Config as MainModel;
use App\Repositories\BaseRepository;

class ConfigAppRepository extends BaseRepository
{
    public function __construct(MainModel $model)
    {
        parent::__construct($model);
    }
}
