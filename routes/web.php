<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowedController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use App\Livewire\BookBorrow;
use App\Livewire\BorrowCart;
use App\Livewire\BorrowedList;
use App\Livewire\LandingPage;

// Public Routes
Route::get('/', LandingPage::class)->name('landing');
Route::get('/view/{book}', BookBorrow::class)->name('view.book');


// Auth routes with email verification
Auth::routes(['verify' => true]);

// Protected Routes
Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard
    Route::get('/home', [HomeController::class, 'index'])->name('dashboard');

    // Resource Controllers
    Route::resource('categories', CategoryController::class);
    Route::resource('books', BookController::class);
    Route::resource('borrowed', BorrowedController::class);
    Route::resource('users', UserController::class);
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');

    Route::get('/borrow-cart', BorrowCart::class)->name('borrow.cart');
    Route::get('/borrow-list', BorrowedList::class)->name('borrow.list');

    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
    Route::get('/reports/generate', [ReportController::class, 'generate'])->name('reports.generate');
});
