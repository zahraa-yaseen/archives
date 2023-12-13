@extends('layouts.app-master')

@section('content')
<body style="direction: rtl;">
<main class="container" >
    <div>
    @if( $message =Session::get('success'))
                    <div class="card-header">
                            <h5 class="card-title"> {{$message}}</h5>
                        </div>
                    @endif
</div>


<div>
    @if( $message =Session::get('error'))
                    <div class="card-header">
                            <h5 class="card-title"> {{$message}}</h5>
                        </div>
                    @endif
</div>
<div class="card-body">
<h1>واجهه الاقسام </h1>
<button type="submit" class="btn btn-primary" > <a  style="color:#fff;"href="{{ route('departs.create') }}"> اضافة قسم</a></button>

           </div>
       
        <div class="card-body" >
         
          </div>

        
        <table class="table table table-bordered table-primary ">
        
        <thead>
        <caption>الاقسام</caption>
    <tr class="">
     
      <th scope="col">اسم القسم </th>
      <th scope="col">الشعب </th>
      <th scope="col">المستخدمين </th>
     
      <th scope="col">الاجرءات</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($departs as $depart)
  <tr>
  
       
        <td class="">
        <input type="text" class="form-control" id="name" name="name"
         value="{{ $depart->name }}" required    style="border: none;width: 150px; background-color: #cde5ed;" >
</td>

<td scope="row" >


<a href="{{ route('show.dividions' ,$depart->id) }}" class="btn btn-primary btn-sm" title="عدد الشعب داخل {{$depart->name}} " >   {{count($depart ->divisions)}}   </a>
    <a href="/create_divisions?id={{$depart->id}}" class="btn btn-primary btn-sm" title="اضافه شعبه داخل {{$depart->name}}"> + </a>
</td>


<td scope="row" >
 <a href="{{ route('show.user' ,$depart->id) }}" class="btn btn-primary btn-sm"> عرض مستخدمين </a>


<td>

<div class="col-sm">

<button  type="submit" class="btn btn-danger btn-sm" style="color: white ; margin-bottom: 10px; "><a style="color: white ; " href="{{ route('departs.edit', $depart->id) }}" >تعديل</a></button>


<form action="departs_destroy?id={{$depart->id}}" method="post">

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
</div>
</main>
<script src="{!! url('assets/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>
  




</body>
  @endsection
