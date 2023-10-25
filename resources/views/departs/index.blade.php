@extends('layouts.app-master')

@section('content')
<body>
    <main class="container" >
        @yield('content')
        <div class="card-body">
            <a class="navbar-brand h1" href="{{ route('home.index') }}">الرجوع</a>
           </div>
           <div class="card-body">
            <a class="navbar-brand h1" href="{{ route('departs.create') }}">اضافه</a>
           </div>


        <table class="table caption-top">
  <caption>الاقسام</caption>
  <thead>
    <tr>
     
      <th scope="col">اسم القسم </th>
      <th scope="col">الشعب   </th>
      <th scope="col">الحالات</th>
    </tr>
  </thead>

  
  <tbody>
  @foreach ($departs as $depart)




  <tr>
 
       <!-- <td scope="row">{{ $depart->id }}</td>-->
        <td>
        <input type="text" class="form-control" id="name" name="name"
                            value="{{ $depart->name }}" required    style="border: none;width: 150px;" >
                            </td>

                            <td scope="row" > <a href="/departs/show?id={{$depart->id}}" class="btn btn-primary btn-sm"> اضافة شعبه</a>

</td>




<td>
<div class="col-sm">
                                    <form action="/departs/destroy?id={{$depart->id}}" method="post">

                                        @csrf
                                        @method('DELETE')
                                        
                                        <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                                    </form>
                                </div>
</td>




    


 
</tr>


@endforeach
  </tbody>
 

</table>









  </body>
  @endsection