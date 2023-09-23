<?php

use App\Http\Controllers\PhotoController;
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

// Route::get('photo', 'App\Http\Controllers\PhotoController@index'); //old way
Route::get('photo', [PhotoController::class, 'index']); // best approach
Route::get('photo/create', [PhotoController::class, 'create']);
Route::post('photo', [PhotoController::class, 'store']);
Route::get('photo/{id}', [PhotoController::class, 'show']);
Route::get('photo/{id}/edit', [PhotoController::class, 'edit']);
Route::put('photo/{id}', [PhotoController::class, 'update']);
Route::delete('photo/{id}', [PhotoController::class, 'destroy']);
