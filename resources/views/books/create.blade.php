@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add Book</h2>

    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        @include('books.form', [
            'buttonText' => 'Save',
            'book' => null,
            'authors' => $authors,
            'categories' => $categories
        ])
    </form>
</div>
@endsection
