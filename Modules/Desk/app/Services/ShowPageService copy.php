<?php

namespace Modules\Desk\Services;

use App\Models\Menu;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ShowPageService
{
    /**
     * Mendapatkan semua Menu.
     *
     * @return Collection
     */
    public function getAll(): Collection
    {
        return Menu::all();
    }

    /**
     * Membuat Menu baru.
     *
     * @param array $data
     * @return Menu
     */
    public function create(array $data): Menu
    {
        return Menu::create($data);
    }

    /**
     * Mendapatkan Menu berdasarkan ID.
     *
     * @param int $id
     * @return Menu
     * @throws ModelNotFoundException
     */
    public function getById(int $id): Menu
    {
        return Menu::findOrFail($id);
    }

    /**
     * Mengupdate Menu.
     *
     * @param array $data
     * @param int $id
     * @return Menu
     * @throws ModelNotFoundException
     */
    public function update(array $data, int $id): Menu
    {
        $Menu = Menu::findOrFail($id);
        $Menu->update($data);
        return $Menu;
    }

    /**
     * Menghapus Menu.
     *
     * @param int $id
     * @return bool
     * @throws ModelNotFoundException
     */
    public function delete(int $id): bool
    {
        $Menu = Menu::findOrFail($id);
        return $Menu->delete();
    }
}
