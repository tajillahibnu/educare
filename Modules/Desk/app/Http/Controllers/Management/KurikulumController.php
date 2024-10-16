<?php

namespace Modules\Desk\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Services\DataTableService;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use Exception;
use Modules\Desk\Services\Master\MapelServices;

class KurikulumController extends Controller
{
    use ApiResponseTrait;
    protected $mapelServices;
    public function __construct(MapelServices $mapelServices)
    {
        $this->mapelServices = $mapelServices;
    }

    public function store(Request $request)
    {
        $data = $request->input();
        try {
            $r = $this->mapelServices->store();
            return $this->apiResponse()
                ->services($r)
                ->send();
        } catch (\Throwable $th) {
            throw new Exception('Internal server malfunction.');
        }
    }

    public function update(Request $request, $id)
    {
        $data = $request->input();
        try {
            $r = $this->mapelServices->update($id);
            return $this->apiResponse()
                ->services($r)
                ->send();
        } catch (\Throwable $th) {
            throw new Exception('Internal server malfunction.');
        }
    }

    public function delete(Request $request)
    {
        try {
            $id = $request->input('id');
            $r = $this->mapelServices->delete($id);
            return $this->apiResponse()
                ->services($r)
                ->send();
        } catch (\Throwable $th) {
            throw new Exception('Internal server malfunction.');
        }
    }

    public function mainTable(Request $request)
    {
        return DataTableService::draw('kurikulums')
            // ->where('deleted_at', 'IS', NULL)
            ->addColumn('action', function ($detail) {
                // <button class="btn btn-sm btn-icon btn-text-secondary rounded-pill waves-effect waves-light"><i class="ti ti-edit ti-md"></i></button>
                return '
                <div class="d-inline-block text-nowrap">
                    <button class="btn btn-sm btn-icon btn-text-secondary rounded-pill waves-effect waves-light" data-permision="user-update" onclick="onDetailPage(this)" data-params="' . base64_encode(json_encode($detail)) . '"><i class="ti ti-eye ti-md"></i></button>
                    <button class="btn btn-sm btn-icon btn-text-secondary rounded-pill waves-effect waves-light dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false"><i class="ti ti-dots-vertical ti-md"></i></button>
                    <div class="dropdown-menu dropdown-menu-end m-0" style="">
                        <a class="dropdown-item waves-effect" href="javascript:void(0);" data-permision="user-update" onclick="editData(this)" data-params="' . base64_encode(json_encode($detail)) . '">Edit</a>
                        <a class="dropdown-item waves-effect" href="javascript:void(0);" data-permision="user-update" onclick="deleteData(this)" data-params="' . base64_encode(json_encode($detail)) . '">Delete</a>
                    </div>
                </div>
                ';
            })
            ->toJson();
    }
}
