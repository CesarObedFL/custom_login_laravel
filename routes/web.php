<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return redirect()->route('login');
})->name('welcome');


Route::get('/login', [ AuthController::class, 'login' ])->name('login');
Route::post('/authenticate', [ AuthController::class, 'authenticate' ])->name('authenticate');

Route::get('/register', [ AuthController::class, 'register' ])->name('register');
Route::post('/signup', [ AuthController::class, 'signup' ])->name('signup');

Route::middleware(['auth'])->group(function () {

    Route::get('/users', [ UserController::class, 'index' ])->name('users');
    Route::get('/get_all_users', [ UserController::class, 'get_all_users' ])->name('get_all_users');
    Route::get('/user/{user_id}', [ UserController::class, 'get_user_by_id' ])->name('get_user_by_id');
    Route::put('/user/update/{user_id}', [ UserController::class, 'update' ])->name('update_user');
    Route::delete('/user/delete/{user_id}', [ UserController::class, 'delete' ])->name('delete_user');
    
    Route::get('/users_export', [ UserController::class, 'export' ])->name('export_users');

    Route::delete('/logout', [ AuthController::class, 'logout' ])->name('logout');

});

