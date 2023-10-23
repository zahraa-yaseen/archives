<?php

namespace App\Http\Controllers;

use App\Models\Depart;
use Illuminate\Http\Request;

class DepartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('departs.create');
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
           
        ]);
        
       
        $departs = Depart::create([
            "name" =>$request->name,
           
                ]
        );
        
        return redirect('/') 
          ->with('success', 'book created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Depart  $Depart
     * @return \Illuminate\Http\Response
     */
    public function show(Depart $Depart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Depart  $Depart
     * @return \Illuminate\Http\Response
     */
    public function edit(Depart $Depart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Depart  $Depart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Depart $Depart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Depart  $Depart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Depart $Depart)
    {
        //
    }
}
