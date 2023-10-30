@extends('layouts.app-master')

@section('content')
<body>
    
   
  
<main class="container" >
       
        <div class="card-body">
            <a class="navbar-brand h 1" href="{{ route('home.index') }}">الرجوع</a>
           </div>

  <div class="card-header">
                    <h5 class="card-text"> اسم القسم :{{ $depart->name }}</h5>
                </div>
               

                <form action="{{ route('divisions.store' ) }}" method="post" >
        @csrf   
        <div class="form-group">
                        
                        <input type="hidden" class="form-control" name="depart_id" value="{{ $depart->id }}" >
                    </div>



                <div class="form-group">
                        <label for="name">  الشعب </label>
                        <input type="card-text" class="form-control" name="name" >
                    </div>
  
                    
        

  <button type="submit" class="btn btn-primary">اضافه</button>
  
</form>
    </main>

    <script src="{!! url('assets/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>
      
  
  </body>
  @endsection