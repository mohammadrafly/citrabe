<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController,
    App\Http\Controllers\HomeController,
    App\Http\Controllers\GroupController,
    App\Http\Controllers\UsersController;

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

Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'do_login']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::middleware(['is_login'])->group(function () {
    Route::get('/', [HomeController::class, 'index']);

    Route::resource('group', GroupController::class)->except('destroy', 'show', 'update');
    Route::get('group/{id}/delete', [GroupController::class, 'destroy']);

    Route::resource('users', UsersController::class)->except('destroy', 'show', 'update');
    Route::get('users/{id}/delete', [UsersController::class, 'destroy']);

});
