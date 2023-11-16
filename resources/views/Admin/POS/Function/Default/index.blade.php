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
        #editTd {
            position :relative ;
        }
        .alert-info {
            position: absolute;
            top : 10px ;
            right : 10px ;
            border : 1px solid black ;
            border-radius : 4px ;
            background : #055160 ;
            color : white ;
            font-weight : bold ;
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
                        <td class="editTd" style="position :relative ;" data-id="{{$defaultFunction->id}}"> {{$defaultFunction->function_name}}
                            
                        </td>
                        <td>{{ $defaultFunction->created_at }}
                            
                        </td>
                        <td>{{$defaultFunction->updated_at}}</td>
                        <td>
                            <button class="btn btn-danger delete" data-id="{{$defaultFunction->id}}">Delete</button>
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
                                url : "/admin/default-function/" + id ,
                                data : {
                                    "_token" : "{{csrf_token()}}"
                                },
                                success : (response) => 
                                {
                                    swal("Deleted!", response , "success");
                                    row.remove() ;
                                },
                                error : (error) => {
                                    console.log(error);
                                }
                            });
                    });
                }
            ));

            // Use event delegation to handle dynamically added elements with the class '.editTd'
            $(document).on('dblclick', '.editTd', function (e) {
                var textOri = $(this).text();
                var mainText = $(e.currentTarget);
                var id = mainText.data('id');
                var textareaId = 'editField_' + id ;
                var alertInfo = $('.alert-info');
                alertInfo.html('');
                mainText.html('<textarea id="' + textareaId + '" rows="1">' + textOri + '</textarea>');
                $('#' + textareaId).focus();
                $('#' + textareaId).blur(function () {
                    var newTest = $(this).val();
                    if(newTest !== '') {
                        $.ajax({
                            type: "PUT",
                            url: '/admin/default-function/' + id,
                            data: {
                                '_token': "{{csrf_token()}}",
                                "function": newTest,
                            },
                            success: function (response) {
                                var infoAlert = `<div class="alert-info"> ${response.message} </div>`;
                                mainText.html(`${newTest} ${infoAlert}`  );
                                setTimeout(function () {
                                    mainText.find('.alert-info').fadeOut('slow', function () {
                                        $(this).remove();
                                    });
                                }, 3000);
                            },
                            error: function (error) {
                                alert(error.message);
                            }
                        });
                    }else {
                        mainText.html(`${textOri}`  );
                    }
                });

                $('#' + textareaId).keypress(function (e) {
                    if (e.which === 13) {
                        $(this).blur();
                    }
                });
            });

            // Example of dynamically adding an element with the class '.editTd'
            // This could be done inside an AJAX success callback or some other dynamic addition scenario
            var dynamicElement = $('<div class="editTd" data-id="1">Initial Text</div>');
            $('body').append(dynamicElement);

        });
    </script>
@endsection 