@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex flex-column mb-3">
        <h2 class="mb-2">Books List</h2>
        <a href="{{ route('books.create') }}" class="btn" style="background-color: #3498db; color: white;">Add New Book</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Published Year</th>
                <th>Category</th>
                <th style="width: 160px;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author->name ?? '-' }}</td>
                    <td>{{ $book->published_year ?? '-' }}</td>
                    <td>{{ $book->category->name ?? '-' }}</td>
                    <td>
                        <div class="d-flex gap-2">
                            <a href="{{ route('books.edit', $book->id) }}" class="btn btn-sm" style="background-color: #3498db; color: white;">Edit</a>
                            <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline-flex;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm" style="background-color: #2c6bb2; color: white;" onclick="return confirm('Delete this book?')">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
