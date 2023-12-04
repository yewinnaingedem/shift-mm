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
            <a href="{{url('admin/license-state/create')}}" class=" btn btn-primary">
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
                    <th>State</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($licenseStates as $state)
                    <tr>
                        <td class="editTd" data-id="{{$state->id}}"> {{$state->state}}</td>
                        <td>{{ $state->created_at }}</td>
                        <td>{{$state->updated_at}}</td>
                        <td>
                            <button class="btn btn-danger delete" data-id="{{$state->id}}">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>State</th>
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
                                url : "/admin/license-state/" + id ,
                                data : {
                                    "_token" : "{{csrf_token()}}"
                                },
                                success : (response) => 
                                {
                                    swal("Deleted!", response , "success");
                                    row.remove() ;
                                },
                                error : (error) => {
                                    alert(error);
                                    console.log(error);
                                }
                            });
                            row.remove() ;
                    });
                }
            ));

            $(document).on('dblclick','.editTd',function (e) {
                var row = $(e.currentTarget) ;
                var getId = row.data('id');
                var id = 'editedId'+ getId ;
                var input = $(this).text();
                console.log(input);
                var textarea = (value , id ) => {
                    return `<textarea id="${id}"  rows="2">${value}</textarea>`;                  
                } ;
                row.html(`${textarea(input , id)}`);
                $('#'+id).focus();
                $('#'+id).blur(function () {
                    var $value = $(this).val();
                    if($value !== '') {
                        $.ajax({
                            type : "PUT" ,
                            url : "/admin/license-state/" + getId ,
                            data : {
                                '_token' : "{{csrf_token()}}" ,
                                'state' : $value
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