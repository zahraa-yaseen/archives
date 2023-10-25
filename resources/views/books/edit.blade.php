@extends('layouts.app-master')

@section('content')
<div class="container h-100 mt-5">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-10 col-md-8 col-lg-6">
                <h3>تحديث الكتاب</h3>
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
                   

                   
                    

                            <div class="card-body" >
                            <label for="cover">صوره  الكتاب</label>
                            <img src="/storage/images/{{$book->cover}}" class="img-thumbnail" alt="{{$book->cover}}" style="width:40%,height:40%" > 

                            <input type="file" class="form-control-file" name="cover">
                        </div>
                      
                    


                    <div class="form-group">
                    <button type="submit" class="btn btn-primary"> تحديث</button>
</div>
                </form>
            </div>
        </div>
    </div>
    @endsection