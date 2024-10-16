<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Desk\Http\Controllers\Management\KurikulumController;

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
    Route::post('store', [KurikulumController::class, 'store'])->name('store');
    Route::post('update/{id}', [KurikulumController::class, 'update'])->name('update');
    Route::post('delete', [KurikulumController::class, 'delete'])->name('delete');
});
