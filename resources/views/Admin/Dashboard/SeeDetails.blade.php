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
        <div class="mb-3 row">
            <div class="col-md-6">
                <a href="{{url('admin/employees/create')}}" class=" btn btn-primary">
                    <i class="fa-solid fa-plus">Add</i>
                    <span>Add New</span>
                </a>
            </div>
            <div class="col-md-6 text-end">
                <a href="{{url('admin/machines/state')}}" class="btn btn-danger">
                    Back 
                </a>
            </div>
        </div>
        @if(session('message')) 
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Holy guacamole!</strong> {{ session('message')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif 
        
            
        <table id="example" class="display text-center bg-dark text-white rounded" style="width:100%">
            <thead>
                <tr class="text-center">
                    <th>Car Id</th>
                    <th>Description</th>
                    <th>Start Day</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($states as $states)
                    <tr>
                        <td class="text-center text-danger fw-bold"> {{ $states->license_plate}}</td>
                        <td class="text-capitalize text-center"> {{$states->description }}</td>
                        <td>{{$states->created_at}}</td>
                        <td>
                            <li class="nav-item  list-style-none">
                                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                                    <i class="fa-solid fa-list"></i>
                                </a>
                                <ul class="dropdown-menu ">
                                    <li>
                                    <a href="{{url('admin/employee/'. $states->id .'/edit')}}" class="dropdown-item">View</a>
                                    </li>
                                    <li >
                                        <button class="dropdown-item delete" data-id="{{$states->id}}">Delete</button>
                                    </li>
                                </ul>
                            </li>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Car Id</th>
                    <th>Description</th>
                    <th>Start Day</th>
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
            $(document).on('click','.delete' ,((e)=> 
                {
                    let deleteBtn = $(e.currentTarget);
                    let id = deleteBtn.data('id') ;
                    let row = deleteBtn.parent().parent();
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
                            swal("Deleted!", 'response' , "success");
                            $.ajax({
                                type : 'delete' ,
                                url : "/admin/employees/" + id ,
                                data : {
                                    "_token" : "{{csrf_token()}}"
                                },
                                success : (response) => 
                                {
                                    row.remove();
                                },
                                error : (error) => {
                                    console.log(error);
                                }
                            });
                            row.remove() ;
                    });
                }
            ));
        });
    </script>
@endsection 