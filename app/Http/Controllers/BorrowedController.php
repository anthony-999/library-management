<?php

namespace App\Http\Controllers;

use App\Models\Borrowed;
use App\Models\Book;
use App\Models\User;
use Illuminate\Support\Collection;



use Illuminate\Http\Request;

class BorrowedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get users who have borrowed books, with their borrowed books and related book info
        $users = User::with(['borroweds.book'])
            ->whereHas('borroweds') // Only include users who have borrow records
            ->get();

        $borroweds = Borrowed::with(['book', 'user'])
            ->orderBy('created_at', 'desc')
            ->get()
            ->groupBy(function ($item) {
                return $item->user_id . '|' . $item->created_at;
            });

        return view('admin.borrowed.index', [
            'users' => $users,     // For grouped display
            'borroweds' => $borroweds,     // For grouped display
            'books' => Book::where('is_available', 1)->get(), // ✅ Only available books
        ]);
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
        // Validate input
        $validated = $request->validate([
            'book_id'        => 'required|array',             // Ensure book_id is an array
            'book_id.*'      => 'required|exists:books,id',   // Validate each book id
            'student_number' => 'required|exists:users,student_number',
            'borrow_date'    => 'required|date',
            'due_date'       => 'required|date|after_or_equal:borrow_date',
            'status'         => 'required|in:borrowed,returned,overdue',
        ]);

        // Get the user by student_number
        $user = User::where('student_number', $validated['student_number'])->first();

        // Loop through selected books and create a borrowed record for each
        foreach ($validated['book_id'] as $bookId) {
            Borrowed::create([
                'book_id'      => $bookId,
                'user_id'      => $user->id,
                'borrow_date'  => $validated['borrow_date'],
                'due_date'     => $validated['due_date'],
                'status'       => $validated['status'],
            ]);
        }

        // Redirect with success message
        return redirect()->route('borrowed.index')->with('success', 'Borrowed books added successfully.');
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
    public function update(Request $request, string $id)
    {


        //validate input
        $updateBorrowed = $request->validate([
            //    'name'        => 'required|array',            
            //     'name.*'      => 'required|exists:books,id',   
            //     // 'student_number' => 'required|exists:users,student_number',
            'borrow_date'    => 'required|date',
            'due_date'       => 'required|date|after_or_equal:borrow_date',
            'status'         => 'required|in:borrowed,returned,overdue',
            'return_date'    => 'required|date',
            'status' => 'required',

        ]);

        // find the specific id to update
        $borrowed = Borrowed::findOrFail($id);

        // update the category
        $borrowed->update($updateBorrowed);

        // flash msg & redirect to index
        return redirect()->route('borrowed.index')->with('success', 'Borrowed updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the specific borrowed entry
        $borrow = Borrowed::findOrFail($id);

        // Delete all entries with the exact same user and timestamp
        Borrowed::where('user_id', $borrow->user_id)
            ->where('created_at', $borrow->created_at)
            ->delete();

        return redirect()->route('borrowed.index')->with('success', 'Borrowed group deleted successfully.');
    }
}
