@extends('Admin.Layout.app')

@section('title' , 'Admin')

@section('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <style>
        .w-15 {
            width  : 15px ;
        }
        .h-15 {
            height : 15px ;
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
            <a href="{{url('admin/grade/create')}}" class=" btn btn-primary">
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
                    <th>Model Name </th>
                    <th>Grade</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($grades as $grade)
                    <tr>
                        <td class="fw-bold brand-header"> <span class="text-danger"> {{$grade->brand_name}} </span>{{ $grade->model_name}}</td>
                        <td class="gradeModal"> 
                            <button type="button" class="btn btn-danger fw-bold " data-id="{{$grade->gradeId}}" data-class="{{$grade->mainId}}" >
                                    {{$grade->grade == 0 ? 'None' : $grade->grade }}
                            </button>
                        </td>
                        <td>{{ $grade->created_at }}</td>
                        <td>
                            <li class="nav-item  list-style-none">
                                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                                    <i class="fa-solid fa-list"></i>
                                </a>
                                <ul class="dropdown-menu ">
                                    <li>
                                        <a href="{{url('admin/grade/'. $grade->id .'/edit')}}" class="dropdown-item">View</a>
                                    </li>
                                    <li >
                                        <button class="dropdown-item delete" data-id="{{$grade->gradeId}}" >Delete</button>
                                    </li>
                                </ul>
                            </li>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Model Name </th>
                    <th>Grade</th>
                    <th>Creted At</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- Grade Modal Goes here -->
    <div class="modal fade" id="gradeModaltest" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">New message</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Recipient: <span id="supportText" class="fw-bold text-danger"></span></label>
                            <input type="text" class="form-control" id="recipient-name" name="grade" placeholder="Enter Grade">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="text-danger fw-bold" id="footer">
                        </div>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary submit">
                            <span>Send message</span> 
                            <div class="spinner-border text-white w-15 h-15 d-none" id="spinner" role="status">
                            </div>
                        </button>
                    </div>
                </div>
        </div>
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
                                url : "/admin/grade/" + id ,
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
            $(document).on('click','.gradeModal' , (e) => {
                $('#gradeModaltest').modal('show');
                let currentTarget = $(e.currentTarget);
                let getRow = currentTarget.parent();
                let id = currentTarget.find('.btn').data('id');
                let model_id = currentTarget.find('.btn').data('class');
                let parentText = getRow.find('.brand-header').text().trim();
                let mainText = currentTarget.find('.btn');
                let textIndex = mainText.text().trim()
                $('input[name="grade"]').val(textIndex);
                $('#supportText').text(parentText);
                $('.submit').click( function () {
                    $('#spinner').removeClass('d-none');
                    let value = $('input[name="grade"]').val();
                    $.ajax({
                        url : "/admin/grade/" + id ,
                        method : 'put' , 
                        data : {
                            "_token" : "{{csrf_token()}}" ,
                            brand : value ,
                            model_id : model_id ,
                        },
                        success : (response) => {
                            $('#spinner').addClass('d-none');
                            $('#footer').text(response.message);
                            mainText.text(value);
                            setTimeout(() => {
                                $('#gradeModaltest').modal('hide');     
                            }, 2000);
                        },
                        error : (error) => {
                            console.log(error);
                        }
                    }) 
                });
                
            });
            
        });
    </script>
@endsection 