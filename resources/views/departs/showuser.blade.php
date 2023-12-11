@extends('layouts.app-master')

@section('content')
<body>
    <main class="container" >
        @yield('content')
        <div>
    @if( $message =Session::get('success'))
                    <div class="card-header">
                            <h5 class="card-title"> {{$message}}</h5>
                        </div>
                    @endif
</div>


<div>
    @if( $message =Session::get('error'))
                    <div class="card-header">
                            <h5 class="card-title"> {{$message}}</h5>
                        </div>
                    @endif
</div>


        <div class="card-body">
            <a class="navbar-brand h1" href="{{ route('departs.index') }}">الرجوع</a>
           
            <a class="navbar-brand h1" href="{{ route('depart.adduser' ,$depart->id) }}">اضافه مستخدم</a>
          
          </div>
        <table class="table caption-top">
  <caption>الشعب</caption>
  <thead>
    <tr>
      <th scope="col">اسماء المستخدمين داخل قسم {{$depart->name}}  </th>
    </tr>
  </thead>
  <tbody>
  @foreach ($users as $user)
  
    <tr>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->username }}</td>



        <td>
        <div class="col-sm">

<form action="user_destroy"  method="post">
<input type="hidden" class="form-control" name="d_id" value="{{ $depart->id }}" >
<input type="hidden" class="form-control" name="u_id" value="{{$user->id}}" >

              @csrf
    @method('DELETE')         
    
      <button type="submit" class="btn btn-danger btn-sm">حذف</button>
         </form>
     </div>
</dt>
    </tr>

@endforeach

  </tbody>
</table>
  </body>
 
  @endsection


  










  