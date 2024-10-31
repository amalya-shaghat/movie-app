<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use Illuminate\Http\JsonResponse;

class GenreController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $genres = Genre::with('movies')->paginate(10);

        return response()->json([
            'success' => true,
            'data' => $genres
        ]);
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        $genre = Genre::with('movies')->findOrFail($id);

        $movies = $genre->movies()->paginate(10);

        return response()->json([
            'success' => true,
            'data' => [
                'genre' => $genre,
                'movies' => $movies,
            ]
        ]);
    }

}
