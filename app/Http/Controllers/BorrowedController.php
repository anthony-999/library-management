<?php

namespace App\Http\Controllers;

use App\Models\Borrowed;
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
                'borroweds' =>  Borrowed::latest()->paginate(5),
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
    public function destroy(Borrowed $borrowed)
    {
        //
    }
}
