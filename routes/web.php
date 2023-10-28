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
/*
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('parts', \App\Http\Controllers\PartController::class);
Route::get('/search', [SearchController::class, 'search'])->name('search');
//Route::get('/games',[\App\Http\Controllers\GameController::class,'index']);
Route::resource('/games',\App\Http\Controllers\GameController::class);
Route::resource('/submissions',\App\Http\Controllers\SubmissionController::class);
Route::post('/submissions/status/{id}', [App\Http\Controllers\SubmissionController::class, 'update'])->name('submissions.status');
Route::get('submissions/create', 'SubmissionController@create')->middleware('hasConfigurations')->name('submissions.create');
Route::resource('/configurations',\App\Http\Controllers\ConfigurationController::class);
Route::resource('/vendors',\App\Http\Controllers\VendorController::class);
Route::resource('/parts',\App\Http\Controllers\PartController::class);
*/
// Apply the 'auth' middleware to protect all routes
Route::middleware(['web', 'auth'])->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('/configurations', \App\Http\Controllers\ConfigurationController::class);
    Route::resource('/vendors', \App\Http\Controllers\VendorController::class);

    // Define routes that don't require 'auth' middleware
    Route::get('/search', [SearchController::class, 'search'])->name('search');
    Route::get('/search/{tag}', [SearchController::class, 'searchByTag'])->name('search.tag');
    Route::get('/search/{game_id}', [SearchController::class, 'searchByGameSubmissionId'])->name('search.search-by-game-submission');
    Route::resource('/games', \App\Http\Controllers\GameController::class);
    Route::get('/games/{id}',  [App\Http\Controllers\GameController::class, 'show'])->name('games.show-content');
    Route::resource('/submissions', \App\Http\Controllers\SubmissionController::class);
    Route::resource('parts', \App\Http\Controllers\PartController::class);
    // Example: Apply the 'recordViewedPage' middleware to specific routes
   // Route::middleware('auth')->group(function () {
      //  Route::get('/games/{id}',  [App\Http\Controllers\GameController::class, 'show'])->name('games.show')->middleware('recordViewedPage:game');

   // });

    Route::post('/submissions/status/{id}', [App\Http\Controllers\SubmissionController::class, 'update'])->name('submissions.status');
    Route::get('/submissions/create', [App\Http\Controllers\SubmissionController::class, 'create'])->middleware('hasConfigurations')->name('submissions.create');
});



//oute::get('games/{your_id}', [\App\Http\Controllers\GameController::class, 'show']);
