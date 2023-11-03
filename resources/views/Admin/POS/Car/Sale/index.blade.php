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
        <div class="mb-3 bg-primary rounded">
            <div class="text-center text-info p-10 h-4">This table is currently sale table</div>
        </div>
        <table id="example" class="display text-center" style="width:100%">
            <thead>
                <tr>
                    <th>Model</th>
                    <th>License </th>
                    <th>State</th>
                    <th>Grade</th>
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
                        <td class='text-center'>
                            <button type="button" class="btn btn-primary" data-id="{{$sale->id}}"   data-bs-toggle="modal" data-bs-target="#sold_out">
                                Sold Out 
                            </button>
                        </td>
                        <td class='text-center'>
                            <button class="btn btn-danger" data-id="{{$sale->id}}">Delete</button>
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
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>

    
    <div class="modal fade" id="sold_out" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form action="{{url('admin/sold_out')}}" method="post">
                @csrf 
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Mingalar Car Sale Center</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="buyer" class="form-label">Buyer</label>
                                <input type="text" class="form-control" name="buyer" placeholder="Enter Buyer Name">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="origin_price">Origin Price</label>
                                <input type="number" class="form-control" name="price_of_ori" placeholder="Enter Origin Price">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="origin_price">Saled Price</label>
                                <input type="number" class="form-control" name="purchase_price" placeholder="Enter Saled Price">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="origin_price">HP PLan</label>
                                <input type="text" class="form-control" name="hp_plane" placeholder="Enter Installment Plan">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="origin_price">Brokder Name</label>
                                <input type="text" class="form-control" name="broker_name" placeholder="Enter Broker Name">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="origin_price" class="form-label">Broker Fee</label>
                                <input type="number" class="form-control" name="broker_fee" placeholder="Enter Broker Name">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="origin_price" class="form-label">Length Of Loan</label>
                                <input type="number" class="form-control" placeholder="Enter Broker Name">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="origin_price" class="form-label">Origin Price</label>
                                <input type="number" class="form-control" placeholder="Enter Origin Price">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="sumbit" class="btn btn-primary">Save & Change </button>
                    </div>
                </div>
            </form>
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