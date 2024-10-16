<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Desk\Http\Controllers\Management\SiswaController;
use Modules\Desk\Http\Controllers\Master\MapelController;
use Modules\Desk\Http\Controllers\Master\TahunAkademikController;

/*
    |--------------------------------------------------------------------------
    | API Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register API routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | is assigned the "api" middleware group. Enjoy building your API!
    |
*/

// Route::middleware(['auth:sanctum'])->prefix('v1')->name('api.')->group(function () {
//     Route::get('management', fn (Request $request) => $request->user())->name('management');
// });


Route::group(['prefix' => 'master/tahun_akademik', 'middleware' => ['web', 'auth']], function () {
    Route::post('main-table', [TahunAkademikController::class, 'mainTable'])->name('main-table');
    Route::post('store', [TahunAkademikController::class, 'store'])->name('store');
    Route::post('update/{id}', [TahunAkademikController::class, 'update'])->name('update');
    Route::post('delete', [TahunAkademikController::class, 'delete'])->name('delete');
});
