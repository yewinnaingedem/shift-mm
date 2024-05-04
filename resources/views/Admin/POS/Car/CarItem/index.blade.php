@extends('Admin.Layout.app')

@section('title' , 'Admin')

@section('style')
    <style>
        .btn-sell {
            background-color : #f6f6f6 ;
            padding : 5px ;
            outline : none ;
            border : 1px solid whitesmoke ;
            border-radius : 5px ;
            box-shadow : 0px 2px 5px black ;
            text-transform : capitalize  ;
        }
    </style>
@endsection 

@section('navbar') 
    @parent 
@endsection 

@section('page-name' , 'Car Item')

@section('content')
<div class="container mt-3">
    @if(session('message')) 
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Holy guacamole!</strong> {{ session('message')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif 
    <table id="carItem" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Brand Name</th>
                <th>Licens Plate</th>
                <th>Grade </th>
                <th>VIN</th>
                <th>Created At</th>
                <th>Sale</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($carItems as $carItem)
                <tr class="font-monospace">
                    <td id="model_name">{{$carItem->model_name}}</td>
                    <td id="licensePlate">{{$carItem->license_plate}}</td>
                    <td>
                        @php 
                            $active = 'bg-info' ;
                            $default = 'bg-primary';
                        @endphp
                        <div
                        
                            class="text-muted" 
                        >
                            {{$carItem->grade === '0' ? 'none': $carItem->grade . " Grade"  }}
                        </div>
                    </td>
                    <td class="fst-italic fw-bolder">{{$carItem->vin}}</td>
                    <td>{{$carItem->created_at}}</td>
                    <td>
                    @php
                        $found = false; 
                    @endphp

                    @foreach($saledItems as $saledItem)
                        @if($carItem->main_id === $saledItem->car_id)
                            <button class="btn-sell cursor-not-allowed">
                                selling
                            </button>
                            @php
                                $found = true; 
                                break; 
                            @endphp
                        @endif
                    @endforeach

                    @if (!$found)
                        <button class="btn-sell" id="modalId" data-id="{{$carItem->mainId}}" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            sell
                        </button>
                    @endif
                    </td>
                    <td>
                        <li class="nav-item  list-style-none">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                                <i class="fa-solid fa-list"></i>
                            </a>
                            <ul class="dropdown-menu ">
                                <li>
                                    <a href="{{url('admin/before_sale/'.$carItem->mainId.'/edit')}}" class="dropdown-item">View</a>
                                </li>
                                <li >
                                    <button class="dropdown-item delete" data-id="{{$carItem->car_item}}">Delete</button>
                                </li>
                            </ul>
                        </li>
                    </td>
                </tr>
            @endforeach
            </tbody>
        <tfoot>
            <tr>
                <th>Brand Name</th>
                <th>Licens Plate</th>
                <th>Grade </th>
                <th>VIN</th>
                <th>Created At</th>
                <th>Sale</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>
</div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form action="{{url('admin/car_sells')}}" method="post">
            @csrf 
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Mingalar Car Sale Center </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="sumbit" class="btn btn-primary" id="disabledId" disabled >Save changes</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection 

@section('footer')
    @parent 
@endsection 

@section('script')
    <script>
        $(document).ready(()=> {
            new DataTable('#carItem');
            $(document).on('click','#modalId',(e)=> {
                var $modalId = $(e.currentTarget);
                var $data = $modalId.data('id');
                var $modelName = $modalId.parent().parent().find("#model_name").html();
                var $licensePlate = $modalId.parent().parent().find("#licensePlate").html();
                let $modelContent = `
                        <input type="hidden" name="id" value="${$data}">
                        <div class="mb-3">
                            <label for="price" class="form-label">Price For <span class="text-danger fw-bold">${$modelName}</span ><span class="fw-bold">(${$licensePlate})</span></label>
                            <input type="text" name="price" id="price" placeholder="Enter Price" class="form-control">
                        </div>
                `;
                $('.modal-body').html($modelContent);
            });
            let priceList = $('input[name="price"]');
            $(document).on('keyup', priceList , (e) => {
                let price = $('input[name="price"]');
                let inputValue = price.val().replace(/,/g, '') ;// getting the some error 
                let value = Number(inputValue).toLocaleString();
                price.val(value);
                if(value.length >= 9 && value.length <= 11) {
                    $("#disabledId").prop('disabled' , false);
                }else {
                    $("#disabledId").prop('disabled' , true);
                }
            });
            $(document).on("click" , '.delete' , function (e) {
                let deleteBtn = $(e.currentTarget);
                let id = deleteBtn.data('id');
                let row = deleteBtn.parent().parent() ;
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
                            url : "/admin/before_sale/" + id ,
                            method : "DELETE" ,
                            data : {
                                "_token" : "{{csrf_token()}}"
                            },
                            success : (response) => {
                                swal("Deleted!", response , "success");
                            },
                            error : (error) => {
                                swal("Cancelled", "Error Occuring Happing " , "error");
                            }
                        }); 
                    
                    });
            });
            
        });
    </script>
@endsection 