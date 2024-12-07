<?php

namespace Modules\Desk\Services\Setting;

use Exception;
use Illuminate\Support\Facades\Log;
use Modules\Desk\Repositories\ConfigAppRepository;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AppService
{
    protected $repository;
    public function __construct(ConfigAppRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getConfigApp()
    {
        try {
            $where[] = ['config_tipe', 'in', ['app','sekolah','smtp']];
            return $this->repository->all($where);
        } catch (Exception $e) {
            Log::error("General error: " . $e->getMessage());
            throw new Exception("Could not retrieve item", 500);
        }
    }

    public function update(array $data)
    {
        $response['success'] = false;
        $response['statusCode'] = 400;
        try {
            foreach ($data as $key => $value) {
                if ($value != '') {
                    $response[$key] = $this->repository->update(['config_value' => $value], [['config_name', '=', $key]]);
                }
            }
            $response['success'] = true;
            $response['statusCode'] = 200;
        } catch (Exception $e) {
            $response['message'] = $e->getMessage();
            Log::error("Error updating : " . $response['message']);
            throw new Exception("Failed to update item", 500);
        }
        return $response;
    }
}
