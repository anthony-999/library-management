<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //C:\Users\User\Desktop\library-system\resources\views\admin\books\index.blade.php
        return view(
            'admin.books.index',
            [
                'categories' => Category::all(),
                'books' => Book::latest()->paginate(5),
                

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
        //
        //validate request
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required',
            'author' => 'required',
            'isbn' => 'required',
            'description' => 'required',
            'cover_page' => 'required|image|mimes:png,jpg,jpeg|max:3000',
            'published_year' => 'required',
            'is_available' => 'required',

        ]);
        //validate image file
        if ($request->hasFile('cover_page')) {
            $validated['cover_page'] = $request->file('cover_page')->store('Books', 'public');
        }

        //create validated
        Book::create($validated);
        //redirect to index
        return redirect()->route('books.index')->with('success', 'Book added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        //Validate input
        $validated = $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'author' => 'required',
            'isbn' => 'required',
            'description' => 'required',
            //cover page optional to upload new image but file is png etc...
            'cover_page' => 'image|mimes:png,jpg,jpeg|max:3000',
            'published_year' => 'required',
            'is_available' => 'required',

        ]);


        // find the specific id to update
        $books = Book::findOrFail($id);


        //validate the image
        if ($request->hasFile('cover_page')) {
            $validated['cover_page'] = $request->file('cover_page')->store('Books', 'public');
        }

        // update the category
        $books->update($validated);

        // redirect to index
        return redirect()->route('books.index')->with('success', 'Book updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $books = Book::findORFail($id);

        $books->delete();

        // redirect to index
        return redirect()->route('books.index')->with('success', 'Book deleted successfully!');
    }
}
