<!doctype html>
<html lang="en">
    <head>
    

    <!-- Bootstrap core CSS -->
    <link href="{!! url('assets/bootstrap/css/bootstrap.min.css') !!}" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="{!! url('assets/css/app.css') !!}" rel="stylesheet">
</head>

    
   


@extends('layouts.app-master')

@section('content')
<body>
    
   

    <main class="container" >
       
       
        <div class="card-body">
            <a class="navbar-brand h1" href="{{ route('home.index') }}">الرجوع</a>
           </div>
        <form action="{{ route('books.store' , $bookType->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
         <input type="hidden" class="form-control" name="book_type_id" value="{{ $bookType->id }}" >
            </div>
  <div class="mb-3">
    <label for="book_no" class="form-label">رقم الكتب</label>
    <input  type="text" class="form-control" name="book_no" aria-describedby="number">
  </div>



  <div class="mb-3">
    <label for="book_date" class="form-label">تاريخ الكتاب</label>

    <input type="date" name="book_date" class="form-control"  placeholder="dd-mm-yyyy"> 
  </div>
  

  <div class="mb-3">
    <label for="book_details" class="form-label">الموضوع </label>
    <input type="text" class="form-control" name="book_details">
  </div>

  <div class="mb-3">
    <label for="book_details" class="form-label">جهة الكتاب</label>
    <input type="text" class="form-control" name="book_to_from">
  </div>

  

  <div class="mb-3">
  <label class="m-2">صوره لكتاب</label>
   <input type="file" id="input-file-now-custom-3" class="form-control m-2" name="cover">
  </div>
    <div class="mb-3">
        <label class="m-2"> </label>
      <i class=material-icons>Monitor Weight Gain</i>
         <input  type="file"class="form-control m-2 " id="show_file-image" name="images[]" multiple style="display: none;" >
         <input  type="file"class="form-control m-2 " id="show_file-image" name="images[]" multiple style="display: none;" >
         <input  type="file"class="form-control m-2 " id="show_file-image" name="images[]" multiple  >
         <button type="button" onclick="toggleClass()">+</button>

    </div>
  <button type="submit" class="btn btn-primary">ارسال</button>
</form>
    </main>

    <script src="{!! url('assets/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>
      
  </body>
