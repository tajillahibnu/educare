<?php

namespace Modules\Desk\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class PageController extends Controller
{
    public function loadPage(Request $request)
    {
        // Cek apakah ada parameter khusus yang dikirim dari axios
        $page = $request->input('page');

        // Render Blade view sesuai permintaan
        if ($page === 'dashboard') {
            $html = view('desk::Dashboard.table')->render();
        } else if ($page === 'profile') {
            $html = view('desk::Dashboard.table')->render();
        } else {
            $html = view('desk::Dashboard.table')->render();
        }
        $encryptedHtml = encryptData($html);
        // Kembalikan HTML yang sudah dirender sebagai respons
        return response()->json([
            'success' => true,
            'html' => $encryptedHtml,
        ]);
    }
}
