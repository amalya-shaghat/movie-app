<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\MovieRequest;
use App\Models\Movie;
use Illuminate\Http\JsonResponse;

class MovieController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $movies = Movie::with('genres')->get();

        return response()->json([
            'success' => true,
            'data' => $movies
        ]);
    }

    /**
     * @param  MovieRequest  $request
     * @return JsonResponse
     */
    public function store(MovieRequest $request): JsonResponse
    {
        $movie = Movie::create($request->only('title', 'poster_url', 'is_published'));

        if ($request->has('genres')) {
            $movie->genres()->attach($request->input('genres'));
        }

        return response()->json([
            'success' => true,
            'data' => $movie->load('genres'),
            'message' => 'Movie created successfully.'
        ], 201);
    }

    /**
     * @param  Movie  $movie
     * @return JsonResponse
     */
    public function show(Movie $movie): JsonResponse
    {
        $movie->load('genres');

        return response()->json([
            'success' => true,
            'data' => $movie
        ]);
    }

    /**
     * Update the specified movie in storage.
     *
     * @param  MovieRequest  $request
     * @param  Movie  $movie
     * @return JsonResponse
     */
    public function update(MovieRequest $request, Movie $movie): JsonResponse
    {
        $movie->update($request->validated());

        if ($request->has('genres')) {
            $movie->genres()->sync($request->input('genres'));
        }

        return response()->json(['message' => 'Movie updated successfully', 'movie' => $movie], 200);
    }

    /**
     * @param  Movie  $movie
     * @return JsonResponse
     */
    public function destroy(Movie $movie): JsonResponse
    {
        $movie->genres()->detach();
        $movie->delete();

        return response()->json([
            'success' => true,
            'message' => 'Movie deleted successfully.'
        ]);
    }
}
