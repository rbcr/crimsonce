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

Route::post('/v1/login', [\App\Http\Controllers\AuthController::class, 'login']);
Route::post('/v1/add-user', [\App\Http\Controllers\ApiController::class, 'addUser']);

Route::group(['middleware' => 'auth:api'], function() {
    Route::get('/v1/logout', [\App\Http\Controllers\AuthController::class, 'logout']);
    Route::put('/v1/update-user', [\App\Http\Controllers\ApiController::class, 'updateUser']);
    Route::delete('/v1/delete-user', [\App\Http\Controllers\ApiController::class, 'deleteUser']);
    Route::post('/v1/import-users', [\App\Http\Controllers\ApiController::class, 'importUsers']);
});
