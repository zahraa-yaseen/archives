<?php

namespace App\Http\Controllers;

use App\Models\Depart;
use App\Models\Division;
use App\Models\User;
use App\Models\Book;
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

        return view('departs.index' , compact('departs'));
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
        
        return redirect('/departs_home') 
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

    
        return view('departs.create_division',compact('depart' ,'division'));
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Depart  $Depart
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


        $depart =Depart::find($id);
       
        return view('departs.edit' ,compact('depart'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Depart  $Depart
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {
         
        $depart = Depart::find($id);
        $depart->name  = $request->name;
      



       
$depart->save();

    
        return redirect()->route('departs.index')->with('success', 'تم تحديث معلومات المستخدم' .$depart->name);
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
    $user = User::where('depart_id', $request->id)->first();
   $division = Division::where('depart_id', $request->id)->first();
   $book = Book::where('depart_id', $request->id)->get();
    
   if ($division) {
        return redirect()->route('departs.index')->with('error',  ' لا يمكن حذف القسم، لان ضمن شعبة      ' . ' '.$division->name);
    }

elseif( $user){
    return redirect()->route('departs.index')->with('error',   ' ولا يمكن حذف القسم لان يحتوي على  عدد  مستخدم '. ''. $user->name);
}

elseif(count( $book)!==0){
    return redirect()->route('departs.index')->with('error',  '  لا يمكن حذف القسم، لان يحتوي على  عدد كتب'. ' '.count( $user));
}
else{
    $depart->delete();

    return redirect()->route('departs.index')->with('success', '   تم  حذف القسم بنجاح'  . ' '.$depart->name);
}
}

/**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Depart  $Depart
     * @return \Illuminate\Http\Response
     */
    public function add($id)
    {
        $depart = Depart::find($id);
        return view('departs.adduser', compact('depart'));
       
    }

    public function user_store(Request $request ,$id)
    {
        /*$request->validate([
            'name' => 'required',
            'email' => 'required|email:rfc,dns|unique:users,email',
            'username' => 'required|unique:users,username',
            'password' => 'required|min:8',
            
        ]);*/
        
        
        $user = User::create($request->all());
        
        return redirect()->route('show.user',$id)->with('success', "{{$user->name}}تم اضافة مستخدم جديد للقسم");
    }
    
}
