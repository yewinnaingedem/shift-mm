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
        .main-color  {
            color : #06CBA3 ;
        }
    </style>
@endsection 

@section('navbar') 
    @parent 
@endsection 

@section('page-name' , 'Car Models')

@section('content')
    <div class="container-fluid mt-3 pt-3">
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
                    <th>Air Conditioning</th>
                    <th>Power_steering</th>
                    <th>Power_windows</th>
                    <th>Abs_brakes</th>
                    <th>Airbags</th>
                    <th>Navigation_system</th>
                    <th>Bluetooth_connectivity</th>
                    <th>Created At</th>
                    <th>Updated AT</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($defaultFunctions as $defaultFunction)
                    <tr>
                        <td class="editTd" style="position :relative ;" data-id="{{$defaultFunction->id}}">
                             {{$defaultFunction->function_name}}
                        </td>
                        @php
                            $ac = $defaultFunction->air_conditioning == 0 ? FALSE  : TRUE  ;
                        @endphp
                        <td class="fw-bold text-center">
                            @if($ac) 
                                <i class="fa-solid fa-circle-check main-color"></i>
                            @else 
                                <i class="fa-solid fa-xmark text-danger"></i>
                            @endif 
                        </td>
                        @php
                            $pc = $defaultFunction->power_steering == 0 ? FALSE : TRUE ;
                        @endphp 
                        <td class="fw-bold text-center">
                            @if($pc) 
                                <i class="fa-solid fa-circle-check main-color"></i>
                            @else 
                                <i class="fa-solid fa-xmark text-danger"></i>
                            @endif 
                        </td>
                        @php
                            $pw = $defaultFunction->power_windows == 0 ? FALSE : TRUE ;
                        @endphp 
                        <td class="fw-bold text-center">
                            @if($pw) 
                                <i class="fa-solid fa-circle-check main-color"></i>
                            @else 
                                <i class="fa-solid fa-xmark text-danger"></i>
                            @endif 
                        </td>
                        @php
                            $pw = $defaultFunction->abs_brakes == 0 ? FALSE : TRUE ;
                        @endphp 
                        <td class="fw-bold text-center">
                            @if($pw) 
                                <i class="fa-solid fa-circle-check main-color"></i>
                            @else 
                                <i class="fa-solid fa-xmark text-danger"></i>
                            @endif 
                        </td>
                        @php
                            $pw = $defaultFunction->airbags == 0 ? FALSE : TRUE ;
                        @endphp 
                        <td class="fw-bold text-center">
                            @if($pw) 
                                <i class="fa-solid fa-circle-check main-color"></i>
                            @else 
                                <i class="fa-solid fa-xmark text-danger"></i>
                            @endif 
                        </td>
                        @php
                            $pw = $defaultFunction->navigation_system == 0 ? FALSE : TRUE ;
                        @endphp 
                        <td class="fw-bold text-center">
                            @if($pw) 
                                <i class="fa-solid fa-circle-check main-color"></i>
                            @else 
                                <i class="fa-solid fa-xmark text-danger"></i>
                            @endif 
                        </td>
                        @php
                            $pw = $defaultFunction->bluetooth_connectivity == 0 ? FALSE : TRUE ;
                        @endphp 
                        <td class="fw-bold text-center">
                            @if($pw) 
                                <i class="fa-solid fa-circle-check main-color"></i>
                            @else 
                                <i class="fa-solid fa-xmark text-danger"></i>
                            @endif 
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
                    <th>Function Name</th>
                    <th>Air Conditioning</th>
                    <th>Power_steering</th>
                    <th>Power_windows</th>
                    <th>Abs_brakes</th>
                    <th>Airbags</th>
                    <th>Navigation_system</th>
                    <th>Bluetooth_connectivity</th>
                    <th>Created At</th>
                    <th>Updated AT</th>
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
            // $(document).on('dblclick', '.editTd', function (e) {
            //     var textOri = $(this).text();
            //     var mainText = $(e.currentTarget);
            //     var id = mainText.data('id');
            //     var textareaId = 'editField_' + id ;
            //     var alertInfo = $('.alert-info');
            //     alertInfo.html('');
            //     mainText.html('<textarea id="' + textareaId + '" rows="1">' + textOri + '</textarea>');
            //     $('#' + textareaId).focus();
            //     $('#' + textareaId).blur(function () {
            //         var newTest = $(this).val();
            //         if(newTest !== '') {
            //             $.ajax({
            //                 type: "PUT",
            //                 url: '/admin/default-function/' + id,
            //                 data: {
            //                     '_token': "{{csrf_token()}}",
            //                     "function": newTest,
            //                 },
            //                 success: function (response) {
            //                     var infoAlert = `<div class="alert-info"> ${response.message} </div>`;
            //                     mainText.html(`${newTest} ${infoAlert}`  );
            //                     setTimeout(function () {
            //                         mainText.find('.alert-info').fadeOut('slow', function () {
            //                             $(this).remove();
            //                         });
            //                     }, 3000);
            //                 },
            //                 error: function (error) {
            //                     alert(error.message);
            //                 }
            //             });
            //         }else {
            //             mainText.html(`${textOri}`  );
            //         }
            //     });

                // $('#' + textareaId).keypress(function (e) {
                //     if (e.which === 13) {
                //         $(this).blur();
                //     }
                // });
            // });

            // Example of dynamically adding an element with the class '.editTd'
            // This could be done inside an AJAX success callback or some other dynamic addition scenario
            var dynamicElement = $('<div class="editTd" data-id="1">Initial Text</div>');
            $('body').append(dynamicElement);

        });
    </script>
@endsection 