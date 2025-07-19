<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowedController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Livewire\BookBorrow;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Livewire\LandingPage;




Route::get('/', LandingPage::class)->name('landing');

Route::get('/view/{book}', BookBorrow::class)->name('view.book');


Auth::routes(['verify' => true]);

Route::middleware(['auth', 'verified'])->group(function () {
  Route::get('/home', [HomeController::class, 'index'])->name('dashboard');
  Route::resource('categories', CategoryController::class);
  Route::resource('books', BookController::class);
  Route::resource('borrowed', BorrowedController::class);
  Route::resource('users', UserController::class);
  Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');

});
