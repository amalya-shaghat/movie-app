@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>{{ $movie->title }}</h1>

        @if($movie->poster_url)
            <img src="{{ asset('storage/' . $movie->poster_url) }}" alt="Poster Image" class="img-fluid" width="300"><br><br>
        @endif

        <h5>Genres:</h5>
        <ul>
            @foreach($movie->genres as $genre)
                <li>{{ $genre->name }}</li>
            @endforeach
        </ul>

        <h5>Status:</h5>
        <p>{{ $movie->is_published ? 'Published' : 'Not Published' }}</p>

        <a href="{{ route('movies.edit', $movie->id) }}" class="btn btn-warning">Edit Movie</a>
        <form action="{{ route('movies.destroy', $movie->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this movie?')">Delete Movie</button>
        </form>
        <a href="{{ route('movies.index') }}" class="btn btn-secondary">Back to Movies</a>
    </div>
@endsection
