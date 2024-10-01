<?php

use Illuminate\Support\Facades\Route;
use Modules\Core\Http\Controllers\AuthController;
use Modules\Desk\Http\Controllers\DashboardController;
use Modules\Desk\Http\Controllers\DeskController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'desk', 'middleware' => 'guest'], function () {
    Route::get('login', [DeskController::class, 'showLoginForm'])->name('login');
    // Route::post('login', [AuthController::class, 'login'])->name('login.post');
});

Route::group(['prefix' => 'desk', 'middleware' => ['auth','loadMenu']], function () {
    Route::get('/', [DeskController::class, 'index'])->name('/');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('desk.dashboard');
});
Route::group(['prefix' => 'desk', 'middleware' => ['auth']], function () {
    Route::post('/content', [DeskController::class, 'loadContent'])->name('desk.content');
});



// Route::get('/login', [DeskController::class, 'showLoginForm'])->name('login');

// Rute untuk Login dan Autentikasi
Route::group(['prefix' => 'core'], function () {
    Route::get('logout', [AuthController::class, 'logout'])->name('core.logout');
    Route::post('do_login', [AuthController::class, 'login'])->name('core.do_login');
});

// php artisan module:make-middleware LoadMenu Desk
