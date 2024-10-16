<?php

namespace Modules\Desk\Services\Master;

use App\Models\AcademicYear;
use App\Models\Mapel;
use Illuminate\Database\QueryException;

class TahunAkademikServices
{
    public function store()
    {
        $request = request();
        $response['success'] = false;
        $response['statusCode'] = 200;
        try {
            $model = new AcademicYear();
            $model->year    = $request->year;

            $model->save();
            $response = $model;
            $response['success'] = true;
        } catch (QueryException $e) {
            $response['statusCode'] = 400;
            $response['message'] = $e->getMessage();
        }
        return $response;
    }

    public function update($id)
    {
        $request = request();
        $response['success'] = false;
        $response['statusCode'] = 200;
        try {
            $model = AcademicYear::find($id);
            $model->year    = $request->year;

            $model->save();
            $response = $model;
            $response['success'] = true;
        } catch (QueryException $e) {
            $response['statusCode'] = 400;
            $response['message'] = $e->getMessage();
        }
        return $response;
    
    }
    public function delete($id)
    {
        $request = request();
        $response['success'] = false;
        $response['statusCode'] = 200;
        try {
            $modal = AcademicYear::find($id);
            $modal->delete();
            $response['success'] = true;
        } catch (QueryException $e) {
            $response['statusCode'] = 400;
            $response['message'] = $e->getMessage();
        }
        return $response;
    }
}
