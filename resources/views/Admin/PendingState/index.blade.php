@extends('Admin.Layout.app')

@section('title' , 'Admin')

@section('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <style>
        .h-30 {
            height: 60px;
            background : #E9E1E1 ;
            shadow : 0px 5px 5px 0 black ;
        }
        .p-10 {
            padding : 0px 20px ;
        }
        .position {
            position: relative;
            overflow : hidden ;
        }
        .position:hover .testing {
            width : 12% ;
            display : block ;
        }
        .testing {
            position : absolute ;
            top : 0 ;
            display : none ;
            right : -10px ;
            height: 100%;
            width : 0% ;
            opacity : 0.8 ;
            color : black ;
            font-weight : 700 ;
            text-decoration : none ;
            background : #F5F1F1 ;
        }
        .ml-20 {
            padding-left : 20px ;
        }
        .p-52 {
            padding : 5px 10px ;
        }
        .p_loading {
            position : relative ;
        }
        .p_loading:before {
            position : absolute ;
            content  : " " ;
            top : 0 ;
            right : 0 ;
            width : 100% ;
            height : 100% ;
            background  : #E9E1E1 ;
            animation: fadeIn 1s ease-in-out infinite;
        }
        @keyframes fadeIn {
            0% {
                width : 100% ;
            }
            50% {
                width: 50%;
            }
            100% {
                width: 0%;
            }
        }
        .text-sm {
            font-family : 15px ;
        }
    </style>
@endsection 

@section('navbar') 
    @parent 
@endsection 

@section('page-name' , 'Car Models')

@section('content')
    <div class="container-fluid mt-3">
        <div class="w-full">
            <div class="table-header">
                <div class="row my-3">
                    <div class="col-md-6 text-start">
                        <div class="d-flex justify-content-start align-items-center">
                            <label for="" class="me-1">Show</label>
                            <select name="" id="" class="me-1 p-52 rounded">
                                <option value="">10</option>
                                <option value="">20</option>
                            </select>
                            <div>
                                Enteris
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 text-end">
                        <label for="" class="me-1 rounded">Serch :</label>
                        <input type="text" name="searchable" id="" class="p-52">
                    </div>
                </div>
                <hr>
            </div>
            @if(session('message'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Holy guacamole!</strong> You should check in on some of those fields below.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif 
            @if(count($datas) !== 0) 
                @foreach($datas as $data)
                    <div class="position rounded mb-3 searchable">
                        <div class="d-flex justify-content-between align-items-center h-30 p-10">
                            <div class="d-flex flex-column justify-content-center align-itmes-center ">
                                <div class=" text-capitalize">
                                    <span class="fw-bold">{{$data->brand_name}} </span>
                                    @if($data->grade !== "none")
                                        <span class="text-danger fw-bold text-sm"> ---{{ $data->grade }}</span>
                                    @endif 
                                </div>
                                <div class="fw-lighter">
                                        {{ $data->model_name }} / {{ $data->year }} / {{$data->license_plate}} 
                                </div>
                            </div>
                            <div class="fw-bolder">
                                @if($data->state == 0) 
                                    Pending <span class="p_loading">.....</span>
                                @else 
                                    <span class="fw-bold">finished </span>
                                @endif 
                            </div>
                        </div>
                        <div class="testing d-flex justify-content-center align-items-center">
                            <a href="{{url('admin/panding_state/' . $data->car_id )}}" class="">
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                @endforeach

            @else 
                <!--  message alert  -->
                <div class="mb-3">
                    <div class="alert alert-danger" role="alert">
                        <h4 class="alert-heading">Warning!</h4>
                        <p>There is no car in the salling page <strong>Make Sure to add the car into car sell list </strong> </p>
                        <hr>
                        <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
                    </div>
                </div>
            @endif
            
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
            let searchable  = $('input[name="searchable"]');
            searchable.focus();
            $(document).on('keyup' , searchable , function () {
                let searchInput = searchable.val().toLowerCase();
                let searchAble = $('.searchable');
                let dataRecord = $('.fw-lighter');
                dataRecord.each(function () {
                    let search = $(this).text().toLowerCase();
                    let row = $(this).parent().parent().parent() ;
                    if(search.includes(searchInput)) {
                        row.show();
                    }else {
                        row.hide();
                    }
                });
            });
        });
    </script>
@endsection 