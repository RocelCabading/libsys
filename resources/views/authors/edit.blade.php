@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Author</h1>

    <form action="{{ route('authors.update', $author->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Author Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $author->name }}" required>
        </div>

        <div class="mb-3">
            <label for="bio" class="form-label">Biography</label>
            <textarea name="bio" id="bio" class="form-control">{{ $author->bio }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('authors.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
