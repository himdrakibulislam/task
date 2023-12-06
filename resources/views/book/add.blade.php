@extends('layout.front')
@section('content')
    <div class="container my-4">
        <div class="d-flex justify-content-between">
            <h3>Add Book</h3>
            <div>
                <a href="/add-author" class="mx-1">Add Author</a>
                <a href="/add-publisher" class="mx-1">Add Publisher</a>
            </div>



        </div>

        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

        <form action="{{url('store-book')}}" method="post">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control" name="title" placeholder="Title" id="" required>
            </div>

            <div class="form-group my-2">
                <select name="publisher_id" class="form-control" id="" required>
                    <option value="">---- Select Publisher ----</option>
                    @foreach ($publishers as $row)
                      <option value="{{$row->id}}">{{$row->name}}</option>
                    @endforeach
                </select>
            </div>

            {{-- <div class="form-group my-2">
                <select name="publisher" class="form-control" id="" required>
                    <option value="">---- Select Author ----</option>
                    @foreach ($publishers as $row)
                      <option value="{{$row->id}}">{{$row->name}}</option>
                    @endforeach
                </select>
            </div> --}}
            <label for="author">Author</label>
            <select class="select2 form-control"  name="authors[]" multiple required>
                @foreach ($authors as $option)
                    <option value="{{ $option->id }}">{{ $option->name }}</option>
                @endforeach
            </select>

            
            <button type="submit" class="btn btn-success btn-sm my-2 w-25">Add Book</button>
        </form>
    </div>
@endsection

@push('extra-script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<script>
    $(document).ready(function () {
        $('.select2').select2();
    });
</script>


@endpush