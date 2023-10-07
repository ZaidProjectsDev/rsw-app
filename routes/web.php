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
    return view('home');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('hardwareparts', \App\Http\Controllers\HardwarePartController::class);


//Route::get('/games',[\App\Http\Controllers\GameController::class,'index']);
Route::resource('/games',\App\Http\Controllers\GameController::class);
//oute::get('games/{your_id}', [\App\Http\Controllers\GameController::class, 'show']);
