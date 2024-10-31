@extends('layouts.app')

@section('content')

    <div class="container mt-5">
        <h1 class="mb-4">Movies</h1>
        <a href="{{ route('movies.create') }}" class="btn btn-success mb-3">Create New Movie</a>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <ul class="list-group">
            @foreach($movies as $movie)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        {{ $movie->title }}
                        <span class="badge bg-{{ $movie->is_published ? 'success' : 'warning' }}">
                            {{ $movie->is_published ? 'Published' : 'Unpublished' }}
                        </span>
                    </div>
                    <div>
                        <a href="{{ route('movies.show', $movie->id) }}" class="btn btn-info btn-sm me-2" title="Show">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('movies.edit', $movie->id) }}" class="btn btn-warning btn-sm me-2" title="Edit">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('movies.destroy', $movie->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this movie?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
