<?php

namespace Modules\Desk\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Services\DataTableService;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use Exception;
use Modules\Desk\Http\Requests\Master\TahunAkademikRequest AS mainRequest;
use Modules\Desk\Services\Master\TahunAkademikServices;

class TahunAkademikController extends Controller
{
    use ApiResponseTrait;
    protected $mainservices;
    public function __construct(TahunAkademikServices $mainservices)
    {
        $this->mainservices = $mainservices;
    }

    public function store(mainRequest $request)
    {
        $data = $request->input();
        try {
            $r = $this->mainservices->store();
            return $this->apiResponse()
                ->services($r)
                ->send();
        } catch (\Throwable $th) {
            throw new Exception('Internal server malfunction.');
        }
    }

    public function update(mainRequest $request, $id)
    {
        $data = $request->input();
        try {
            $r = $this->mainservices->update($id);
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
            $r = $this->mainservices->delete($id);
            return $this->apiResponse()
                ->services($r)
                ->send();
        } catch (\Throwable $th) {
            throw new Exception('Internal server malfunction.');
        }
    }

    public function mainTable(Request $request)
    {
        return DataTableService::draw('academic_years')
            // ->where('deleted_at', 'IS', NULL)
            ->addColumn('action', function ($detail) {
                return '
                <div class="btn-group">
                    <button type="button" class="btn btn-outline btn-outline-primary btn-icon dropdown-toggle hide-arrow waves-effect waves-light" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="ti ti-dots-vertical"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" style="">
                        <li><a class="dropdown-item waves-effect" href="javascript:void(0);" data-permision="user-update" onclick="editData(this)" data-params="' . base64_encode(json_encode($detail)) . '">Edit</a></li>
                        <li><a class="dropdown-item waves-effect" href="javascript:void(0);" data-permision="user-update" onclick="deleteData(this)" data-params="' . base64_encode(json_encode($detail)) . '">Delete</a></li>
                    </ul>
                </div>
                ';
            })
            ->toJson();
    }
}
