<?php

namespace App\Livewire;

use App\Models\Book;
use App\Models\Borrowed;
use App\Notifications\BookBorrowed;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Illuminate\Support\Facades\Notification;
use App\Models\User; // or Admin model




use Illuminate\Notifications\Notifiable;



class BorrowCart extends Component
{
    use Notifiable;

    public $cartBooks = [];

    public function mount()
    {
        $cartIds = session()->get('borrow_cart', []);
        $this->cartBooks = Book::whereIn('id', $cartIds)->get();
    }


    public function removeFromCart($bookID)
    {

        //. Getting the Current Cart from the session:
        $cart = session()->get('borrow_cart', []);

        // This removes the bookID you clicked on.
        // array_filter goes through each ID and only keeps those that are not equal to the one you want to remove.
        $updatedCart = array_filter($cart, function ($id) use ($bookID) {
            return $id != $bookID;
        });

        // Saving the Updated Cart
        session()->put('borrow_cart', array_values($updatedCart));

        // Refreshing the Displayed Books 
        $this->cartBooks = Book::whereIn('id', $updatedCart)->get();
        session()->flash('success', 'Book removed from cart.');
    }


    public function borrowBookFromCart()
    {

        $cart = session()->get('borrow_cart', []);

        $user = Auth::user();


        // Get all admin users (in case there are multiple)
        $admins = User::where('role', 'admin')->get();


        foreach ($cart as $bookId) {
            Borrowed::create([
                'book_id'      => $bookId,
                'user_id'      => $user->id,
                'borrow_date'  => now(),
                'due_date'     => now()->addDay(7),
                'status'       => 'borrowed',
            ]);

            $book = Book::find($bookId);
            if ($book) {
                $book->is_available = 0;
                $book->save();
                
                foreach ($admins as $admin) {
                $admin->notify(new BookBorrowed($book, $user)); // <-- include user info if needed
                }
            }
        }

        session()->forget('borrow_cart');
        $this->cartBooks = [];

        return redirect()->route('landing')->with('success', 'Books successfully borrowed!');
        //  session()->flash('success', 'Books successfully borrowed!');



    }


    public function render()
    {
        return view('livewire.borrow-cart');
    }
}
