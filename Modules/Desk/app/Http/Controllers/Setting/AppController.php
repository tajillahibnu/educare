<?php

namespace Modules\Desk\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponseTrait;
use Exception;
use Illuminate\Http\Request;
use Modules\Desk\Services\Setting\AppService;

class AppController extends Controller
{
    use ApiResponseTrait;
    protected $mainServices;
    public function __construct(AppService $mainServices)
    {
        $this->mainServices = $mainServices;
    }

    public function read(Request $request){
        $data = $request->input();
        try {
            $r = $this->mainServices->getConfigApp();
            return $this->apiResponse()
                ->services($r)
                ->send();
        } catch (\Throwable $th) {
            throw new Exception('Internal server malfunction.');
        }
    }

    public function update(Request $request){
        $data = $request->input();
        try {
            $r = $this->mainServices->update($data);
            return $this->apiResponse()
                ->services($r)
                ->send();
        } catch (\Throwable $th) {
            
            throw new Exception('Internal server malfunctionxxx.'.$th->getMessage());
        }
    }
}
