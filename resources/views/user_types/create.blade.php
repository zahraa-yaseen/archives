@extends('layouts.app-master')

@section('content')
<body>
    
   

<main class="container" >
       
        <div class="card-body">
            <a class="navbar-brand h1" href="{{ route('home.index') }}">الرجوع</a>
           </div>
        <form action="{{ route('user_types.store') }}" method="post" >
        @csrf
        
  <div class="mb-3">
    <label for="name" class="form-label">الاسم  </label>
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