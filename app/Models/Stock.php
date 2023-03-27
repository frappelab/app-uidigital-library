<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Book;

class Stock extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'book_id', 'total'];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
