@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Edit Genre</h1>
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
        <form action="{{ route('genres.update', $genre->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Genre Name</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ $genre->name }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('genres.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
