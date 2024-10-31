@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>{{ $genre->name }}</h1>

        <div class="mb-4">
            <a href="{{ route('genres.edit', $genre->id) }}" class="btn btn-warning me-2" title="Edit">
                <i class="fas fa-edit"></i> Edit
            </a>
            <form action="{{ route('genres.destroy', $genre->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this genre?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" title="Delete">
                    <i class="fas fa-trash-alt"></i> Delete
                </button>
            </form>
        </div>

        <h3>Movies in this Genre</h3>

        @if($genre->movies->isEmpty())
            <p>No movies available in this genre.</p>
        @else
            <div class="row">
                @foreach($genre->movies as $movie)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="{{ asset('storage/' . $movie->poster_url) }}" class="card-img-top" alt="{{ $movie->title }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $movie->title }}</h5>
                                <p class="card-text">
                                    <span class="badge bg-{{ $movie->is_published ? 'success' : 'warning' }}">
                                        {{ $movie->is_published ? 'Published' : 'Unpublished' }}
                                    </span>
                                </p>
                                <a href="{{ route('movies.show', $movie->id) }}" class="btn btn-primary">View Details</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
