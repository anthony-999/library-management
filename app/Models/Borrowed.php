<?php

namespace App\Models;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Borrowed extends Model
{


    protected $fillable = [
        'book_id',
        'user_id',
        'borrow_date',
        'due_date',
        'return_date',
        'status',

    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
     public function user()
    {
        return $this->belongsTo(User::class);
    }
}
