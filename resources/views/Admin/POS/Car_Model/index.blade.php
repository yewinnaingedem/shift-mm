@extends('Admin.Layout.app')

@section('title' , 'Admin')

@section('style')

    <style>
        .list-style-none {
            list-style : none ;
        }
        .dropdown-toggle::after {
            display : none ;
        }
        .delete:hover  {
            background : tomato ;
        }
    </style>
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
                @foreach($car_models as $model)
                    <tr>
                        <td> {{ $model->brand_name}}</td>
                        <td >
                            <div data-id="{{$model->id}}" class="modelName">{{$model->model_name}}</div>
                        </td>
                        <td>{{ $model->created_at }}</td>
                        <td class="text-center">
                            <li class="nav-item  list-style-none">
                                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                                    <i class="fa-solid fa-list"></i>
                                </a>
                                <ul class="dropdown-menu ">
                                    <li>
                                        <a class="dropdown-item" href="#">View</a>
                                    </li>
                                    <li >
                                        <button class="dropdown-item delete" data-id="{{$model->id}}">Delete</button>
                                    </li>
                                </ul>
                            </li>
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
                            row.remove() ;
                    });
                }
            ));

            $(document).on('dblclick','.modelName',function (e) {
                var row = $(e.currentTarget) ;
                var getId = row.data('id');
                var id = 'editedId'+ getId ;
                var input = $(this).text();
                console.log(input);
                var textarea = (value , id ) => {
                    return `<textarea id="${id}"  rows="1">${value}</textarea>`;                  
                } ;
                row.html(`${textarea(input , id)}`);
                $('#'+id).focus();
                $('#'+id).blur(function () {
                    var $value = $(this).val();
                    if($value !== '') {
                        $.ajax({
                            type : "PUT" ,
                            url : "/admin/car_models/" + getId ,
                            data : {
                                '_token' : "{{csrf_token()}}" ,
                                'model_name' : $value
                            },
                            success : (response) => {
                                if(response.state_code == 304 ) {
                                  return "Sorry" ;
                                }
                                return  row.html($value);
                            },
                            error : (error) => {
                                console.log(error);
                            }
                        });
                    }else {
                        row.html('fuck');
                    }
                    
                });
                $('#' + id).keypress(function (e) {
                    if (e.which === 13) {
                        $(this).blur();
                    }
                });
            });
        });
    </script>
@endsection 