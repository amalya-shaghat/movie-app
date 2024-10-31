@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Genres</h1>
        <a href="{{ route('genres.create') }}" class="btn btn-primary mb-3">Create New Genre</a>

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
            @foreach($genres as $genre)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{ $genre->name }}
                    <div>
                        <a href="{{ route('genres.show', $genre->id) }}" class="btn btn-sm btn-info me-2" title="Show">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('genres.edit', $genre->id) }}" class="btn btn-sm btn-warning me-2" title="Edit">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('genres.destroy', $genre->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this genre?');">
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
