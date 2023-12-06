@extends('layout.front')
@section('content')
    
    <div class="container my-4">
        <h3>Books</h3>
        <hr>
        @if (count($books) > 0)
            @foreach ($books as $row)
                <div class="card my-2">
                    <div class="card-header">
                        <h4>{{ $row->title }}</h4>
                    </div>
                    <div class="card-body">
                        <p> <b>Author : {{ $row->author_names }}</b>
                        </p>
                        <p><b>Publisher :</b> {{ $row->publisher_name }}</p>
                    </div>
                </div>
            @endforeach
        @else
            <h3 class="text-center"> <b>No Books Found</b></h3>
        @endif
       
    </div>
@endsection
@push('extra-script')
    <script></script>
@endpush
