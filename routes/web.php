<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenresController;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\RatingsController;

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
    return redirect()->route('movies.index');
});
Route::prefix('genres')->group(function () {
    Route::get('/', [GenresController::class, 'index'])->name('genres.index');
    Route::post('/', [GenresController::class, 'store'])->name('genres.store');
    Route::get('/{id}/edit', [GenresController::class, 'edit'])->name('genres.edit');
    Route::get('/{id}', [GenresController::class, 'drop'])->name('genres.drop');
    Route::put('/{id}', [GenresController::class, 'update'])->name('genres.update');
});

Route::prefix('ratings')->group(function () {
    Route::get('/', [RatingsController::class, 'index'])->name('ratings.index');
    Route::post('/', [RatingsController::class, 'store'])->name('ratings.store');
    Route::get('/{id}/edit', [RatingsController::class, 'edit'])->name('ratings.edit');
    Route::get('/{id}', [RatingsController::class, 'drop'])->name('ratings.drop');
    Route::put('/{id}', [RatingsController::class, 'update'])->name('ratings.update');
});

Route::prefix('movies')->group(function () {
    Route::get('/', [MoviesController::class, 'index'])->name('movies.index');
    Route::post('/', [MoviesController::class, 'store'])->name('movies.store');
    Route::get('/{id}/edit', [MoviesController::class, 'edit'])->name('movies.edit');
    Route::get('/{id}', [MoviesController::class, 'drop'])->name('movies.drop');
    Route::put('/{id}', [MoviesController::class, 'update'])->name('movies.update');
});
