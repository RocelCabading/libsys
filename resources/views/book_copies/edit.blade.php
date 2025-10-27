@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Book Copy</h2>

    <form action="{{ route('book_copies.update', $book_copy->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="book_id" class="form-label">Book</label>
            <select name="book_id" id="book_id" class="form-select" required>
                @foreach($books as $book)
                    <option value="{{ $book->id }}" {{ $book_copy->book_id == $book->id ? 'selected' : '' }}>
                        {{ $book->title }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="copy_number" class="form-label">Copy Number</label>
            <input type="text" name="copy_number" id="copy_number" class="form-control" value="{{ $book_copy->copy_number }}" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-select" required>
                <option value="available" {{ $book_copy->status == 'available' ? 'selected' : '' }}>Available</option>
                <option value="borrowed" {{ $book_copy->status == 'borrowed' ? 'selected' : '' }}>Borrowed</option>
                <option value="lost" {{ $book_copy->status == 'lost' ? 'selected' : '' }}>Lost</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
