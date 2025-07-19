<?php

namespace App\Livewire;

use App\Models\Book;
use Livewire\Component;

class BookBorrow extends Component
{
    public $book;

    public function mount(Book $book)
    {
        $this->book = $book;
    }
    // 'product' => Product::where('slug', $this->slug)->firstOrFail(),


    public function render()
    {
        return view('livewire.book-borrow', [
            'book' => $this->book,
        ]);
    }
}
