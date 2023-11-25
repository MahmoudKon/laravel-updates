<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::middleware(['auth'])->group(function() {
    Route::view('/', 'dashboard.home')->name('home');
    Route::get('change/lang/{lang}', 'HomeController@changeLang')->name('change.lang');

    Route::resource('users', 'UserController');
    Route::post('users/multi-delete', 'UserController@multiDelete')->name('users.multi-delete');

    Route::resource('updates', 'UpdateController');
    Route::post('updates/multi-delete', 'UpdateController@multiDelete')->name('updates.multi-delete');
});


Route::get('api/get/update', 'UpdateController@checkUpdate');
