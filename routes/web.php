<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowedController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Livewire\Admin\Category\CreateCategory;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/home', [UserController::class, 'index'])->name('dashboard');
    Route::resource('categories', CategoryController::class);
      Route::resource('books', BookController::class);
        Route::resource('borrowed', BorrowedController::class);

   
});



