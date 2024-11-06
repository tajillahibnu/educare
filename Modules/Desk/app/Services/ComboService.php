<?php

namespace Modules\Desk\Services;

use App\Models\Role;

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
