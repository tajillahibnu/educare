<?php

namespace Modules\Desk\Services;

use App\Models\AcademicYear;
use App\Models\Kurikulum;
use App\Models\Role;
use App\Models\Tingkat;

class ComboService
{
    public function role()
    {
        $data = Role::select('id', 'name')->get();
        return $data->map(function ($item) {
            return [
                'id' => $item->id,
                'name' => ucwords($item->name)
            ];
        });
    }

    public function tahun_pelajaran()
    {
        $data = AcademicYear::select('year AS id', 'year AS name')->get();
        return $data->map(function ($item) {
            return [
                'id' => $item->id,
                'name' => ucwords($item->name)
            ];
        });
    }

    public function kurikulum()
    {
        $data = Kurikulum::select('id', 'name')
            ->where('is_active', true)
            ->get();
        return $data->map(function ($item) {
            return [
                'id' => $item->id,
                'name' => ucwords($item->name)
            ];
        });
    }

    public function tingkat()
    {
        $data = Tingkat::select('id', 'name')
            ->where('tipe', 'SMP')
            ->get();
        return $data->map(function ($item) {
            return [
                'id' => $item->id,
                'name' => ucwords($item->name)
            ];
        });
    }


    // public function test()
    // {
    //     // Panggil fungsi dari repository
    //     // $condition = [
    //     //     ['id', '<=', '3'],
    //     //     // ['id','IN',['3']],
    //     // ];
    //     // $data = $this->role->all($condition);
    //     // return $data;
    //     // Format data jika diperlukan, misalnya jadi array id dan name
    //     // return $data->map(function ($item) {
    //     //     return [
    //     //         'id' => $item->id,
    //     //         'name' => ucwords($item->name)
    //     //     ];
    //     // });
    // }
}
