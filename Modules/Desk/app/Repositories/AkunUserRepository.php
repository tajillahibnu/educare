<?php

namespace Modules\Desk\Repositories;
use App\Repositories\BaseRepository;
use App\Models\User as MainModel;


class AkunUserRepository extends BaseRepository
{
    public function __construct(MainModel $model)
    {
        parent::__construct($model);
    }
}
