<?php

namespace App\Livewire;

use App\Models\Book;
use App\Models\Category;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;


#[Title('Book Haven')] 
class LandingPage extends Component
{
    public function render()
    {
        return view('livewire.landing-page', [
            'categories' => Category::all(),
            'books' => Book::all(),
        ]);
    }
}
