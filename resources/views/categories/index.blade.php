@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex flex-column mb-3">
        <h2 class="mb-2">Categories</h2>
        <a href="{{ route('categories.create') }}" class="btn" style="background-color: #3498db; color: white;">Add Category</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th style="width: 160px;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->description }}</td>
                    <td>
                        <div class="d-flex gap-2">
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm" style="background-color: #3498db; color: white;">Edit</a>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline-flex;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm" style="background-color: #2c6bb2; color: white;" onclick="return confirm('Delete this category?')">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="text-center">No categories found</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection