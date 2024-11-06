<?php

namespace Modules\Desk\Repositories;

use App\Repositories\BaseRepository;
use App\Models\KelompokMapel as MainModel;

class MapelRepository extends BaseRepository
{
    public function __construct(MainModel $model)
    {
        parent::__construct($model);
    }

    // public function storeMapelToKelompokMapel($groupId,$subjectIds){
    //     $group = $this->model->findOrFail($groupId);
    //     $group->mapel()->attach($subjectIds);
    //     return $group;
    // }
}
