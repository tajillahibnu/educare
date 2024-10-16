<?php

use Illuminate\Support\Facades\Route;
use Modules\Desk\Http\Controllers\DeskController;
use Modules\Desk\Http\Controllers\PageController;

/*
 *--------------------------------------------------------------------------
 * API Routes
 *--------------------------------------------------------------------------
 *
 * Here is where you can register API routes for your application. These
 * routes are loaded by the RouteServiceProvider within a group which
 * is assigned the "api" middleware group. Enjoy building your API!
 *
*/

// Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
//     Route::apiResource('desk', DeskController::class)->names('desk');
// });

Route::group(['prefix' => 'desk', 'middleware' => ['web', 'auth']], function () {
    Route::post('load-page', [PageController::class, 'loadPage'])->name('load-page');
    require_once(__DIR__ . '/api/management/user.php');
    require_once(__DIR__ . '/api/management/siswa.php');
    require_once(__DIR__ . '/api/management/pegawai.php');
    require_once(__DIR__ . '/api/kurikulum/kurikulum.php');
    require_once(__DIR__ . '/api/master/role.php');
    require_once(__DIR__ . '/api/master/mapel.php');
    require_once(__DIR__ . '/api/master/tahunAkademik.php');
});

