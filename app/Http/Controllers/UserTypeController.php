<?php

namespace App\Http\Controllers;

use App\Models\UserType;
use Illuminate\Http\Request;

class UserTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       /* if(!auth())return redirect('login');
        $user_types = User_Type::all();
        return view('user_types.index' , compact('user_types'));*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user_types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'sequence' => 'required'
        ]);
        $user_type = UserType::create([
            "name" =>$request->name,
            "sequence" =>$request->sequence
            
                ]
        );
        
        return redirect('/') 
          ->with('success', 'book created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserType  $User_Type
     * @return \Illuminate\Http\Response
     */
    public function show(User_Type $User_Type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User_Type  $User_Type
     * @return \Illuminate\Http\Response
     */
    public function edit(User_Type $User_Type)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User_Type  $User_Type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User_Type $User_Type)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User_Type  $User_Type
     * @return \Illuminate\Http\Response
     */
    public function destroy(User_Type $User_Type)
    {
        //
    }
}
