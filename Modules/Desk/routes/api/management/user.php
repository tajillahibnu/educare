<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Desk\app\Http\Controllers\Api\UserController;
use Modules\Desk\Http\Controllers\Management\UserController as ManagementUserController;

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


Route::group(['prefix' => 'management/user', 'middleware' => ['web', 'auth']], function () {
    Route::post('main-table', [ManagementUserController::class, 'mainTable'])->name('main-table');
});
