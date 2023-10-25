<?php

namespace App\Http\Controllers;

use App\Models\Depart;
use App\Models\Division;

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
        $departs = Depart::all();
        return view('departs.index' , compact('departs' ));
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
        
        return redirect('/departs/index') 
          ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Depart  $Depart
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
       // return $request;
        $depart =Depart::find($request->id);
        $division =Division::find($request->id);

    
        return view('departs.show',compact('depart' ,'division'));
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Depart  $Depart
     * @return \Illuminate\Http\Response
     */
    public function edit(Depart $Depart)
    {
        
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
    public function destroy(Request $request)
    {
        $depart = Depart::find($request->id);
        $depart->delete();

        return redirect()->route('departs.index')
            ->with('success', 'book deleted successfully');
    }
}
