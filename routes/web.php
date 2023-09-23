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

Route::get('/', function () {
    return view('welcome');
});

Route::get('photo', 'PhotoController@index');
Route::get('photo/create', 'PhotoController@create');
Route::post('photo', 'PhotoController@store');
Route::get('photo/{id}', 'PhotoController@show');
Route::get('photo/{id}/edit', 'PhotoController@edit');
Route::put('photo/{id}', 'PhotoController@update');
Route::delete('photo/{id}', 'PhotoController@destroy');
