<?php

use App\Http\Controllers\GenreController;
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('movies')->group(function () {
    Route::get('/', [MovieController::class, 'index'])->name('movies.index');
    Route::get('/create', [MovieController::class, 'create'])->name('movies.create');
    Route::post('/', [MovieController::class, 'store'])->name('movies.store');
    Route::get('/{movie}', [MovieController::class, 'show'])->name('movies.show');
    Route::get('/{movie}/edit', [MovieController::class, 'edit'])->name('movies.edit');
    Route::put('/{movie}', [MovieController::class, 'update'])->name('movies.update');
    Route::delete('/{movie}', [MovieController::class, 'destroy'])->name('movies.destroy');
});

Route::prefix('genres')->group(function () {
    Route::get('/', [GenreController::class, 'index'])->name('genres.index');
    Route::get('/create', [GenreController::class, 'create'])->name('genres.create');
    Route::post('/', [GenreController::class, 'store'])->name('genres.store');
    Route::get('/{genre}', [GenreController::class, 'show'])->name('genres.show');
    Route::get('/{genre}/edit', [GenreController::class, 'edit'])->name('genres.edit');
    Route::put('/{genre}', [GenreController::class, 'update'])->name('genres.update');
    Route::delete('/{genre}', [GenreController::class, 'destroy'])->name('genres.destroy');
});
