<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Desk\Http\Controllers\Management\RoleMenuController;

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

Route::group(['prefix' => 'management/rolemenu', 'middleware' => ['web', 'auth']], function () {
    Route::post('listmenu', [RoleMenuController::class, 'listmenu'])->name('listmenu');
    // Route::post('table', [ManagementUserController::class, 'mainTable'])->name('table');
    // Route::post('show', [ManagementUserController::class, 'show'])->name('show');
    // Route::post('update/{id}', [ManagementUserController::class, 'update'])->name('update');
    Route::group(['prefix' => 'combo'], function () {
        Route::post('role', [RoleMenuController::class, 'comboRole'])->name('role');
    });
});
