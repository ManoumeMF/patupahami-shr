<?php

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

Route::get('/home', function () {
    return view('home');
});

Route::get('login', 'App\Http\Controllers\auth\AuthController@index')->name('login');
Route::get('register', 'App\Http\Controllers\auth\AuthController@register')->name('register');
Route::post('proses_login', 'App\Http\Controllers\auth\AuthController@proses_login')->name('proses_login');
Route::get('logout', 'App\Http\Controllers\auth\AuthController@logout')->name('logout');

Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['cek_login:User']], function () {
        //Route::resource('user', UserController::class);
    });
});