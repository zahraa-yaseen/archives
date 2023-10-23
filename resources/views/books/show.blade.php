@extends('layouts.app-master')

@section('content')
<body>
    
    <div class="container h-100 mt-5">
        <div class="row h-100 justify-content-center align-items-center">
        <div class="card-body">
            <a class="navbar-brand h1" href="{{ route('books.index') }}">الرجوع</a>
           </div>
               <div class="card">
                <div class="card-header">
                    <h2 class="card-title"> رقم الكتاب:{{ $book->book_no }}</h2>
                </div>
                <div class="card-body">
                    <h5 class="card-text"> تاريخ الكتاب{{ $book->book_date }}</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">نبذه عن الكتاب:{{ $book->book_details }}</p>
                </div>

                <div class="card-body">
  <img src="/storage/images/{{$book->cover}}" class="img-thumbnail" alt="{{$book->cover}}" style="width:50%,height:50%" > 

                        </div>


            </div>
        </div>
    </div>
    @endsection
</body>