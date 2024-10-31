<?php

namespace Database\Seeders;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $movies = [
            [
                'title' => 'The Dark Knight',
                'poster_url' => 'posters/the-dark-knight.jpg',
                'is_published' => 0,
                'genres' => ['Action', 'Drama']
            ],
            [
                'title' => 'Superbad',
                'poster_url' => 'posters/superbad.jpg',
                'is_published' => 0,
                'genres' => ['Comedy']
            ],
            [
                'title' => 'Interstellar',
                'poster_url' => 'posters/interstellar.jpg',
                'is_published' => 0,
                'genres' => ['Science Fiction', 'Drama']
            ],
        ];

        foreach ($movies as $movieData) {
            $movie = Movie::create([
                'title' => $movieData['title'],
                'poster_url' => $movieData['poster_url'],
                'is_published' => $movieData['is_published'],
            ]);

            foreach ($movieData['genres'] as $genreName) {
                $genre = Genre::where('name', $genreName)->first();
                if ($genre) {
                    $movie->genres()->attach($genre->id);
                }
            }
        }
    }
}
