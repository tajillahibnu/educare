<?php

namespace Modules\Core\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Proses login
    public function login(Request $request)
    {
        $isEmail = filter_var($request->input('email-username'), FILTER_VALIDATE_EMAIL);
        // Tentukan bidang yang akan digunakan berdasarkan jenis input
        $field = $isEmail ? 'email' : 'username';
        $rememberMe = $request->has('remember_me'); // Cek apakah "Remember Me" dicentang
        if (Auth::attempt([$field => $request->input('email-username'), 'password' => $request->input('password')], $rememberMe)) {
            $user = Auth::user();
            // $getRole = Role::where('id', $user->primary_role_id)->get()->toArray();
            $getRole = Role::where('id', $user->primary_role_id)->first();
            session()->put('user_role', 'admin');
            session()->put('akses_module', 'admin');

            return redirect()->intended('/desk');
            // if($getRole->name == 'Admin'){
            // }

            // if($getRole->name == 'User'){
            //     return redirect()->intended('/user');
            // }
        }
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }
    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect('desk/login');
    }
}
