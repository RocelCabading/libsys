@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add Book Copy</h2>

    <form action="{{ route('book_copies.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Book</label>
            <select name="book_id" class="form-control" required>
                <option value="">-- Select Book --</option>
                @foreach($books as $book)
                    <option value="{{ $book->id }}">{{ $book->title }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Copy Number</label>
            <input type="text" name="copy_number" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-control" required>
                <option value="available">Available</option>
                <option value="borrowed">Borrowed</option>
                <option value="reserved">Reserved</option>
                <option value="damaged">Damaged</option>
                <option value="lost">Lost</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('book_copies.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
