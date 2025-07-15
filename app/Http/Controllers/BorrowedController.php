<?php

namespace App\Http\Controllers;

use App\Models\Borrowed;
use App\Models\Book;

use Illuminate\Http\Request;

class BorrowedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view(
            'admin.borrowed.index',
            [
               'borroweds' => Borrowed::with(['book', 'user'])->latest()->paginate(5),
        'books' => Book::all(),
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate the request

      

        $validated = $request->validate([

            'book_id'        => 'required|exists:books,id',
            'student_number' => 'required|exists:users,student_number',
            'borrow_date'    => 'required|date',
            'due_date'       => 'required|date|after_or_equal:borrow_date',
            'status'         => 'required|in:borrowed,returned,overdue',
        ]);

        //create validated
        Borrowed::create($validated);

        //flash message
        return redirect()->route('borrowed.index')->with('success', 'Borrowed added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Borrowed $borrowed)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Borrowed $borrowed)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Borrowed $borrowed)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //find specific id
        $deleted = Borrowed::findOrFail($id);
        $deleted->delete();
         //flash message
        return redirect()->route('borrowed.index')->with('success', 'Borrowed deleted successfully');


        
    }
}
