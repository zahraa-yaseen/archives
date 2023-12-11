@extends('layouts.app-master')

@section('content')
<body>
    <main class="container">
        <div class="card-body">
            <button type="button" class="btn btn-primary">
                <a style="color:#fff;" class="navbar-brand" href="{{ route('departs.index') }}">الرجوع</a>
            </button>
        </div>

        <h5>تعديل اسم القسم</h5>

        <form action="{{ route('depart.update', $depart->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                
                <input type="text" class="form-control" id="name" name="name" value="{{ $depart->name }}" required>
            </div>

            <div class="col-auto">
                <div> <button type="submit" class="btn btn-primary">تعديل</button></div>
            </div>
        </form>

    </main>
</body>
@endsection
