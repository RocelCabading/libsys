<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use App\Models\BookCopy;
use App\Models\Author; 

class DashboardController extends Controller
{
    public function index()
    {
        $booksCount = Book::count();
        $categoriesCount = Category::count();
        $copiesCount = BookCopy::count();
        $authorsCount = Author::count(); 

        // Load categories with books + copies
        $categories = Category::with('books.copies')->get();

        return view('dashboard', compact(
            'booksCount',
            'categoriesCount',
            'copiesCount',
            'authorsCount',   
            'categories'
        ));
    }
}
