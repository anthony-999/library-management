<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowedController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Livewire\BookBorrow;
use App\Livewire\BorrowCart;
use App\Livewire\BorrowedList;
use App\Livewire\LandingPage;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;





Route::get('/', LandingPage::class)->name('landing');

Route::get('/view/{book}', BookBorrow::class)->name('view.book');

Route::get('/borrow-cart', BorrowCart::class)->name('borrow.cart');
Route::get('/borrow-list', BorrowedList::class)->name('borrow.list');

  
// Route::post('/cart/add/{book}', function ($bookId) {
//     $cart = session()->get('borrow_cart', []);
//     if (!in_array($bookId, $cart)) {
//         $cart[] = $bookId;
//         session()->put('borrow_cart', $cart);
//     }
//     return back()->with('success', 'Book added to cart.');
// })->name('cart.add');



Auth::routes(['verify' => true]);

Route::middleware(['auth', 'verified'])->group(function () {
  Route::get('/home', [HomeController::class, 'index'])->name('dashboard');
  Route::resource('categories', CategoryController::class);
  Route::resource('books', BookController::class);
  Route::resource('borrowed', BorrowedController::class);
  Route::resource('users', UserController::class);
  Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');



});
