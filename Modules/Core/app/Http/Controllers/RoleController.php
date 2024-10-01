<?php

namespace Modules\Core\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    public function changeRole(Request $request, $roleId)
    {
        $user = Auth::user();

        // Pastikan role yang dipilih adalah salah satu role yang dimiliki user
        if ($user->roles()->where('id', $roleId)->exists()) {
            $user->primary_role_id = $roleId;
            $user->save();

            return redirect()->back()->with('success', 'Role berhasil diubah.');
        }

        return redirect()->back()->with('error', 'Role tidak valid.');
    }
}
