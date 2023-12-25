





@extends('layouts.app-master')

@section('content')
<body style="direction: rtl;">
    <main class="container" >
    <div>
    @if( $message =Session::get('success'))
                    <div class="card-header">
                            <h5 class="card-title"> {{$message}}</h5>
                        </div>
                    @endif
</div>

        @yield('content')
        
           
<button type="button" class="btn btn-primary"> <a style ="color:#fff;"    href="{{ route('home.index') }}">الرجوع</a></button>
           
        <div class="card-body">
        <h1>واجهة مستخدمين النظام  </h1>
        <button type="submit" class="btn btn-primary" > <a  style="color:#fff;"href="{{ route('users.create') }}"> اضافة مستخدم</a></button>
           </div>
       
           
           <table class="table table table-bordered table-primary ">
  <caption>واجهه المستخدمين</caption>
  <thead>
    <tr>
      <th scope="col">اسم المستخدم </th>
      <th scope="col">الايميل</th>
      <th scope="col">نوع المستخدم</th>
      <th scope="col">القسم</th>
      <th scope="col">الشعب</th>
      <th scope="col">التسلسل</th>
      <th scope="col">تحديث البيانات</th>


      <th ></th>
    </tr>
  </thead> 




  <tbody>
  @foreach ($users as $user)
  <tr>
    <td colspan="10">
    <form action="/users_update_{{$user->id}}" method="post">
  @csrf
  @method("put")
      <table class="table table table-bordered table-primary ">
        <tr>
        <td>
        <input type="text"  id="name" name="name"
                            value="{{ $user->name }}" required >
                            </td>

        <td> <input type="text"  id="email" name="email" 
                            value="{{ $user->email}}" required ></td>
           
           
                            <td>
            <select id="user_types_id" name="user_types_id"  >
          
            @foreach ($usertypes as $usertype)
      <option class="option_user" value="{{ $usertype->id }}" @if($usertype->id==$user->user_types_id) selected="selected" @endif>{{$usertype->name }}</option>
     @endforeach

    </select></td>

        <td>
            <select id="inputState" name="depart_id"  >
     @foreach ($departs as $depart)
      <option value="{{ $depart->id }}" class="option_user" @if($depart->id==$user->depart_id) selected="selected" @endif>{{ $depart->name }}</option>
     @endforeach
     
    </select></td>
    <td>
    <select id="inputState" name="division_id">
        <option value="" class="option_user" selected disabled>    </option>
        @foreach ($divisions as $division)
            <option value="{{ $division->id }}" class="option_user" @if($division->id==$user->division_id) selected="selected" @endif>{{ $division->name }}</option>
        @endforeach
    </select>
</td>
<td>
        <input type="text"  id="sequence" name="sequence"
                            value="{{ $user->sequence }}" required >
                            </td>



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








  