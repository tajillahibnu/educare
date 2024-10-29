<?php

namespace Modules\Desk\Services;

use App\Models\Kurikulum;
use Modules\Desk\Repositories\KurikulumRepository;
use App\Services\DataTableService;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class KurikulumService
{
    protected $repository;
    public function __construct(KurikulumRepository $repository)
    {
        $this->repository = $repository;
    }

    public function store(array $data)
    {
        $response['success'] = false;
        $response['statusCode'] = 200;
        try {
            $response = $this->repository->create($data);
            $response['success'] = true;
        } catch (QueryException $e) {
            $response['statusCode'] = 400;
            $response['message'] = $e->getMessage();
        }
        return $response;
    }

    public function update($id, array $data)
    {
        $response['success'] = false;
        $response['statusCode'] = 400;
        try {
            $response['data'] = $this->repository->update($id, $data);
            $response['success'] = true;
            $response['statusCode'] = 200;
        } catch (NotFoundHttpException $e) {
            $response['message'] = "Item with ID $id not found for update";
            throw new NotFoundHttpException($response['message']);
        } catch (Exception $e) {
            $response['message'] = $e->getMessage();
            Log::error("Error updating : " . $response['message']);
            throw new Exception("Failed to update item", 500);
        }
        return $response;
    }
    public function delete($id = null)
    {
        $response['success'] = false;
        $response['statusCode'] = 400;
        try {
            $response = $this->repository->delete($id);
            $response['success'] = true;
            $response['statusCode'] = 200;
        } catch (NotFoundHttpException $e) {
            throw new NotFoundHttpException("Item with ID $id not found for deletion");
        } catch (Exception $e) {
            $response['message'] = $e->getMessage();
            Log::error("Error deleting item: " . $e->getMessage());
            throw new Exception("Failed to delete item".$e->getMessage(), 500);
        }
    }

    public function getKurikulumId($id)
    {
        try {
            return $this->repository->find($id);
        } catch (NotFoundHttpException $e) {
            throw new NotFoundHttpException("Item with ID $id not found");
        } catch (Exception $e) {
            Log::error("General error: " . $e->getMessage());
            throw new Exception("Could not retrieve item", 500);
        }

        return $this->repository->find($id);
    }

    public function table()
    {
        return DataTableService::draw('kurikulums')
            ->where('deleted_at', 'IS', NULL)
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
