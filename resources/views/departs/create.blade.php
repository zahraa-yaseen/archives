@extends('layouts.app-master')

@section('content')
<body>
<main class="container" >
<button type="button" class="btn btn-primary"> <a style ="color:#fff;"    href="{{ route('departs.index') }}">الرجوع</a></button>
<div class="card-body">
<h1>اضافة قسم</h1>
          </div>


          <div class="row g-3 align-items-center">
          
  <div class="col-auto">
  <form action="{{ route('departs.store') }}" method="post" >
        @csrf   

    <label for="name" class="form-label">اسم القسم</label>
  </div>

  
  <div class="col-auto">
    <input type="text"  class="form-control" name="name">
  </div>
  <div class="col-auto">
  <div> <button type="submit" class="btn btn-primary">ارسال</button></div>
</form>
</div>
    </main>
  </body>
  @endsection