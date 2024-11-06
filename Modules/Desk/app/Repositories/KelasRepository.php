<?php

namespace Modules\Desk\Repositories;

use App\Repositories\BaseRepository;

use App\Models\Rombel as MainModel;

class KelasRepository extends BaseRepository
{
    public function __construct(MainModel $model)
    {
        parent::__construct($model);
    }
}
