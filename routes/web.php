<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookCopyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthorController; // <-- Add this line

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// Categories CRUD
Route::resource('categories', CategoryController::class);

// Books CRUD
Route::resource('books', BookController::class);

// Book Copies CRUD
Route::resource('book_copies', BookCopyController::class);

// Author CRUD
Route::resource('authors', AuthorController::class);
