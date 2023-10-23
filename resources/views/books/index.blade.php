@extends('layouts.app-master')

@section('content')
<body>
    
   

    <main class="container" >
        @yield('content')
        <div class="card-body">
            <a class="navbar-brand h1" href="{{ route('home.index') }}">الرجوع</a>
           </div>
        <table class="table caption-top">
  <caption>الكتب</caption>
  <thead>
    <tr>
      <th scope="col"># </th>

      <th scope="col">رقم الكتاب</th>
      <th scope="col">تاريخ الكتاب</th>
      <th scope="col">الموضوع</th>
      <th scope="col">الحالات</th>



    </tr>
  </thead>

  <tbody>
  @foreach ($book as $item)
    <tr>
        <th scope="row">{{ $item->id }}</th>
        <td>{{ $item->book_no }}</td>
        <td>{{ $item->book_date }}</td>
        <td>{{ $item->book_details }}</td>
        <!--<td>{{ $item->cover }}</td>-->
        <td class="Cases" style="display: flex;">

        <div class="col-sm">
        <a href="{{ route('books.show', $item->id) }}" class="btn btn-primary btn-sm">عرض</a>
</div>


<div class="col-sm">
                                    <form action="{{route('books.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        
                                        <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                                    </form>
                                </div>

                                <div class="col-sm">
                                <a href="{{ route('books.edit', $item->id) }}" class="btn btn-primary btn-sm">تعديل</a>

</div>

        </td>
    </tr>
@endforeach
  </tbody>
</table>
  </body>
  @endsection