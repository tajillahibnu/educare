<?php

namespace Modules\Desk\Services\Jurnal;

use App\Services\DataTableService;

class MengajarService 
{
    public function table()
    {
        return DataTableService::draw('jurnal_mengajars')
            ->addColumn('action', function ($detail) {
                return '
                <div class="btn-group">
                    <button type="button" class="btn btn-outline btn-outline-primary btn-icon dropdown-toggle hide-arrow waves-effect waves-light" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="ti ti-dots-vertical"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" style="">
                        <li><a class="dropdown-item waves-effect" href="javascript:void(0);" data-permision="user-update" onclick="onView(this)" data-param="' . base64_encode(json_encode($detail)) . '">Edit</a></li>
                        <li><a class="dropdown-item waves-effect" href="javascript:void(0);" data-permision="user-update" onclick="onView(this)" data-param="' . base64_encode(json_encode($detail)) . '">Delete</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item waves-effect" href="javascript:void(0);">Reset Password</a></li>
                    </ul>
                </div>
                ';
            })
            ->toJson();
    }
}
