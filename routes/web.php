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




Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('parts', \App\Http\Controllers\PartController::class);


//Route::get('/games',[\App\Http\Controllers\GameController::class,'index']);
Route::resource('/games',\App\Http\Controllers\GameController::class);
Route::resource('/submissions',\App\Http\Controllers\SubmissionController::class);
//oute::get('games/{your_id}', [\App\Http\Controllers\GameController::class, 'show']);
