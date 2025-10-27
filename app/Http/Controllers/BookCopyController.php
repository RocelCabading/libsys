<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookCopy;
use App\Models\Book;

class BookCopyController extends Controller
{
    public function index()
    {
        $copies = BookCopy::with('book')->get();
        return view('book_copies.index', compact('copies'));
    }

    public function create()
    {
        $books = Book::all();
        return view('book_copies.create', compact('books'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'copy_number' => 'required|string',
            'status' => 'required|string|in:available,borrowed,reserved,damaged,lost',
        ]);

        BookCopy::create($request->all());

        return redirect()->route('book_copies.index')->with('success', 'Book copy added successfully.');
    }

    public function edit(BookCopy $book_copy)
    {
        $books = \App\Models\Book::all(); // For the select dropdown
        return view('book_copies.edit', compact('book_copy', 'books'));
    }


    public function update(Request $request, BookCopy $book_copy)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'copy_number' => 'required|string',
            'status' => 'required|string|in:available,borrowed,reserved,damaged,lost',
        ]);

        $book_copy->update($request->all());

        return redirect()->route('book_copies.index')->with('success', 'Book copy updated successfully.');
    }

    public function destroy(BookCopy $book_copy)
    {
        $book_copy->delete();
        return redirect()->route('book_copies.index')->with('success', 'Book copy deleted successfully.');
    }
}
