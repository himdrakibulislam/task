@extends('layout.front')
@section('content')
    <div class="container my-4">
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="staticBackdropLabel">Add Publisher</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="{{url('store-publisher')}}" method="post">
                @csrf

                <input type="text"
                class="form-control my-4"
                name="name" id="" placeholder="Name" required>

                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success btn-sm">Add Publisher</button>
                </form>
                </div>
               
              </div>
            </div>
          </div>
        <div class="d-flex justify-content-between">
            <h3>Publishers</h3>
            <div>
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Add Piblisher
                  </button>
               
            </div>

        </div>

        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Action</th>
                
              </tr>
            </thead>
            <tbody>
              @foreach ($publishers as $key => $row)
              <tr>
                <th scope="row">{{$key +1 }}</th>
                <td>{{$row->name}}</td>
                <td>
                    <form action="{{url('delete-publisher/'.$row->id)}}" method="post">
                       @csrf
                       @method('delete')
                        <button  type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
               
              </tr>
              @endforeach
             
            </tbody>
          </table>

        
    </div>
@endsection
