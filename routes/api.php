<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware'=> ['auth:sanctum']], function () {
    Route::apiResource('/users', \App\Http\Controllers\Api\UserController::class)
        ->only(['index', 'show']);
});

Route::group(['middleware'=> ['guest']], function () {
    Route::get('/login', [\App\Http\Controllers\Api\AuthController::class, 'login']);
    Route::get('sample', [\App\Http\Controllers\Api\SampleController::class, 'index']);
});
