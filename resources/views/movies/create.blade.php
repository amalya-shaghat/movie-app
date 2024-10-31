@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Create Movie</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('movies.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Movie Title</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Movie Title" required>
            </div>
            <div class="mb-3">
                <label for="poster_url" class="form-label">Poster Image</label>
                <input type="file" name="poster_url" class="form-control" id="poster_url">
            </div>
            <div class="mb-3">
                <label for="genres" class="form-label">Genres</label>
                <select name="genres[]" id="genres" class="form-select" multiple required>
                    @foreach($genres as $genre)
                        <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" name="is_published" class="form-check-input" id="is_published">
                <label class="form-check-label" for="is_published">Publish</label>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
