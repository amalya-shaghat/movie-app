@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Edit Movie</h1>
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
        <form action="{{ route('movies.update', $movie->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" id="title" value="{{ $movie->title }}" required>
            </div>

            <div class="mb-3">
                <label for="poster_url" class="form-label">Poster Image</label>
                @if($movie->poster_url)
                    <img src="{{ asset('storage/' . $movie->poster_url) }}" alt="Poster Image" width="150"><br><br>
                @endif
                <input type="file" name="poster_url" class="form-control" id="poster_url">
            </div>

            <div class="mb-3">
                <label for="genres" class="form-label">Genres</label>
                <select name="genres[]" id="genres" class="form-select" multiple>
                    @foreach($genres as $genre)
                        <option value="{{ $genre->id }}" {{ in_array($genre->id, $movie->genres->pluck('id')->toArray()) ? 'selected' : '' }}>
                            {{ $genre->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-check mb-3">
                <input type="hidden" name="is_published" value="0"> <!-- Hidden input to default to 0 -->
                <input type="checkbox" name="is_published" class="form-check-input" id="is_published"
                       {{ $movie->is_published ? 'checked' : '' }} value="1">
                <label for="is_published" class="form-check-label">Published</label>
            </div>


            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
