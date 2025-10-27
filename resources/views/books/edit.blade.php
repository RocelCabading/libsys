@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Book</h2>

    <form action="{{ route('books.update', $book->id) }}" method="POST">
        @csrf
        @method('PUT')
        @include('books.form', [
            'buttonText' => 'Update',
            'book' => $book,
            'authors' => $authors,
            'categories' => $categories
        ])
    </form>
</div>
@endsection
