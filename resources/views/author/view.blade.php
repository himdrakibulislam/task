@extends('layout.front')
@section('content')
    <div class="container">
        <h3>{{ $author->name }}</h3>

        <small>Written Books</small>
        @if (count($author->books) > 0)
            @foreach ($author->books as $row)
                <div class="card my-2">
                    <div class="card-header">
                        <h4>{{ $row->title }}</h4>
                    </div>
                </div>
            @endforeach
            @else 
            <h4>No Book Written</h4>
        @endif
    </div>
@endsection
