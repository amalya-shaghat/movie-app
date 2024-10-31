<?php

namespace App\Http\Controllers;

use App\Http\Requests\MovieRequest;
use App\Models\Movie;
use App\Models\Genre;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class MovieController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $movies = Movie::with('genres')->get();
        return view('movies.index', compact('movies'));
    }

    /**
     * @return View
     */
    public function create(): View
    {
        $genres = Genre::all();
        return view('movies.create', compact('genres'));
    }

    /**
     * @param  MovieRequest $request
     * @return RedirectResponse
     */
    public function store(MovieRequest $request): RedirectResponse
    {
        $data = $request->only('title');

        if ($request->hasFile('poster_url')) {
            $data['poster_url'] = $request->file('poster_url')->store('posters', 'public'); // Save the file to storage/app/public/posters
        } else {
            $data['poster_url'] = 'posters/default_poster.jpg';
        }

        $data['is_published'] = $request->boolean('is_published');

        $movie = Movie::create($data);

        if ($request->filled('genres')) {
            $movie->genres()->attach($request->genres);
        }

        return redirect()->route('movies.index')->with('success', 'Movie created successfully.');
    }


    /**
     * @param  Movie $movie
     * @return View
     */
    public function show(Movie $movie): View
    {
        $movie->load('genres');
        return view('movies.show', compact('movie'));
    }

    /**
     * @param  Movie  $movie
     * @return View
     */
    public function edit(Movie $movie): View
    {
        $genres = Genre::all();
        $movie->load('genres');
        return view('movies.edit', compact('movie', 'genres'));
    }

    /**
     * @param  MovieRequest  $request
     * @param  Movie  $movie
     * @return RedirectResponse
     */
    public function update(MovieRequest $request, Movie $movie): RedirectResponse
    {
        $data = $request->only('title');

        $data['is_published'] = $request->boolean('is_published');

        if ($request->hasFile('poster_url')) {
            $data['poster_url'] = $request->file('poster_url')->store('posters', 'public');
        } else {
            $data['poster_url'] = 'posters/default_poster.jpg';
        }

        $movie->update($data);

        if ($request->has('genres')) {
            $movie->genres()->sync($request->genres);
        }

        return redirect()->route('movies.index')->with('success', 'Movie updated successfully.');
    }


    /**
     * @param  Movie  $movie
     * @return RedirectResponse
     */
    public function destroy(Movie $movie): RedirectResponse
    {
        $movie->genres()->detach();
        $movie->delete();

        return redirect()->route('movies.index')->with('success', 'Movie deleted successfully.');
    }
}
