<?php

namespace Modules\Desk\Repositories;

use App\Models\Tingkat as MainModel;

class TingkatRepository
{

    public function getComboData(array $conditions = [])
    {
        // Periksa jika ada kondisi filter
        $query = MainModel::select('id', 'name'); // Ambil hanya field yang dibutuhkan

        if (!empty($conditions)) {
            $query->where($conditions);
        }

        return $query->get(); // Dapatkan hasil
    }

    
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

    // public function delete($id)
    // {
    //     $model = $this->find($id);
    //     $model->delete();
    //     return $model;
    // }
    
}
