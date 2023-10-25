<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
class BookController extends Controller
{
   
    public function index()
    {
        if(!auth())return redirect('login');
        $book = Book::all();
        return view('books.index' , compact('book'));
    }
    public function create()
    {
        return view('books.create');

    }

    
    public function store(Request $request)
    {
        $request->validate([
            'book_no' => 'required|max:255',
            'book_date' => 'required',
            'book_details' => 'required',
            'cover'=>'image'
           
            
        ]);
        
        if($request ->hasFile('cover')){
            $filenamewithextention=$request->file('cover')->getClientOriginalname();
            $filename=pathinfo($filenamewithextention,PATHINFO_FILENAME);
            $extention=$request->file('cover')->getclientoriginalextension();
            $filenamestore=$filename .'_'.time().'.'.$extention;
            $path=$request->file('cover')->storeAs('public/images',$filenamestore);
        }
        $book = Book::create([
            "book_no" =>$request->book_no,
            "book_date" =>$request->book_date,
            "book_details" =>$request->book_details, 
            'cover'=>$filenamestore,
            'user_id'=>Auth::id(),
                ]
        );
        
        return redirect('/') 
          ->with('success', 'book created successfully.');
    }

    
    public function show($id)
    {
        $book = Book::find($id);

        return view('books.show',compact('book'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $Book
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id);
        return view('books.edit', compact('book'));
        
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'book_no' => 'required|max:255',
            'book_date' => 'required',
            'book_details' => 'required',
            'cover'=>'image'
           
            
        ]);

        if($request ->hasFile('cover')){
            $filenamewithextention=$request->file('cover')->getClientOriginalname();
            $filename=pathinfo($filenamewithextention,PATHINFO_FILENAME);
            $extention=$request->file('cover')->getclientoriginalextension();
            $filenamestore=$filename .'_'.time().'.'.$extention;
            $path=$request->file('cover')->storeAs('public/images',$filenamestore);
        }
        $book = BOOK::find($id);
        $book->book_no  = $request->book_no;
        $book->book_date  = $request->book_date;
        $book->book_details  = $request->book_details;

        if($request ->hasFile('cover')){
        
        $book->cover = $filenamestore;}
$book->save();

       

        return redirect()->route('books.index')->with('success', 'book created successfully.');
           
    }

    



    
    public function destroy($id)
    {
        $book = Book::find($id);
        $book->delete();

        return redirect()->route('books.index')
            ->with('success', 'book deleted successfully');
    }
}
