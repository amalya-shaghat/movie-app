@extends('layouts.app')

@section('content')
    <div class="container text-center mt-5">
        <h1 class="mb-4">Welcome to MoviesApp</h1>
        <p class="mb-4">Explore our collection of movies and genres.</p>

        <nav>
            <ul class="list-inline">
                <li class="list-inline-item">
                    <a href="{{ route('movies.index') }}" class="btn btn-primary">View Movies</a>
                </li>
                <li class="list-inline-item">
                    <a href="{{ route('genres.index') }}" class="btn btn-secondary">View Genres</a>
                </li>
            </ul>
        </nav>
    </div>
@endsection
