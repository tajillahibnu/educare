<?php

namespace Modules\Desk\Services\Management;

use App\Models\RoleUser;
use App\Services\DataTableService;
use Exception;
use Illuminate\Support\Facades\Log;
use Modules\Desk\Repositories\AkunUserRepository;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AkunUserService
{
    protected $repository;
    public function __construct(
        AkunUserRepository $repository,
    ) {
        $this->repository = $repository;
    }

    public function update($id, array $data, array $subRole)
    {
        $response['success'] = false;
        $response['statusCode'] = 400;
        try {
            $response = $this->repository->update($data,$id);
            
            if (!empty($subRole)) {
                if (!in_array($data['primary_role_id'], $subRole)) {
                    $subRole[] = $data['primary_role_id']; // Tambahkan nilai hanya jika belum ada
                }
            } else {
                $subRole[] = $data['primary_role_id']; // Tambahkan nilai hanya jika belum ada
            }

            $modal = RoleUser::where('user_id', $id)->delete();
            foreach ($subRole as $item) {
                $model = new RoleUser();
                $model->user_id  = $id;
                $model->role_id  = $item;
                $model->is_primary  = $item === $data['primary_role_id'] ? 1 : 0;
                $model->save();
            }

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

    public function getUserId($id)
    {
        try {
            $data = $this->repository->find($id);
            $list = RoleUser::select('role_id')
                ->where('user_id', $id)
                // ->where('is_primary', '0')
                ->get();
            $data['subRole'] = $list->map(function ($item) {
                return $item->role_id;
            });
            return $data;
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
        return DataTableService::draw('users')
            ->select(['users.id', 'users.name', 'users.email', 'users.is_active', 'roles.name AS role_name'])
            ->join('roles', [
                ['roles.id', '=', 'users.primary_role_id'],
            ])
            ->addColumn('action', function ($detail) {
                return '
                <div class="btn-group">
                    <button type="button" class="btn btn-outline btn-outline-primary btn-icon dropdown-toggle hide-arrow waves-effect waves-light" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="ti ti-dots-vertical"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" style="">
                        <li><a class="dropdown-item waves-effect" href="javascript:void(0);" data-permision="user-update" onclick="onEditUser(this)" data-params="' . base64_encode(json_encode($detail)) . '">Edit</a></li>
                        <li><a class="dropdown-item waves-effect" href="javascript:void(0);" data-permision="user-update" onclick="onView(this)" data-params="' . base64_encode(json_encode($detail)) . '">Delete</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item waves-effect" href="javascript:void(0);">Reset Password</a></li>
                    </ul>
                </div>
                ';
            })
            // ->showQueries(true)
            ->toJson();
    }
}
