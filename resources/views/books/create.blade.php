<!doctype html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.87.0">
    <title>Fixed top navbar example · Bootstrap v5.1</title>

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
<body>
    
   

    <main class="container" >
        @yield('content')
        <div class="card-body">
            <a class="navbar-brand h1" href="{{ route('home.index') }}">الرجوع</a>
           </div>
        <form action="{{ route('books.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        
  <div class="mb-3">
    <label for="book_no" class="form-label">رقم الكتب</label>
    <input type="text" class="form-control" name="book_no" aria-describedby="number">
  </div>



  <div class="mb-3">
    <label for="book_date" class="form-label">تاريخ الكتاب</label>
    <input type="text" class="form-control" name="book_date">
  </div>
  

  <div class="mb-3">
    <label for="book_details" class="form-label">الموضوع </label>
    <input type="text" class="form-control" name="book_details">
  </div>

  <div class="mb-3">
  <label class="m-2">صوره لكتاب</label>
   <input type="file" id="input-file-now-custom-3" class="form-control m-2" name="cover">
    </div>


  <button type="submit" class="btn btn-primary">ارسال</button>
</form>
    </main>

    <script src="{!! url('assets/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>
      
  </body>
</html>