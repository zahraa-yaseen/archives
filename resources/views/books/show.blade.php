@extends('layouts.app-master')

@section('content')
<body>
    
    <div class="container ">
        <div class="row">
        <div class="card-body">
            <a class="navbar-brand h1" href="{{ route('home.index') }}">الرجوع</a>
           </div>
               <div class="card">
                <div class="card-header">
                    <h2 class="card-title"> رقم الكتاب:{{ $book->book_no }}</h2>
                </div>
                <div class="card-body">
                    <h5 class="card-text"> تاريخ الكتاب{{ $book->book_date }}</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">موضوع  الكتاب:{{ $book->book_details }}</p>
                </div>
                <div class="card-body">
                    <p class="card-text">جهة الكتاب  :{{ $book->book_to_from }}</p>
                </div>

                <div class="card-body">
                <img src="/storage/images/{{$book->cover}}" class="img-thumbnail" alt="{{$book->cover}}" > 
                
                @foreach($images as $image)
               <img src="/storage/images2/{{ $image->image }}" class="img-thumbnail" alt="{{ $image->image }}" >
    @endforeach
</div>
        </div>
    </div>
</div>
    @endsection
</body>