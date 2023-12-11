@extends('layouts.auth-master')

@section('content')
    <form method="post" action="{{ route('depart_user.store' ,$depart->id) }}">  
                   @csrf
       
        <h1 class="h3 mb-3 fw-normal">اضافه مستخدم</h1>
        <div class="card-body">
            <a class="navbar-brand h1" href="{{ route('departs.index' ) }}">الرجوع</a>
           </div>


        <div class="form-group form-floating mb-3">
        
            <input type="text" class="form-control" name="name"  placeholder="" required="required" autofocus>
            <label for="name">الاسم</label>
            
        </div>
<div class="form-group form-floating mb-3">

            <input type="email" class="form-control" name="email"  placeholder="" required="required" autofocus>
            <label for="email"> الايميل</label>
        </div>

        <div class="form-group form-floating mb-3">
   
            <input type="text" class="form-control" name="username"  placeholder="" required="required" autofocus>
            <label for="username">اسم المستخدم</label>
           
        </div>
        
        <div class="form-group form-floating mb-3">
        
            <input type="password" class="form-control" name="password"  placeholder="" required="required">
            <label for="Password">كلمه السر</label>
           
        </div>
        <input type=hidden  name="depart_id" value="{{$depart->id}}" >  

       

        <button class="w-100 btn btn-lg btn-primary" type="submit">ارسال</button>
        
      
    </form>
@endsection