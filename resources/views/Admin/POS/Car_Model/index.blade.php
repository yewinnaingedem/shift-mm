@extends('Admin.Layout.app')

@section('title' , 'Admin')

@section('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
@endsection 

@section('navbar') 
    @parent 
@endsection 

@section('page-name' , 'Car Models')

@section('content')
    <div class="container-fluid mt-3">
        <div class="mb-3">
            <a href="{{url('admin/car_models/create')}}" class=" btn btn-primary">
                <i class="fa-solid fa-plus">Add</i>
                <span>Add New</span>
            </a>
        </div>
        @if(session('message')) 
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Holy guacamole!</strong> {{ session('message')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif 
        
            
        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Brand </th>
                    <th>Car Model</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($car_models as $models)
                    <tr>
                        <td> {{ $models->brand_name}}</td>
                        <td> {{$models->model_name}}</td>
                        <td>{{ $models->created_at }}</td>
                        <td>
                            <button class="btn btn-danger delete" data-id="{{$models->id}}">Delete</button>
                            <a href="{{url('')}}" class="btn btn-primary">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Brand </th>
                    <th>Car Model</th>
                    <th>Creted At</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection 

@section('footer')
    @parent 
@endsection 

@section('script')
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(()=> {
            new DataTable('#example');
            $('.delete').click((e)=> 
                {
                    let deleteBtn = $(e.currentTarget);
                    let id = deleteBtn.data('id') ;
                    let row = deleteBtn.parent().parent();
                    $.ajax({
                        type : 'delete' ,
                        url : "/admin/car_models/" + id ,
                        data : {
                            "_token" : "{{csrf_token()}}"
                        },
                        success : (response) => 
                        {
                            swal({
                                title: "Are you sure?",
                                text: "You will not be able to recover this imaginary file!",
                                type: "warning",
                                showCancelButton: true,
                                confirmButtonColor: "#DD6B55",
                                confirmButtonText: "Yes, delete it!",
                                closeOnConfirm: false
                                },
                                function(){
                                    swal("Deleted!", response , "success");
                                    row.remove() ;
                            });
                        },
                        error : (error) => {
                            console.log(error);
                        }
                    });
                }
            );
        });
    </script>
@endsection 