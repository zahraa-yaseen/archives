<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserType;
use App\Models\Depart;
use App\Models\Division;



use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $users = User::all();
        $usertypes = UserType::all();
        $departs = Depart::all();
        $divisions = Division::all();




        return view('users.index' , compact('users' , 'usertypes' , 'departs' ,'divisions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function show(Users $User)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function edit(User $User)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required',
            'password' => 'required',
            'user_types_id'=> 'required'
           
            
        ]);
        return  dd($request);
       
        $user = User::find($id);
        $user->name  = $request->name;
        $user->email  = $request->email;
        $user->password  = $request->password;
        $user->user_types_id  = $request->user_types_id;
        $user->depart_id  = $request->depart_id;
        $user->division_id  = $request->division_id;



       
$user->save();

       

        return redirect()->route('/')->with('success', 'book created successfully.');
           
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $User)
    {
        //
    }
}
