<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\GenreRequest;
use App\Models\Genre;
use Illuminate\Http\JsonResponse;

class GenreController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $genres = Genre::all();
        return response()->json([
            'success' => true,
            'data' => $genres
        ]);
    }

    /**
     * @param  GenreRequest  $request
     * @return JsonResponse
     */
    public function store(GenreRequest $request): JsonResponse
    {
        $genre = Genre::create($request->only('name'));

        return response()->json([
            'success' => true,
            'data' => $genre,
            'message' => 'Genre created successfully.'
        ], 201);
    }

    /**
     * @param  Genre  $genre
     * @return JsonResponse
     */
    public function show(Genre $genre): JsonResponse
    {
        $genre->load('movies');
        return response()->json([
            'success' => true,
            'data' => $genre
        ]);
    }

    /**
     * @param  GenreRequest  $request
     * @param  Genre  $genre
     * @return JsonResponse
     */
    public function update(GenreRequest $request, Genre $genre): JsonResponse
    {
        $genre->update($request->only('name'));

        return response()->json([
            'success' => true,
            'data' => $genre,
            'message' => 'Genre updated successfully.'
        ]);
    }

    /**
     * @param  Genre  $genre
     * @return JsonResponse
     */
    public function destroy(Genre $genre): JsonResponse
    {
        $genre->movies()->detach();
        $genre->delete();

        return response()->json([
            'success' => true,
            'message' => 'Genre deleted successfully.'
        ]);
    }
}
