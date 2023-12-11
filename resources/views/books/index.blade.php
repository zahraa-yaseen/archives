
  @extends('layouts.app-master')

@section('content')
<body>
    
   

    <main class="container" >
    <div>
    @if( $message =Session::get('success'))
                    <div class="card-header">
                            <h5 class="card-title"> {{$message}}</h5>
                        </div>
                    @endif
</div>

        @yield('content')
        <div class="card-body">
            <a class="navbar-brand h1" href="{{ route('book_types.create') }}">اضافة تصنيف كتب</a>
           </div>
           
           <div class="card-body">
            <a class="navbar-brand h1" href="{{ route('home.index') }}">الرجوع</a>
           </div>
        <table class="table caption-top">
  <caption>اصناف الكتب</caption>
  <thead>
    <tr>
  

<th scope="col">اسم الملف </th>

<th scope="col">التسلسل</th>
<th scope="col">عدد الكتب</th>






    </tr>
  </thead>

  <tbody>
  @foreach ($booktype as $booktype)
 
    <tr>
        <td>{{ $booktype->name }}</td>
        <td>{{ $booktype->sequence }}</td>
       <td>
      
  
   {{count($booktype ->books)}}

</td>
        
        <td class="Cases" style="display: flex;">

  <div class="col-sm">
 <a href="{{ route('books.create' ,$booktype->id) }}" class="btn btn-primary btn-sm">اضافة كتاب</a>
</div>






 <div class="col-sm">
 <a href="{{ route('allbooks.show', $booktype->id ) }}" class="btn btn-primary btn-sm">عرض الكتب</a>
</div>


<div class="col-sm">
    <form action="{{route('booktype.destroy', $booktype->id) }}" method="post">
                  @csrf
        @method('DELETE')                         
          <button type="submit" class="btn btn-danger btn-sm">حذف</button>
             </form>
         </div>

         


        </td>
    </tr>
   
@endforeach




  </tbody>
</table>
  </body>
  @endsection


