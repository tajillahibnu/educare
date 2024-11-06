<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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

Route::group(['prefix' => 'management/user', 'middleware' => ['web', 'auth']], function () {
    Route::post('table', [ManagementUserController::class, 'mainTable'])->name('table');
    Route::post('show', [ManagementUserController::class, 'show'])->name('show');
    Route::post('update/{id}', [ManagementUserController::class, 'update'])->name('update');
    Route::group(['prefix' => 'combo'], function () {
        Route::post('role', [ManagementUserController::class, 'comboRole'])->name('role');
    });
});
