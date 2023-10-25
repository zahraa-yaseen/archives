@extends('layouts.app-master')

@section('content')
<body>
    <main class="container" >
        @yield('content')
        <div class="card-body">
            <a class="navbar-brand h1" href="{{ route('home.index') }}">الرجوع</a>
           </div>
           
        <table class="table caption-top">
  <caption>الكتب</caption>
  <thead>
    <tr>
      <th scope="col"># </th>

      <th scope="col">اسم المستخدم </th>
      <th scope="col">كلمة السر  </th>
      <th scope="col">الايميل</th>
      <th scope="col">نوع المستخدم</th>
      <th scope="col">القسم</th>
      <th scope="col">الشعب</th>
      <th scope="col">الحالات</th>
    </tr>
  </thead>

  
  <tbody>
  @foreach ($users as $user)




  <tr>
  <form action="{{ route('users.update', $user->id) }}" method="post">
  @csrf
  @method('PUT')
        <td scope="row">{{ $user->id }}</td>

        <td>
        <input type="text" class="form-control" id="name" name="name"
                            value="{{ $user->name }}" required    style="border: none;width: 150px;" >
                            </td>
                            <td></td>
        <!-- <td>{{ $user->password }}</td>-->
        <td> <input type="text" class="form-control" id="email" name="email"
                            value="{{ $user->email}}" required    style="border: none;width: 150px;" ></td>

                           
    
        <td>
            <select id="user_types_id" class="form-select" style="width: 150px;
    direction: rtl;">
            @foreach ($usertypes as $usertype)
      <option value="{{ $user->user_types_id }}" selected>{{ $usertype->name }}</option>
     @endforeach

    </select></td>



        <td>
            <select id="inputState" class="form-select" style="width: 150px;
    direction: rtl;">
     @foreach ($departs as $depart)
      <option value="{{ $depart->id }}" selected>{{ $depart->name }}</option>
     @endforeach
     
    </select></td>



    <td>
            <select id="inputState" class="form-select" style="width: 150px;
    direction: rtl;">
     @foreach ($divisions as $division)
      <option value="{{ $division->id }}" selected>{{ $division->name }}</option>
     @endforeach
     
    </select></td>





    

        <td class="Cases" style="display: flex;">
<div class="col-sm">
<button type="submit" class="btn btn-primary"> تحديث</button>
</div>
 </td>

 </form>
</tr>


@endforeach
  </tbody>
 

</table>









  </body>
  @endsection