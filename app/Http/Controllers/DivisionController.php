<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\Depart;
use Illuminate\Http\Request;

class DivisionController extends Controller
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
        //
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
        
       
        $divisions = Division::create([
            "name" =>$request->name,
            "depart_id" =>$request->depart_id,
           
                ]
        );
        
        return redirect('/departs_home')  ->with('success',  'تم اضافه شعبه ' . $request->name .'');
         
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Division  $Division
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $depart = Depart::find($id);
        $divisions = Division::where('depart_id', $id)->get();
        return view('departs.showdivision', compact('divisions','depart'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Division  $Division
     * @return \Illuminate\Http\Response
     */
    public function edit(Division $Division)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Division $Division)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Division  $Division
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
  


       

        $division = Division::find($request->id);
        $division->delete();

        return redirect('/show_dividions_'.$request->id) 
        ->with('success',  ' حذف الشعبه'  . ' ' .  $division->name   );
    }
}
