@extends('Admin.Layout.app')

@section('title' , 'Admin')

@section('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <style>
        .p-10 {
            padding : 5px 10px ;
        }
    </style>
@endsection 

@section('navbar') 
    @parent 
@endsection 

@section('page-name' , 'Car Models')

@section('content')
    <div class="container-fluid mt-3">
        <div class="mb-3  rounded">
            <h2 class='text-center text-capitalize' >This Tabel is currently Sale Tabel</h2>
        </div>
        <hr>
        <table id="example" class="display text-center" style="width:100%">
            <thead>
                <tr>
                    <th>Model</th>
                    <th>License </th>
                    <th>State</th>
                    <th>Grade</th>
                    <th>Price</th>
                    <th>Sale</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sales as $sale)
                    <tr>
                        <td> {{ $sale->model_name}}</td>
                        <td> {{ $sale->license_plate}}</td>
                        <td>{{$sale->license_state}}</td>
                        <td class="d-flex jsutify-content-center align-items-center">
                            @php 
                                $active = 'bg-primary' ;
                                $default = 'bg-danger';
                            @endphp 
                            <div
                                class="rounded text-center p-10 text-white fw-bold {{$sale->grade == '0' ? $active : $default }}"
                            >
                                {{$sale->grade == '0' ? 'none' : $sale->grade }}
                            </div>
                        </td>
                        <td>
                            {{$sale->price}}
                        </td>
                        <td class='text-center'>
                            <a href="{{url('admin/sold_out/'.$sale->main_id)}}" class="btn btn-primary">Sold Out</a>
                        </td>
                        <td class='text-center'>
                            <button class="btn btn-danger delete" data-id="{{$sale->id}}">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Model</th>
                    <th>License </th>
                    <th>State</th>
                    <th>Grade</th>
                    <th>Price</th>
                    <th>Sale</th>
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
                        text: "This item will automotivcally move to sell table",
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
                                url : "/admin/car_sells/"+ id,
                                data : {
                                    "_token" : "{{csrf_token()}}"
                                },
                                success : (response) => 
                                {
                                    console.log(response);
                                    row.remove();
                                },
                                error : (error) => {
                                    console.log(error);
                                }
                            });
                    });
                }
            ));
            
        });
    </script>
@endsection 