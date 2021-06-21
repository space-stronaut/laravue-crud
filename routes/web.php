<?php

use App\Http\Controllers\PlayerController;
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

Route::get('', function () {
    return view('welcome');
});


Route::get('/player', [PlayerController::class, 'index']);
Route::post('/player/create', [PlayerController::class, 'store']);
Route::get('/player/show/{id}', [PlayerController::class, 'show']);
Route::get('/player/edit/{id}', [PlayerController::class, 'edit']);
Route::get('/player/cari/{worker:name}', [PlayerController::class, 'search']);
Route::post('/player/update/{id}', [PlayerController::class, 'update']);
Route::put('/player/updatePhoto/{id}', [PlayerController::class, 'updatePhoto']);
Route::delete('/player/delete/{id}', [PlayerController::class, 'destroy']);