<?php

namespace Modules\Desk\Services;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Exception;
use Illuminate\Support\Facades\Cache;

class ShowPageService
{
    protected $defaultView = 'default-template'; // Template default yang akan dicopy jika view belum ada
    protected $viewPath;

    /**
     * Render HTML dari view table.
     *
     * @return string
     */
    public function show(Request $request)
    {
        $html = '';
        // Ambil id menu dari request
        $page = $request->input('params');
        $menu = json_decode(decryptData($page), true);
        $menuId = $menu['id'];
        $html = '';
        $plugins = '';

        // // Cari menu di database
        $menu = $this->getMenu($menuId);

        if (!$menu) {
            throw new Exception('Menu not found!');
        }
        if (empty($menu->view_path)) {
            $html = 'View path file does not exist';
            // throw new Exception('View path file does not exist!');
        }


        if ($html == '') {
            if (empty($menu->view_file)) {
                throw new Exception('View file does not exist!');
            }
            // Ambil lokasi path view dari menu
            $this->viewPath = 'desk::' . str_replace('/', '.', $menu->view_path . $menu->view_file);
            if (!view()->exists($this->viewPath)) {
                // Path template default
                $this->copyDefaultView($menu->view_path . $menu->view_file);
                throw new Exception('View file does not exist! ' . $this->viewPath);
            } else {
                $html = view($this->viewPath)->render();
            }

            $pluginsLocation = 'desk::' . str_replace('/', '.', $menu->view_path . 'plugins');
            if (view()->exists($pluginsLocation)) {
                $plugins = view($pluginsLocation)->render();
            }
        }
        // Render view berdasarkan path yang ditemukan
        try {
            $html = encryptData($html);
            $plugins = encryptData($plugins);
        } catch (\Throwable $e) {
            throw new Exception('View not found or error in rendering view.');
        }

        return ['html' => $html, 'plugins' => $plugins];

        // Render HTML dari view dan return
        // return encryptData($html);
    }

    protected function getMenu($menuId)
    {
        $menu = Cache::remember("menu_{$menuId}", 60, function () use ($menuId) {
            return Menu::find($menuId);
        });
        return $menu;
    }

    protected function copyDefaultView($viewPath)
    {
        // Tentukan path fisik dari view file yang akan di copy
        $sourcePath = base_path('Modules/Desk/resources/views/' . $this->defaultView . '.blade.php');
        $destinationPath = base_path('Modules/Desk/resources/views/' . $viewPath . '.blade.php');
        // $sourcePath = resource_path('views/' . str_replace('::', '/', $this->defaultView) . '.blade.php');
        $destinationDir = dirname($destinationPath); // Direktori tujuan

        // Buat folder jika belum ada
        if (!is_dir($destinationDir)) {
            mkdir($destinationDir, 0755, true); // Buat folder secara rekursif
        }

        // Cek apakah file source ada
        if (file_exists($sourcePath)) {
            // Copy file template default ke tujuan
            copy($sourcePath, $destinationPath);
        } else {
            throw new \Exception("Default view file does not exist.");
        }
    }
}
