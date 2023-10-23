@extends('layouts.app-master')

@section('content')
<body>
    
   

<main class="container" >
       
        <div class="card-body">
            <a class="navbar-brand h1" href="{{ route('home.index') }}">الرجوع</a>
           </div>
        <form action="{{ route('departs.store') }}" method="post" >
        @csrf
        
  <div class="mb-3">
    <label for="name" class="form-label">الاسم  </label>
    <input type="text" class="form-control" name="name" >
  </div>



  
  

  <button type="submit" class="btn btn-primary">ارسال</button>
</form>
    </main>

    <script src="{!! url('assets/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>
      
  
  </body>
  @endsection