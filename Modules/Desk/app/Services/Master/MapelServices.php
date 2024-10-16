<?php

namespace Modules\Desk\Services\Master;

use App\Models\Mapel;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpFoundation\JsonResponse;

class MapelServices
{
    public function store()
    {
        $request = request();
        $response['success'] = false;
        $response['statusCode'] = 200;
        try {
            $model = new Mapel();
            $model->code    = $request->name;
            $model->name    = $request->name;

            $model->save();
            $response = $model;
            $response['success'] = true;
        } catch (QueryException $e) {
            $response['statusCode'] = 400;
            $response['message'] = $e->getMessage();
            // if ($e->errorInfo[1] == 1062) {
            //     if (strpos($e->getMessage(), 'mapel_kode_unique') !== false) {
            //         $response['message'] = 'Kode Sudah Digunakan';
            //     }
            // }
        }
        return $response;
    }

    public function update($id)
    {
        $request = request();
        $response['success'] = false;
        $response['statusCode'] = 200;
        try {
            $model = Mapel::find($id);
            $model->code    = $request->name;
            $model->name    = $request->name;

            $model->save();
            $response = $model;
            $response['success'] = true;
        } catch (QueryException $e) {
            $response['statusCode'] = 400;
            $response['message'] = $e->getMessage();
            // if ($e->errorInfo[1] == 1062) {
            //     if (strpos($e->getMessage(), 'mapel_kode_unique') !== false) {
            //         $response['message'] = 'Kode Sudah Digunakan';
            //     }
            // }
        }
        return $response;
    
    }
    public function delete($id)
    {
        $request = request();
        $response['success'] = false;
        $response['statusCode'] = 200;
        try {
            $modal = Mapel::find($id);
            $modal->delete();
            $response['success'] = true;
        } catch (QueryException $e) {
            $response['statusCode'] = 400;
            $response['message'] = $e->getMessage();
            // if ($e->errorInfo[1] == 1062) {
            //     if (strpos($e->getMessage(), 'mapel_kode_unique') !== false) {
            //         $response['message'] = 'Kode Sudah Digunakan';
            //     }
            // }
        }
        return $response;
    }
}
