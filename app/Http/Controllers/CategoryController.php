<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public $name;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view(
            'admin.category.index',
            [
                'categories' =>  Category::latest()->paginate(5),
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('admin.category.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        //validate request
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'cover_page' => 'required|image|mimes:png,jpg,jpeg|max:3000'
        ]);

        //validate image file
        if ($request->hasFile('cover_page')) {
            $validated['cover_page'] = $request->file('cover_page')->store('Category', 'public');
        }


        //create validated
        Category::create($validated);

        //redirect to index
        return redirect()->route('categories.index')->with('success', 'Category added successfully!');
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //\

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //Validate input
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'cover_page' => 'image|mimes:png,jpg,jpeg|max:3000'
        ]);

        // find the specifici id to update
        $category = Category::findOrFail($id);

        //validate the image
        if ($request->hasFile('cover_page')) {
            $validated['cover_page'] = $request->file('cover_page')->store('Category', 'public');
        }
        // update the category

        $category->update($validated);
        // redirect to index
        return redirect()->route('categories.index')->with('success', 'Category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //  dd($id);
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully!');
    }
}
