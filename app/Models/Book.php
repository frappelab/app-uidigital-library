<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Author;
use App\Models\Editorial;
use App\Models\Stock;

class Book extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'title', 'isbn', 'pages', 'cover', 'author_id', 'editorial_id', 'total'];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function editorial()
    {
        return $this->belongsTo(Editorial::class);
    }

    public function stock()
    {
        return $this->hasMany(Stock::class);
    }
}
