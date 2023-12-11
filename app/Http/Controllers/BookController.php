<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookType;
use App\Models\User;
use App\Models\Image;

use Illuminate\Http\Request;
use Auth;
class BookController extends Controller
{
   
    public function index()
    {
        if(!auth())return redirect('login');
        $book = Book::all();
        

        return view('books.index', compact('book' ));
    }
    public function create($id)
    {
        $bookType = BookType::find($id);

        return view('books.create' , compact('bookType'));

    }

    
    public function store(Request $request ,$id )
    {

        $bookType = BookType::find($id);

       
        $request->validate([
            'book_no' => 'required|max:255',
            'book_date' => 'required',
            'book_details' => 'required',
            'book_to_from' =>'required',
            'cover'=>'image',
            'image'=>'image'

           
            
        ]);
        
        if($request ->hasFile('cover')){
            $filenamewithextention=$request->file('cover')->getClientOriginalname();
            $filename=pathinfo($filenamewithextention,PATHINFO_FILENAME);
            $extention=$request->file('cover')->getclientoriginalextension();
            $filenamestore1=$filename .'_'.time().'.'.$extention;
            $path=$request->file('cover')->storeAs('public/images',$filenamestore1);
        }
        

        $user = auth()->user();
        $book = Book::create([
            "book_type_id" =>$request->book_type_id,
            "book_no" =>$request->book_no,
            "book_date" =>$request->book_date,
            "book_details" =>$request->book_details, 
            'cover'=>$filenamestore1,
            "depart_id" =>$user->depart_id,
            "division_id" =>$user->division_id,
            "user_id" =>$user->id ,
            "book_to_from" =>$request->book_to_from,
            ]
        );

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $imageFile) {
                $filename = $imageFile->getClientOriginalName();
                $extension = $imageFile->getClientOriginalExtension();
                $filenameStore = pathinfo($filename, PATHINFO_FILENAME) . '_' . time() . '.' . $extension;
    
                $imageFile->storeAs('public/images2', $filenameStore);
    
                $image = Image::create([
                    'image' => $filenameStore,
                    'book_id' => $book->id
                ]);
        
        }
    
    }

    return redirect('/booktypes_index')->with('success','تم اضافة كتاب' .$bookType->name . ' الى ' . $book->book_details );

       


        
    }
       
    
    public function show($id)
    {
        $book = Book::find($id);
        $images = Image::where('book_id', $id)->get();

        return view('books.show',compact('book' ,'images'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $Book
     * @return \Illuminate\Http\Response
     */
    public function edit($id )
    {
        

        $booktype = BookType::where('division_id', auth()->user()->division_id)->with('books')->get();
        $images = Image::where('book_id', $id)->get();
        return view('books.edit', compact('booktype' ,'images'));








    }

    
    public function update(Request $request, $id)
    {

       
        
        /*
        $request->validate([
            'book_no' => 'required|max:255',
            'book_date' => 'required',
            'book_details' => 'required',
            'cover'=>'image'
           
            
        ]);
        */
       
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
        $book->book_to_from  =$request->book_to_from;
        $book->book_details  = $request->book_details;

        if($request ->hasFile('cover')){
        
        $book->cover = $filenamestore;}
         $book->save();
        
        return redirect('/allbooks_show_'.$request->unmberpage)->with('success', 'تم تعديل الكتاب');
           
    }

    public function destroy($id,request $request)
    {
  


        $booktype = BookType::where('division_id', $id)->get();
       

        $book = Book::find($id);
        $book->delete();

        return redirect('/allbooks_show_'.$request->unmberpage) 
        ->with('success',  ' حذف كتاب'  . ' ' .  $book->book_details   );
    }
}
