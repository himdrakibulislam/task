@extends('layout.front')
@section('content')
    <style>
        .pagination {
            display: inline-block;
        }

        .pagination a {
            color: black;
            float: left;
            padding: 8px 16px;
            text-decoration: none;
        }
    </style>
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

        <div class="pagination">
            <a href="{{ $currentPage < 1 ? '#' : '?page=' . $currentPage - 1 }}">&laquo;</a>
            @for ($i = 1; $i <= $totalPage; $i++)
                <a
                    href="{{ '?page=' . $i }}"class="{{ $currentPage == $i ? 'text-white bg-info' : '' }}">{{ $i }}</a>
            @endfor
            <a href="{{ $currentPage != $totalPage ? '?page=' . $currentPage + 1 : '#' }} ">&raquo;</a>
        </div>
    </div>
@endsection
@push('extra-script')
    <script></script>
@endpush
