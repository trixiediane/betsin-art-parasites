<?php

use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/me', [UserController::class, 'getUserDetails'])->middleware('auth')->name('me');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('user', UserController::class);
    Route::post('/update-user/{id}', [UserController::class, 'updateUser'])->name('update-user');
    Route::put('/password-reset/{id}', [PasswordResetController::class, 'updatePassword'])->name('update.password');
})->prefix('user');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('post', PostController::class);
})->prefix('post');
