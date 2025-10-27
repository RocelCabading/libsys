<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookCopy extends Model
{
    use HasFactory;

    protected $fillable = ['book_id', 'copy_number', 'status'];

    // Relationship with Book
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
