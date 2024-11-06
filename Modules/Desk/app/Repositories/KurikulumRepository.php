<?php

namespace Modules\Desk\Repositories;

use App\Repositories\BaseRepository;

use App\Models\Kurikulum as MainModel;

class KurikulumRepository extends BaseRepository
{
    public function __construct(MainModel $model)
    {
        parent::__construct($model);
    }
}
