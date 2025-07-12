<?php

namespace App\Models;


use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //
    protected $fillable = [
        'category_id',
        'name',
        'author',
        'isbn',
        'description',
        'cover_page',
        'published_year',
    ];

    //connection for category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
