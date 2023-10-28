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
            <a href="{{url('admin/engine/create')}}" class=" btn btn-primary">
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
                    <th>ID </th>
                    <th>Engine Power </th>
                    <th>Fuel</th>
                    <th>Type</th>
                    <th>Turbo </th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($engines as $engine)
                    <tr>
                        <td> {{ $engine->id}}</td>
                        <td> {{ $engine->Engine_power . " CC"}}</td>
                        <td> {{ $engine->cylinder}}</td>
                        <td>{{$engine->type}}</td>
                        <td > 
                             @php 
                                $isTrue = $engine->Turbo ;
                             @endphp 
                            <div class="text-center rounded {{$isTrue ? 'bg-primary' : 'bg-danger '}}">
                                {{ $isTrue ? "Turbo" : "None" }}
                            </div>
                        </td>
                        
                        <td>{{ $engine->created_at }}</td>
                        <td>{{$engine->updated_at}}</td>
                        <td>
                            <button class="btn btn-danger delete" data-id="{{$engine->id}}">Delete</button>
                            <a href="{{url('admin/engine/'. $engine->id .'/edit')}}" class="btn btn-primary">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>ID </th>
                    <th>Engine Power </th>
                    <th>Fuel</th>
                    <th>Type </th>
                    <th>Turbo </th>
                    <th>Created At</th>
                    <th>Updated At</th>
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
                            
                            $.ajax({
                                type : 'delete' ,
                                url : "/admin/engine/" + id ,
                                data : {
                                    "_token" : "{{csrf_token()}}"
                                },
                                success : (response) => 
                                {
                                    swal("Deleted!", response , "success");
                                    row.remove();
                                },
                                error : (error) => {
                                    swal("Cancelled", "You cann't delete this row cause It is being used in somewhere:)", "error");
                                }
                            });
                            row.remove() ;
                    });
                }
            ));
        });
    </script>
@endsection 