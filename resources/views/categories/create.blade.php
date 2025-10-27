@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Add New Category</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Category Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter category name" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control" placeholder="Enter description"></textarea>
            </div>

            <button type="submit" class="btn btn-success">Save</button>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection
