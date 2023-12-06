@extends('layout.front')
@section('content')
   <div class="container">
    <h3>Writers / Authors</h3>
    @foreach ($authors as $row)
        <div class="card my-2">
            <div class="card-header">
                <a href="{{url('writer/'.$row->id)}}"><h5>{{$row->name}}</h5></a>
                <small>Written {{count($row->books)}} books</small>
            </div>
        </div>
    @endforeach
   </div>
@endsection
