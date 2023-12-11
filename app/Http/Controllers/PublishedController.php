<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
class BookController extends Controller
{
   

    
    public function show($id)
    {
       

        return view('books.published');


    }

    


}
