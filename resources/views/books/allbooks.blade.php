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


<button type="submit" class="btn btn-primary" > <a  style="color:#fff;"href="{{ route('book_types.index') }}"> رجوع </a></button>

        <div class="card-body" style="direction: rtl">
        @foreach ($booktype as $booktype)
  @foreach ($booktype->books as $item)



        <h1>   كتب قسم  ({{$booktype->name}})</h1>

  <br>
           
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
  
    <tr>
        <td>{{ $item->book_no }}</td>
        <td>{{ $item->book_date }}</td>
        <td>{{ $item->book_details }}</td>
        <td>{{ $item->book_to_from }}</td>

        <!--<td>{{ $item->cover }}</td>-->
        <td class="Cases" style="display: flex;">

        <div class="col-sm">
        <a href="{{ route('books.show', $item->id ) }}"  class="btn btn-primary"   
        
        style="border: none; 
    padding: 0px 11px;
    color: black;
    font-size: 20px;
    
   box-shadow: none;">عرض</a>
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
                <a href="{{ route('books.edit', $item->id) }}" class="btn btn-primary btn-sm"
                
                style="border: none;
    padding: 0px 11px;
    color: black;
    font-size: 20px;
    
     box-shadow: none;"
                
                
                
                >تعديل</a>

</div>

        </td>
    </tr>
@endforeach
@endforeach

  </tbody>
</table>
  </body>
 
  @endsection


  







