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
        <div class="mb-3 bg-primary rounded">
            <div class="text-center text-info h-4">This table is currently sale table</div>
        </div>
        <table id="example" class="display text-center" style="width:100%">
            <thead>
                <tr>
                    <th>Model</th>
                    <th>License </th>
                    <th>State</th>
                    <th>Grade</th>
                    <th>Sale</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sales as $sale)
                    <tr>
                        <td> {{ $sale->model_name}}</td>
                        <td> {{ $sale->license_plate}}</td>
                        <td>{{$sale->license_state}}</td>
                        <td>
                            @php 
                                $active = 'bg-primary' ;
                                $default = 'bg-danger';
                            @endphp 
                            <div
                                class="rounded text-center text-white fw-bold {{$sale->grade == '0' ? $active : $default }}"
                            >
                                {{$sale->grade == '0' ? 'none' : $sale->grade }}
                            </div>
                        </td>
                        <td>
                            <button class="btn btn-info selling" data-id="{{$sale->id}}">Sold Out</button>
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
                    <th>Sale</th>
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
            $(document).on('click','.selling' ,((e)=> 
                {
                    let deleteBtn = $(e.currentTarget);
                    let id = deleteBtn.data('id') ;
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
                                type : 'post' ,
                                url : "/admin/car_sells" ,
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
                    });
                }
            ));
        });
    </script>
@endsection 