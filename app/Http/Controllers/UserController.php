<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\DB; // Make sure to import this at the top
use Livewire\Attributes\Validate;

class UserController extends Controller
{
    // DASHBOARD PAGE HERE       
    public function index()
    {
        return view('admin.users.index', [
            'users' =>  User::where('role', 'user')->latest()->paginate(5),
        ]);
    }



    public function destroy(string $id)
    {

        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully!');
    }

    public function update(Request $request, string $id)
    {

        // validate input
        $validated = $request->validate([
            'name' => 'required',
            'student_number' => 'unique:users,student_number',
            'email' => 'email|unique:users,email',
            // 'password' => 'min:6',
            'password_confirmation' => 'same:password',
            'role' => 'required',        

        ]);

        // find the specific id to update
        $users =  User::findOrFail($id);

        //update db
        $users->update($validated);

         // flash msg & redirect to index
         return redirect()->route('users.index')->with('success', 'User updated successfully!');

    }

    public function store(Request $request){

        //validate input 
        $users = $request->validate([
            'name' => 'required',
            'student_number' => 'required|unique:users,student_number',
            'email' => 'required|email|unique:users,email',
             'password' => 'required|min:6|confirmed',
            'role' => 'required',    
        ]);

        //create in db
        User::create($users);

        //redirect to index
        return redirect()->route('users.index')->with('success', 'User added successfully!');
    }
}
