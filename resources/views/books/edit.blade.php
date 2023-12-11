@extends('layouts.app-master')

@section('content')
<div class="container h-100 mt-5">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-10 col-md-8 col-lg-6">
            <div class="card-body">
            <a class="navbar-brand h1" href="{{ route('home.index') }}">الرجوع</a>
           </div>
                <h3>تحديث الكتاب</h3>
                @foreach ($booktype as $booktype)
  @foreach ($booktype->books as $book)
                <form action="{{ route('books.update', $book->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="book_no">رقم الكتاب</label>
                        <input type="text" class="form-control" id="book_no" name="book_no"
                            value="{{ $book->book_no }}" required>
                    </div>
                    <div class="form-group">
                        <label for="book_date">تاريخ الكتاب</label>
                        <input type="text" class="form-control" id="book_date" name="book_date"
                            value="{{ $book->book_date }}" required>
                    </div>

                    <div class="form-group">
                        <label for="book_details">  موضوع الكتاب</label>
                        <textarea class="form-control" id="book_details" name="book_details" rows="3" required>{{ $book->book_details }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="book_details">  جهة الكتاب </label>
                        <textarea class="form-control" id="book_to_from" name="book_to_from" rows="3" required>{{ $book->book_to_from }}</textarea>
                    </div>

                   

                   
                    
                    <label for="cover">صوره الكتاب</label>
                            <div class="card-body" >
                          
                            <img src="/storage/images/{{$book->cover}}" class="img-thumbnail" alt="{{$book->cover}}" style="width:40%,height:40%" > 

                            <input type="file" class="form-control-file" name="cover">
                        </div>
                        
                        <div class="card-body" >
                        @guest
                         <img src="/storage/images2/{{ $image->image }}" class="img-thumbnail" alt="{{ $image->image }}" style="width: 50%; height: 50%;">
                           
                         <input type="file" class="form-control-file" name="cover">
                         @endguest
                        </div>
                       




                        
                        <div class="card-body">
                  @foreach($images as $image)
        <img src="/storage/images2/{{ $image->image }}" class="img-thumbnail" alt="{{ $image->image }}" style="width: 50%; height: 50%;">
        @endforeach
        </div>
                      
                    


                    <div class="form-group">
                    <button type="submit" class="btn btn-primary"> تحديث</button>
</div>
<input type="hidden" class="form-control" name="unmberpage" value="{{ $booktype->id }}" >

                </form>
                @endforeach
@endforeach
            </div>
        </div>
    </div>
    @endsection