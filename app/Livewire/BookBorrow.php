<?php

namespace App\Livewire;

use App\Models\Book;
use Livewire\Component;

class BookBorrow extends Component
{
    public $book;
    public $cartBooks = [];

    public function mount(Book $book)
    {
        $this->book = $book;
    }

    public function addToCart()
    {
        $cart = session()->get('borrow_cart', []);

        if (!in_array($this->book->id, $cart)) {
            $cart[] = $this->book->id;
            session()->put('borrow_cart', $cart);
            session()->flash('success', 'Book added to cart.');
        } else {
            
            session()->flash('error', 'Book is already in the cart.');
        }
    }

    public function render()
    {
        return view('livewire.book-borrow');
    }
}
