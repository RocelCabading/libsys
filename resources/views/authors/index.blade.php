@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex flex-column mb-3">
        <h2 class="mb-2">Authors</h2>
        <a href="{{ route('authors.create') }}" class="btn" style="background-color: #3498db; color: white;">Add Author</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Bio</th>
                <th style="width: 160px;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($authors as $author)
                <tr>
                    <td>{{ $author->id }}</td>
                    <td>{{ $author->name }}</td>
                    <td>{{ $author->bio }}</td>
                    <td>
                        <div class="d-flex gap-2">
                            <a href="{{ route('authors.edit', $author->id) }}" 
                               class="btn btn-sm" 
                               style="background-color: #3498db; color: white;">Edit</a>

                            <form action="{{ route('authors.destroy', $author->id) }}" method="POST" style="display:inline-flex;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="btn btn-sm" 
                                        style="background-color: #2c6bb2; color: white;" 
                                        onclick="return confirm('Delete this author?')">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="text-center">No authors found</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection