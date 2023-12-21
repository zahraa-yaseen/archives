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
<button type="button" class="btn btn-primary"> <a style ="color:#fff;"    href="{{ route('book_types.index') }}">الرجوع</a></button>

<div class="card-body" style="width: 50%; margin: auto;">
            <h1> اضافة تصنيف الكتاب</h1>
        <br>
      
           
         
        <form action="{{ route('book_types.store') }}" method="post" >
        @csrf
        
  <div class="mb-3">
    <label for="name" class="form-label">اسم تصنيف كتاب جديد</label>
    <input type="text" class="form-control" name="name" >
  </div>
  






  <div class="mb-3">
    <label for="sequence" class="form-label">التسلسل </label>
    <input type="text" class="form-control" name="sequence" >
  </div>
  

  

  <button type="submit" class="btn btn-primary">ارسال</button>
</form>
    </main>

    <script src="{!! url('assets/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>
      
  
  </body>
  @endsection
  