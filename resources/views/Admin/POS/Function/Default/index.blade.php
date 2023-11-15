@extends('Admin.Layout.app')

@section('title' , 'Admin')

@section('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <style> 
        #editField {
            appearance : none ;
            border : none ;
            background : transparent ;
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
            <a href="{{url('admin/default-function/create')}}" class=" btn btn-primary">
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
                    <th>Function Name</th>
                    <th>Created At</th>
                    <th>Updated AT</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($defaultFunctions as $defaultFunction)
                    <tr>
                        <td id="editTd" data-id="{{$defaultFunction->id}}"> {{$defaultFunction->function_name}}</td>
                        <td>{{ $defaultFunction->created_at }}</td>
                        <td>{{$defaultFunction->updated_at}}</td>
                        <td>
                            <button class="btn btn-danger delete" data-id="{{$defaultFunction->id}}">Delete</button>
                            <a href="{{url('')}}" class="btn btn-primary">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Function</th>
                    <th>Creted At</th>
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
            
            // $(document).on('click','.delete' ,((e)=> 
            //     {
            //         let deleteBtn = $(e.currentTarget);
            //         let id = deleteBtn.data('id') ;
            //         let row = deleteBtn.parent().parent();
            //         swal({
            //             title: "Are you sure?",
            //             text: "You will not be able to recover this imaginary file!",
            //             type: "warning",
            //             showCancelButton: true,
            //             confirmButtonColor: "#DD6B55",
            //             confirmButtonText: "Yes, delete it!",
            //             closeOnConfirm: false
            //             },
            //             function(){
                            
            //                 $.ajax({
            //                     type : 'delete' ,
            //                     url : "/admin/default-function/" + id ,
            //                     data : {
            //                         "_token" : "{{csrf_token()}}"
            //                     },
            //                     success : (response) => 
            //                     {
            //                         swal("Deleted!", response , "success");
            //                         row.remove() ;
            //                     },
            //                     error : (error) => {
            //                         alert(error);
            //                         console.log(error);
            //                     }
            //                 });
            //                 row.remove() ;
            //         });
            //     }
            // ));

            $('#editTd').dblclick(function (e) {
                var textOri = $(this).text();
                var mainText = $(e.currentTarget);
                var id = mainText.data('id');
                $(this).html('<input type="text"  value="' + textOri + '" id="editField">');
                $('#editField').focus();
                $('#editField').blur(function (e) {
                    var newTest = $(this).val() ;
                    $.ajax({
                        type : "PUT" ,
                        url : '/admin/default-function/' + id ,
                        data : {
                            '_token' : "{{csrf_token()}}",
                            "function" : newTest ,
                        },
                        success : (response ) => {
                            console.log(response);
                            $(this).parent().text(newTest);
                        },
                        error : (error) => {
                            console.log(error);
                        }
                    });
                });
                $('#editField').keypress(function (e) {
                    if (e.which === 13) {
                        $(this).blur();
                    }
                });
            });
        });
    </script>
@endsection 