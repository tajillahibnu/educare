<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Desk\Http\Controllers\Kurikulum\KelasController;
use Modules\Desk\Http\Controllers\Kurikulum\KelompokMapelController;
use Modules\Desk\Http\Controllers\Kurikulum\KurikulumMapelController;
use Modules\Desk\Http\Controllers\Management\KurikulumController;
use Modules\Desk\Http\Controllers\Master\KurikulumController as MasterKurikulumController;

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


Route::group(['prefix' => 'kurikulum/', 'middleware' => ['web', 'auth']], function () {
    Route::post('main-table', [KurikulumController::class, 'mainTable'])->name('main-table');
    Route::post('read', [KurikulumController::class, 'show'])->name('read');
    Route::post('table-kelompokmapel', [KurikulumController::class, 'tableKelompokMapel'])->name('table-kelompokmapel');
    Route::post('table-mapel', [KurikulumController::class, 'tableMapel'])->name('table-mapel');
    Route::post('store', [MasterKurikulumController::class, 'store'])->name('store');
    Route::post('update/{id}', [MasterKurikulumController::class, 'update'])->name('update');
    Route::post('update_status', [MasterKurikulumController::class, 'update_status'])->name('update_status');
    Route::post('delete', [MasterKurikulumController::class, 'delete'])->name('delete');
    Route::post('save_mapel', [KurikulumMapelController::class, 'save_mapel'])->name('save_mapel');
    /** Kelompok Matapelajaran */
    Route::group(['prefix' => 'kelompok_mapel'], function () {
        Route::post('store', [KelompokMapelController::class, 'store'])->name('store');
        Route::post('update/{id}', [KelompokMapelController::class, 'update'])->name('update');
        Route::post('delete', [KelompokMapelController::class, 'delete'])->name('delete');
    });

    Route::group(['prefix' => 'kelas'], function () {
        Route::post('table', [KelasController::class, 'table'])->name('table');
        Route::post('store', [KelasController::class, 'store'])->name('store');
        Route::post('update/{id}', [KelasController::class, 'update'])->name('update');
        Route::post('delete', [KelasController::class, 'delete'])->name('delete');
        Route::post('getTingkat', [KelasController::class, 'comboTingkat'])->name('getTingkat');
    });
});
