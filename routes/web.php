<?php

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
    return view('auth.login');
});

Auth::routes();
Route::group(['middleware' => ['auth']], function () {
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('users/profile', [App\Http\Controllers\UserController::class,'profile'])->name('users.profile');
Route::get('users/listjson', [App\Http\Controllers\UserController::class,'listjson'])->name('users.listjson');
Route::resource('users', App\Http\Controllers\UserController::class);
});
