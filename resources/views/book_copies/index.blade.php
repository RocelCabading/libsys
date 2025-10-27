@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex flex-column mb-3">
        <h2 class="mb-2">Book Copies</h2>
        <a href="{{ route('book_copies.create') }}" class="btn" style="background-color: #3498db; color: white;">Add New Copy</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Book</th>
                <th>Copy Number</th>
                <th>Status</th>
                <th style="width: 160px;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($copies as $copy)
                <tr>
                    <td>{{ $copy->book->title }}</td>
                    <td>{{ $copy->copy_number }}</td>
                    <td>{{ $copy->status }}</td>
                    <td>
                        <div class="d-flex gap-2">
                            <a href="{{ route('book_copies.edit', $copy->id) }}" 
                               class="btn btn-sm" 
                               style="background-color: #3498db; color: white;">Edit</a>

                            <form action="{{ route('book_copies.destroy', $copy->id) }}" method="POST" style="display:inline-flex;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="btn btn-sm" 
                                        style="background-color: #2c6bb2; color: white;" 
                                        onclick="return confirm('Delete this copy?')">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection