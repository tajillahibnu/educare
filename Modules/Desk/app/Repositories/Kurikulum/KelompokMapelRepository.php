<?php

namespace Modules\Desk\Repositories\Kurikulum;
use App\Models\KelompokMapel as MainModel;

class KelompokMapelRepository
{
    public function all()
    {
        return MainModel::all();
    }

    public function find($id)
    {
        return MainModel::findOrFail($id);
    }

    public function create(array $data)
    {
        return MainModel::create($data);
    }

    public function update($id, array $data)
    {
        $model = $this->find($id);
        $model->update($data);
        return $model;
    }

    public function delete($id)
    {
        $model = $this->find($id);
        $model->delete();
        return $model;
    }
}
