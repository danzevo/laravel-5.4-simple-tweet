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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::post('/home', 'HomeController@store');

Route::get('/home/profile', 'HomeController@profile');
Route::put('/home/save_profile', 'HomeController@save_profile');
Route::post('/home/upload_profile', 'HomeController@upload_profile');
