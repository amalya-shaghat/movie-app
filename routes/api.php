<?php

use App\Http\Controllers\Api\GenreController as ApiGenreController;
use App\Http\Controllers\Api\MovieController as ApiMovieController;
use Illuminate\Support\Facades\Route;

Route::get('genres', [ApiGenreController::class, 'index']);
Route::get('genres/{id}', [ApiGenreController::class, 'show']);
Route::get('movies', [ApiMovieController::class, 'index']);
Route::get('movies/{id}', [ApiMovieController::class, 'show']);
