<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Book;

class Editorial extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'name'];

    public function book()
    {
        return $this->hasMany(Book::class);
    }

}
