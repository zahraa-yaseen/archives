<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserType;
use App\Models\Depart;
use App\Models\Book;

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
        /*$request->validate([
            'name' => 'required',
            'email' => 'required|email:rfc,dns|unique:users,email',
            'username' => 'required|unique:users,username',
            'password' => 'required|min:8',
            
        ]);*/
        
        
        $user = User::create($request->all());
        
        return redirect('/users_index')->with('success', "تم اضافة مستخدم جديد للنظام" . $user->name);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {



        $depart = Depart::find($id);
        $users = User::where('depart_id',$id)->get();
        return view('departs.showuser', compact('users','depart'));
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
        // $request->validate([
        //     'name' => 'required|max:255',
        //     'email' => 'required',
        //     'password' => 'required',
        //     'user_types_id'=> 'required'
        // ]);
      
        
        $user = User::find($id);
        $user->name  = $request->name;
        $user->email  = $request->email;
        $user->password  = $request->password;
        $user->user_types_id  = $request->user_types_id;
        $user->depart_id  = $request->depart_id;
        $user->division_id  = $request->division_id;
        $user->sequence  = $request->sequence;




       
$user->save();

       

        return redirect()->route('users.index')->with('success',  ' تم تحديث معلومات ' .' '. $user->name);
           
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    { 
        $user = User::find($request->u_id);
        //$user = User::where($request->d_id,'depart_id')->get();

        $depart = Depart::where('id',$request->d_id)->first();
       $book= Book::where('depart_id',$request->d_id)->get();
       $division = Division::where('depart_id',$request->d_id)->first();

   /*if($user->id==$request->u_id){
    $user->delete();
        return redirect()->route('show.user',$request->d_id)->with('success', "تم حذف مستخدم   " . $user->name);

}*/
       
        if ($depart!==null) {
            return redirect()->route('show.user',$request->d_id)->with('error',  ' لا يمكن حذف المستخدم  لان ضمن قسم     '  . $depart->name );
        } 
    elseif ( $division!==null) {
            return redirect()->route('show.user',$request->d_id)->with('error',  ' لا يمكن حذف المستخدم  لان يحتوي على  عدد شعب ' .$division->name);
        }
    elseif(count($book)!==0){
        return redirect()->route('show.user',$request->d_id)->with('error',  ' لا يمكن حذف المستخدم  لان يحتوي على  عدد كتب ' .count( $book));

    }
else{
    $user->delete();
        return redirect()->route('show.user',$request->d_id)->with('success', " تم حذف مستخدم   " . $user->name);

    }}
}
