<?php

namespace App\Http\Controllers;

use App\Http\Requests\GenreRequest;
use App\Models\Genre;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class GenreController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $genres = Genre::all();
        return view('genres.index', compact('genres'));
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view('genres.create');
    }

    /**
     * @param  GenreRequest  $request
     * @return RedirectResponse
     */
    public function store(GenreRequest $request): RedirectResponse
    {
        Genre::create($request->only('name'));

        return redirect()->route('genres.index')->with('success', 'Genre created successfully.');
    }

    /**
     * @param  Genre  $genre
     * @return View
     */
    public function show(Genre $genre): View
    {
        $genre->load('movies');
        return view('genres.show', compact('genre'));
    }

    /**
     * @param  Genre  $genre
     * @return View
     */
    public function edit(Genre $genre): View
    {
        return view('genres.edit', compact('genre'));
    }

    /**
     * @param  GenreRequest  $request
     * @param  Genre  $genre
     * @return RedirectResponse
     */
    public function update(GenreRequest $request, Genre $genre): RedirectResponse
    {
        $genre->update($request->validated());

        return redirect()->route('genres.index')->with('success', 'Genre updated successfully.');
    }

    /**
     * @param  Genre  $genre
     * @return RedirectResponse
     */
    public function destroy(Genre $genre): RedirectResponse
    {
        $genre->movies()->detach();
        $genre->delete();

        return redirect()->route('genres.index')->with('success', 'Genre deleted successfully.');
    }
}
