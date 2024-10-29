<?php

namespace Modules\Desk\Services\Kurikulum;

use App\Services\DataTableService;
use App\Traits\ApiResponseTrait;
use Illuminate\Support\Facades\DB;
use Modules\Desk\Repositories\MapelRepository;

class MapelServices
{
    use ApiResponseTrait;
    protected $mainRepository;
    public function __construct(MapelRepository $mainRepository)
    {
        $this->mainRepository = $mainRepository;
    }

    public function enrolMapel($groupId, $mapelId)
    {
        return $this->mainRepository->storeMapelToKelompokMapel($groupId, $mapelId);
    }

    public function table($kelompok_id)
    {
        return DataTableService::draw('mapels')
            ->where('is_active', '=', 1)
            ->where('deleted_at', 'IS', NULL)
            ->addColumn('enrol_mapel', function ($detail) use ($kelompok_id) {
                $get = DB::table('kurikulum_kelompok_mapels')
                    ->where('mapel_id', '=', $detail->id)
                    ->where('kelompok_mapel_id', '=', $kelompok_id)
                    ->first();
                $checked = empty($get) ? '' : 'checked';
                return '
                <label class="switch">
                    <input type="checkbox" ' . $checked . ' class="switch-input" onchange="onSaveMapel(this)" data-params="' . base64_encode(json_encode($detail)) . '" data-enrol="' . base64_encode(json_encode($get)) . '">
                        <span class="switch-toggle-slider">
                            <span class="switch-on"></span>
                            <span class="switch-off"></span>
                        </span>
                    </label>
                ';
            })
            ->toJson();
    }
}
