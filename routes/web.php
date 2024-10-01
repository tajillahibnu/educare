<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('desk');
    // return redirect('superadmin/login');
    // return view('welcome');
});


// Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
// Route::post('/login', [AuthController::class, 'login'])->name('login.post');
// Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
// Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
