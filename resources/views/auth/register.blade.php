@extends('layouts.auth-master')

@section('content')
    <form method="post" action="{{ route('register.perform') }}">  <!--  
        
    هنا راح ياخذ المعلومات مشفره لان \post  تحافظ على خصوصية المعلومات 

اما action -->
                   
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <h1 class="h3 mb-3 fw-normal">Register</h1>
        
        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="name"  placeholder="" required="required" autofocus>
            <label for="name">الاسم</label>
            
        </div>
        
          <div class="form-group form-floating mb-3">
            <input type="email" class="form-control" name="email"  placeholder="name@example.com" required="required" >
            <label for="floatingEmail">الايميل</label>
            @if ($errors->has('email'))
                <span class="text-danger text-left">{{ $errors->first('email') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="username"  placeholder="Username" required="required" >
            <label for="floatingName">اسم المستخدم </label>
            @if ($errors->has('username'))
                <span class="text-danger text-left">{{ $errors->first('username') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <input type="password" class="form-control" name="password"  placeholder="Password" required="required" >
            <label for="floatingPassword">كلمةالسر</label>
            @if ($errors->has('password'))
                <span class="text-danger text-left">{{ $errors->first('password') }}</span>
            @endif
        </div>
           
        <div class="form-group form-floating mb-3">
            <input type="password" class="form-control" name="password_confirmation"  placeholder="Confirm Password" required="required">
            <label for="floatingConfirmPassword">تاكيد كلمة السر </label>
            @if ($errors->has('password_confirmation'))
                <span class="text-danger text-left">{{ $errors->first('password_confirmation') }}</span>
            @endif
        </div>

          <!--
        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="sequence"  placeholder="" required="required" autofocus>
            <label for="sequence">تسلسل</label>
            
        </div>
-->

        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="exampleCheck1" name="checkbox_field" >
            <label class="form-check-label" for="exampleCheck1">اعطاء صلاحية الحذف والتعديل </label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
        
      
    </form>
@endsection