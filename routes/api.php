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

Route::get('/v1', [\App\Http\Controllers\ApiController::class, 'index']);

Route::post('/v1/login', [\App\Http\Controllers\AuthController::class, 'login']);
Route::post('/v1/add-user', [\App\Http\Controllers\ApiController::class, 'addUser']);

Route::group(['middleware' => 'auth:api'], function() {
    Route::get('/v1/logout', [\App\Http\Controllers\AuthController::class, 'logout']);
    Route::get('/v1/get-user', [\App\Http\Controllers\ApiController::class, 'getUser']);
    Route::put('/v1/update-user', [\App\Http\Controllers\ApiController::class, 'updateUser']);
    Route::delete('/v1/delete-user', [\App\Http\Controllers\ApiController::class, 'deleteUser']);
    Route::post('/v1/import-users', [\App\Http\Controllers\ApiController::class, 'importUsers']);

    Route::get('/v1/network/list', [\App\Http\Controllers\NetworkController::class, 'list']);
    Route::post('/v1/network/add', [\App\Http\Controllers\NetworkController::class, 'add']);
    Route::delete('/v1/network/delete', [\App\Http\Controllers\NetworkController::class, 'delete']);
    Route::get('/v1/network/add-random/{quantity}', [\App\Http\Controllers\NetworkController::class, 'addRandomContacts']);

});
