<?php

namespace App\Http\Controllers;

use App\Models\BookType;
use App\Models\Book;


use Illuminate\Http\Request;

class BookTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
    if (auth()->user()->division_id == null) {
        $booktype = BookType::where('depart_id', auth()->user()->depart_id)->with('books')->get();
    } else {
        $booktype = BookType::where('division_id', auth()->user()->division_id)->with('books')->get();
    }
    return view('books.index', compact('booktype'));
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.book_types');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       /* $request->validate([
            'name' => 'required',
            'sequence' => 'required'
        ]);*/

        $user = auth()->user();
        $Booktype = BookType::create([
            "name" =>$request->name,
            "division_id" =>$user->division_id,
            "sequence" =>$request->sequence,
            "depart_id" =>$user->depart_id
                ]
        );
        
        return redirect('/booktypes_index') 
          ->with('success', 'تم اضافه تصنيف كتب ' . $Booktype->name );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book_Type  $Book_Type
     * @return \Illuminate\Http\Response
     */
    public function show($id)
{


    $booktype = BookType::where('division_id', auth()->user()->division_id)->with('books')->get();
    

        return view('books.allbooks', compact('booktype'));}




    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book_Type  $Book_Type
     * @return \Illuminate\Http\Response
     */
    public function edit(Book_Type $Book_Type)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book_Type  $Book_Type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book_Type $Book_Type)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book_Type  $Book_Type
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $booktype = BookType::find($id);
        $booktype->delete();
        return redirect('/booktypes_index') 
        ->with('success', ' تم حذف صنف الكتاب' );
    }
}
