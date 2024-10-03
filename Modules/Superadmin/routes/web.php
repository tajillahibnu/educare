<?php

use Illuminate\Support\Facades\Route;
use Modules\Superadmin\Http\Controllers\AuthController;
use Modules\Superadmin\Http\Controllers\SuperadminController;

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

// Route::group(['prefix' => 'superadmin','middleware' => 'auth'], function () {
//     Route::resource('/', SuperadminController::class)->names('/');
// });
// // Rute untuk superadmin
// // Route::group(['prefix' => 'superadmin', 'middleware' => 'auth'], function () {
// //     Route::get('/', [SuperadminController::class, 'index'])->name('superadmin.dashboard');
// //     // Anda bisa menambahkan rute lain di sini
// // });




// // // Rute untuk Superadmin
// Route::group(['middleware' => ['auth', 'role:admin']], function () {
//     Route::get('/superadmin/dashboard', [SuperadminController::class, 'index'])->name('superadmin.dashboard');
// });

// // Rute untuk User
// // Route::group(['middleware' => ['auth', 'role:user']], function () {
// //     Route::get('/user/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');
// //     // Tambahkan rute lain yang hanya dapat diakses oleh user
// // });


// // Route::resource('superadmin/login', AuthController::class)->names('superadmin/login');