<?php

namespace Modules\Desk\Repositories;

use App\Models\KelompokMapel;

class MapelRepository
{
    protected $model;

    public function __construct(KelompokMapel $model)
    {
        $this->model = $model;
    }


    public function storeMapelToKelompokMapel($groupId,$subjectIds){
        $group = $this->model->findOrFail($groupId);
        $group->mapel()->attach($subjectIds);
        return $group;
    }
}
