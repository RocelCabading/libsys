@extends('layouts.app')

@section('content')
<style>
    /* Background */
    body {
        background-color: #f4f6f8; /* soft light grey */
    }

    /* Text colors */
    h1, h2, h3, h5, h6, p {
        color: #2c3e50; /* dark blue-grey for formality */
    }

    /* Centered dashboard header */
    .dashboard-header {
        text-align: center;
        margin: 2rem auto;
    }

    /* Cards */
    .card {
        border-radius: 15px;
        border: 1px solid #dcdcdc; /* subtle grey border */
        background: #ffffff;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* soft shadow */
        transition: transform 0.2s;
    }
    .card:hover {
        transform: translateY(-3px);
    }

    /* Buttons with different shades of blue */
    .btn-category { background-color: #3498db; color: #fff; } /* light blue */
    .btn-author   { background-color: #2980b9; color: #fff; } /* medium blue */
    .btn-book     { background-color: #779cc1ff; color: #fff; } /* dark blue */
    .btn-copy     { background-color: #3b5998; color: #fff; } /* steel blue */
    .btn:hover { opacity: 0.9; }

    /* Stats cards layout */
    .stats-row {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center;
        margin-top: 2rem;
    }
    .stats-row .card {
        flex: 1 1 220px;
        max-width: 250px;
        text-align: center;
        padding: 1.5rem;
    }

    /* Categories Overview cards */
    .categories-row {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        margin-top: 2rem;
        justify-content: center;
    }
    .categories-row .card {
        flex: 1 1 300px;
        display: flex;
        flex-direction: column;
        height: 100%;
        padding: 1rem;
    }
    .categories-row ul {
        margin-top: 1rem;
        padding-left: 1.2rem;
    }
</style>

<div class="container">

    <!-- Dashboard header -->
    <div class="dashboard-header">
        <h5>Libsys</h5>
        <h6>Welcome to Library TPS</h6>
        <p>Manage categories, authors, books and book copies easily</p>
    </div>

    <!-- Stats Cards -->
    <div class="stats-row">
        <div class="card">
            <h3>{{ $categoriesCount }}</h3>
            <p>Categories</p>
            <a href="{{ route('categories.index') }}" class="btn btn-category">View Categories</a>
        </div>

        <div class="card">
            <h3>{{ $authorsCount }}</h3>
            <p>Authors</p>
            <a href="{{ route('authors.index') }}" class="btn btn-author">View Authors</a>
        </div>

        <div class="card">
            <h3>{{ $booksCount }}</h3>
            <p>Books</p>
            <a href="{{ route('books.index') }}" class="btn btn-book">View Books</a>
        </div>

        <div class="card">
            <h3>{{ $copiesCount }}</h3>
            <p>Book Copies</p>
            <a href="{{ route('book_copies.index') }}" class="btn btn-copy">View Copies</a>
        </div>
    </div>

    <!-- Categories Overview -->
    <h2 class="mt-5 text-center">📖 Categories Overview</h2>
    <div class="categories-row">
        @foreach($categories as $category)
            <div class="card">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $category->name }}</h5>
                    <p class="card-text">{{ $category->description }}</p>
                    <ul class="flex-grow-1">
                        @foreach($category->books as $book)
                            <li>{{ $book->title }} ({{ $book->copies->count() }} copies)</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endforeach
    </div>

</div>
@endsection
