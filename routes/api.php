<?php

use App\Http\Controllers\FileController;
use App\Http\Controllers\UserController;
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

Route::post('/user/isLogged', [UserController::class, 'isLogged']);

Route::post('/file/upload', [FileController::class, 'upload']);
Route::post('/file/download', [FileController::class, 'download']);
Route::post('/files/get', [FileController::class, 'getFiles']);
Route::post('/files/user', [FileController::class, 'getUserFiles']);