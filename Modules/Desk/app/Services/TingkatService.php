<?php

namespace Modules\Desk\Services;

use Modules\Desk\Repositories\TingkatRepository;

class TingkatService
{
    protected $repository;
    public function __construct(TingkatRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getComboOptions(array $conditions = [])
    {
        // Panggil fungsi dari repository
        $data = $this->repository->getComboData($conditions);

        // Format data jika diperlukan, misalnya jadi array id dan name
        return $data->map(function ($item) {
            return [
                'id' => $item->id,
                'name' => ucwords($item->name)
            ];
        });
    }
}
