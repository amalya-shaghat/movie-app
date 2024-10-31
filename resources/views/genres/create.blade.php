@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Create Genre</h1>
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
        <form action="{{ route('genres.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Genre Name</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Genre Name" required>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('genres.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
