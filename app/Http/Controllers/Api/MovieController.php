<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\JsonResponse;

class MovieController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $movies = Movie::with('genres')->paginate(10);

        return response()->json([
            'success' => true,
            'data' => $movies
        ]);
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        $movie = Movie::with('genres')->findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $movie
        ]);
    }

}
