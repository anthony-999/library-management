<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;


class UserController extends Controller
{

    // DASHBOARD PAGE HERE       

     public function index()
    {
        

      if (!Auth::check()) {
            return redirect('/login');
        }

        if (Auth::user()->role == 'admin') {
            return view('admin.dashboard', [
                'categories' => Category::all(),
                 'books' => Book::all(),
                   'borrowed' => Borrowed::all()
            ]); 
            
        } elseif (Auth::user()->role == 'user') {
            return view('user.welcome'); // make sure this view exists
        } else {
            abort(403, 'Unauthorized'); // optional
        }
    }
}
