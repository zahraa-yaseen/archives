





@extends('layouts.app-master')

@section('content')
<body>
    <main class="container" >
    <div>
    @if( $message =Session::get('success'))
                    <div class="card-header">
                            <h5 class="card-title"> {{$message}}</h5>
                        </div>
                    @endif
</div>

        @yield('content')
        
            <h2>واجهة مستخدمين النظام  </h2>
           
        <div class="card-body">
        <button type="submit" class="btn btn-primary" > <a  style="color:#fff;"href="{{ route('users.create') }}"> اضافة مستخدم</a></button>
           </div>
        <div class="card-body">
            <a class="navbar-brand h1" href="{{ route('home.index') }}">الرجوع</a>
           </div>
           
           
        <table class="table caption-top table-success">
  <caption>واجهه المستخدمين</caption>
  <thead>
    <tr class="table-primary">
      
      <th scope="col">اسم المستخدم </th>
      <th scope="col">الايميل</th>
      <th scope="col">نوع المستخدم</th>
      <th scope="col">القسم</th>
      <th scope="col">الشعب</th>
      <th ></th>
    </tr>
  </thead>
       
  <tbody>
  @foreach ($users as $user)
  <tr class="table-primary">
    <td colspan="10">
    <form action="/users_update_{{$user->id}}" method="post">
  @csrf
  @method("put")
      <table class="table caption-top table-success">
        <tr class="table-primary">
        <td>
        <input type="text" class="form-control" id="name" name="name"
                            value="{{ $user->name }}" required    style="border: none;width: 150px; direction: rtl; background-color: #cde5ed;" >
                            </td>

                            <td></td>
        <!-- <td>{{ $user->password }}</td>-->
        <td> <input type="text"  id="email" name="email"
                            value="{{ $user->email}}" required    style="border: none;width: 150px; background-color: #cde5ed;" ></td>
            <td>
            <select id="user_types_id" name="user_types_id" class="form-select" style="width: 150px; background-color: #cde5ed;
    direction: rtl;">
            @foreach ($usertypes as $usertype)
      <option value="{{ $usertype->id }}" @if($usertype->id==$user->user_types_id) selected="selected" @endif>{{ $usertype->name }}</option>
     @endforeach

    </select></td>

        <td>
            <select id="inputState" name="depart_id" class="form-select" style="width: 150px;background-color: #cde5ed;
    direction: rtl;">
     @foreach ($departs as $depart)
      <option value="{{ $depart->id }}" @if($depart->id==$user->depart_id) selected="selected" @endif>{{ $depart->name }}</option>
     @endforeach
     
    </select></td>
    <td>
    <select id="inputState" name="division_id" class="form-select" style="width: 150px;background-color: #cde5ed;
    direction: rtl;">
     @foreach ($divisions as $division)
      <option value="{{ $division->id }}" @if($division->id==$user->division_id) selected="selected" @endif>{{ $division->name }}</option>
     @endforeach
     
    </select></td>





        <td class="Cases" style="display: flex;">
<div class="col-sm">

<button type="submit" class="btn btn-primary"> تحديث</button>
</div>
 </td>
 <!--
<td>
<div class="col-sm">

<form action="user_destroy"  method="post">
@csrf
    @method('DELETE') 
    <input type="hidden" name="u_id" value="{{ $user->id }}">
      <button type="submit" class="btn btn-danger btn-sm">حذف</button>
         </form>
        
     </div>
</dt>
-->
</table>
 </form>
    </td>
</form>
  </tr>
@endforeach
  </tbody>
</table>
  </body>

  
  @endsection








  