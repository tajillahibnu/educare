<?php

namespace Modules\Desk\Repositories;
use App\Models\Student as MainModel;

class SiswaRepository
{
    public function all()
    {
        // Cek apakah ada kondisi where yang diberikan
        if (!empty($conditions)) {
            // Jika ada, gunakan where dengan kondisi yang diberikan
            return MainModel::where($conditions)->get();
        }

        // Jika tidak ada kondisi, tampilkan semua data
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
