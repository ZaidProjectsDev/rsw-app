<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;

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
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('parts', \App\Http\Controllers\PartController::class);
Route::get('/search', [SearchController::class, 'search'])->name('search');
//Route::get('/games',[\App\Http\Controllers\GameController::class,'index']);
Route::resource('/games',\App\Http\Controllers\GameController::class);
Route::resource('/submissions',\App\Http\Controllers\SubmissionController::class);
Route::post('/submissions/status/{id}', [App\Http\Controllers\SubmissionController::class, 'update'])->name('submissions.status');
Route::resource('/configurations',\App\Http\Controllers\ConfigurationController::class);
Route::resource('/vendors',\App\Http\Controllers\VendorController::class);
Route::resource('/parts',\App\Http\Controllers\PartController::class);

//oute::get('games/{your_id}', [\App\Http\Controllers\GameController::class, 'show']);
