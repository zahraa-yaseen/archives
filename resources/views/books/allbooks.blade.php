@extends('layouts.app-master')

@section('content')
<body>
    
   

    <main class="container" >
        @yield('content')
        <div>
    @if( $message =Session::get('success'))
                    <div class="card-header">
                            <h5 class="card-title"> {{$message}}</h5>
                        </div>
                    @endif
</div>
        <div class="card-body">
            <a class="navbar-brand h1" href="{{ route('book_types.index') }}">الرجوع</a>
           </div>

<form method="GET" action="/results">
  <input class="input" name="search" placeholder="enter your search ..">
</form>
           
        <table class="table caption-top">
  <caption>الكتب</caption>
  <thead>
    <tr>
    
      <th scope="col">رقم الكتاب</th>
      <th scope="col">تاريخ الكتاب</th>
      <th scope="col">الموضوع</th>
      <th scope="col">جهة الكتاب</th>


      <th scope="col"> </th>
    </tr>
  </thead>
  <tbody>
  @foreach ($booktype as $booktype)
  @foreach ($booktype->books as $item)
    <tr>
        <td>{{ $item->book_no }}</td>
        <td>{{ $item->book_date }}</td>
        <td>{{ $item->book_details }}</td>
        <td>{{ $item->book_to_from }}</td>

        <!--<td>{{ $item->cover }}</td>-->
        <td class="Cases" style="display: flex;">

        <div class="col-sm">
        <a href="{{ route('books.show', $item->id ) }}" class="btn btn-primary btn-sm">عرض</a>
</div>




     <div class="col-sm">

    <form action="{{route('book.destroy', $item->id) }}" method="post">
                  @csrf
        @method('DELETE')         
        
        <input type="hidden" class="form-control" name="unmberpage" value="{{ $booktype->id }}" >
        

          <button type="submit" class="btn btn-danger btn-sm">حذف</button>
             </form>
         </div>

                                <div class="col-sm">
                <a href="{{ route('books.edit', $item->id) }}" class="btn btn-primary btn-sm">تعديل</a>

</div>

        </td>
    </tr>
@endforeach
@endforeach

  </tbody>
</table>
  </body>
 
  @endsection


  







