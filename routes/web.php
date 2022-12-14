<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// USER AUTH
Route::get('/iniciar-sesion', [UserController::class, 'loginpage']);
Route::get('/registrarse', [UserController::class, 'registerpage']);

// USER VIEWS
Route::get('/usuario/archivos', [UserController::class, 'filespage']);

// USER AUTH
Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'register']);
Route::post('/user/logout', [UserController::class, 'logout']);
