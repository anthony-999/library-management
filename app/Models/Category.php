<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Book;

class Category extends Model
{
    //
    protected $fillable = [
        'name',
        'description',
        'cover_page'
    ];

    //connection to book category
    // 1 category = many books
    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
