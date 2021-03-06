<?php

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

Route::group(['middleware' => 'guest'], function () {

    Route::get('/', function () {
        return view('login');
    })->middleware('existsUsersFile');

    Route::post('/login', 'AuthController@login');

});


Route::group(['middleware' => 'auth'], function () {
    //
});

