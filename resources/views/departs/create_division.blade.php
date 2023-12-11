@extends('layouts.app-master')

@section('content')
<body>
    
   
  
<main class="container" >
       
<div class="card-body">
<h5>اضافة شعبه</h5>
            <button type="button" class="btn btn-primary"> <a style ="color:#fff;"   class="navbar-brand " href="{{ route('departs.index') }}">الرجوع</a></button>
          </div>


          <div class="row g-3 align-items-center">
          <div class="col-auto">

  
                    <h5 class="card-text"> اسم القسم :{{ $depart->name }}</h5>
                
               

                <form action="{{ route('divisions.store' ) }}" method="post" >
        @csrf
        </div>
        
        
        <div class="form-group">
                        
                        <input type="hidden" class="form-control" name="depart_id" value="{{ $depart->id }}" >
                    </div>



                    <div class="col-auto">
                        <label for="name">  الشعب </label>
                        </div>
                        <div class="col-auto">
                        <input type="card-text" class="form-control" name="name" >
                    </div>
  
                    
        
                    <div class="col-auto">
  <button type="submit" class="btn btn-primary">اضافه</button>
  </div>
  
  
</form>
    </main>

    <script src="{!! url('assets/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>
      
  
  </body>
  @endsection