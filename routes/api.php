<?php

use App\Http\Controllers\PersonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->group(function () {
    Route::get('/people', [PersonController::class, 'index']);
    Route::post('/people', [PersonController::class, 'store']);
    Route::get('/people/stats', [PersonController::class, 'statistics']);
    Route::get('/person/{person}', [PersonController::class, 'show']);
    Route::put('/person/{person}/avatar', [PersonController::class, 'update']);
});
