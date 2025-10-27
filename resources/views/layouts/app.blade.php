<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LibSys</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Navbar */
        .navbar-custom {
            background: linear-gradient(90deg, #7177e2, #b4aef7);
            box-shadow: 0 4px 10px rgba(160, 120, 200, 0.3);
        }
        .navbar-brand {
            font-weight: bold;
            color: #1a1a1a !important; /* Black brand text */
        }

        /* Navbar buttons */
        .nav-btn {
            border-radius: 20px;
            font-weight: 600;
            margin-left: 8px;
            padding: 6px 14px;
            border: none;
            color: #fff !important; /* White text */
            transition: 0.3s;
        }

        /* Unique blue shades for each button */
        .btn-cat { background-color: #3498db; }      /* Manage Categories */
        .btn-auth { background-color: #3b7ddd; }     /* Manage Authors */
        .btn-book { background-color: #2c6bb2; }     /* Manage Books */
        .btn-copy { background-color: #1f4d91; }     /* Manage Copies */

        /* Hover effect for all buttons */
        .nav-btn:hover {
            filter: brightness(0.85);
            color: #fff !important;
        }
    </style>
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-custom mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ route('dashboard') }}">📚 LibSys</a>

            <div>
                {{-- Hide Manage buttons on dashboard page --}}
                @if (!Request::is('/'))
                    <a class="btn nav-btn btn-cat" href="{{ route('categories.index') }}">Manage Categories</a>
                    <a class="btn nav-btn btn-auth" href="{{ route('authors.index') }}">Manage Authors</a>
                    <a class="btn nav-btn btn-book" href="{{ route('books.index') }}">Manage Books</a>
                    <a class="btn nav-btn btn-copy" href="{{ route('book_copies.index') }}">Manage Copies</a>
                @endif
            </div>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>
</body>
</html>