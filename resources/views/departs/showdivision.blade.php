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

</div>
        <div class="card-body">
            <a class="navbar-brand h1" href="{{ route('departs.index') }}">الرجوع</a>
           </div>
        <table class="table caption-top">
  <caption>الشعب</caption>
  <thead>
    <tr>
      <th scope="col">اسم الشعبه  داخل قسم {{$depart->name}}</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($divisions as $division)
  
    <tr>
        <td>{{ $division->name }}</td>
        <td>
        <div class="col-sm">

<form action="division_destroy?id={{$division->id}}"  method="post">
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


  










  