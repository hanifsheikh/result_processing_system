<?php

use App\Http\Controllers\ResultController;
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
    return view('form');
});

Route::post('/store', [ResultController::class, 'store']);
Route::get('/download/{id}', [ResultController::class, 'download']);
Route::get('/delete/{id}', [ResultController::class, 'delete']);
Route::post('/destroy', [ResultController::class, 'destroy']);
Route::get('/results', [ResultController::class, 'index']);
