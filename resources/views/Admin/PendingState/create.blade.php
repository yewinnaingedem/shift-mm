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
    <div class="container my-3">
        <div class="text-center mb-3">
            <div class="h-3 text-truncate">Mainting The Accent <span class="text-red">( 5R-4890 )</span></div>
        </div>
        <div class="mb-2">
            <label class="form-label font-monospace" >Engine Malfunction</label>
            <div class="row">
                <div class="col-md-5">
                    <textarea class="form-control"  id="exampleFormControlTextarea1" rows="1">{{$data->engine_malfunction == "none" ? "---------" : $data->engine_malfunction}}</textarea>
                </div>
                <div class="col-md-5">
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="col-md-2 text-center">
                    <button class="btn btn-primary w-100">Sending</button>
                </div>
            </div>
            <hr>
        </div>
        <div class="mb-2">
            <label class="form-label font-monospace" >Paint Demage</label>
            <div class="row">
                <div class="col-md-5">
                    <textarea class="form-control"  id="exampleFormControlTextarea1" rows="1">{{$data->paint_demage == 'none' ? "---------" : $data->paint_demage}}</textarea>
                </div>
                <div class="col-md-5">
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="col-md-2 text-center">
                    <button class="btn btn-primary w-100">Sending</button>
                </div>
            </div>
            <hr>
        </div>
        <div class="mb-2">
            <label class="form-label font-monospace" >TV Exception</label>
            <div class="row">
                <div class="col-md-5">
                    <textarea class="form-control"  id="exampleFormControlTextarea1" rows="1">{{$data->tv == "none" ? "--------" : $data->tv}}</textarea>
                </div>
                <div class="col-md-5">
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="col-md-2 text-center">
                    <button class="btn btn-primary w-100">Sending</button>
                </div>
            </div>
            <hr>
        </div>
        <div class="mb-2">
            <label class="form-label font-monospace" >Suspection</label>
            <div class="row">
                <div class="col-md-5">
                    <textarea class="form-control"  id="exampleFormControlTextarea1" rows="1">{{$data->suspection == "none" ? "--------" : $data->suspection}}</textarea>
                </div>
                <div class="col-md-5">
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="col-md-2 text-center">
                    <button class="btn btn-primary w-100">Sending</button>
                </div>
            </div>
            <hr>
        </div>
        <div class="mb-2">
            <label class="form-label font-monospace" >Font And Back Lights</label>
            <div class="row">
                <div class="col-md-5">
                    <textarea class="form-control"  id="exampleFormControlTextarea1" rows="1">{{$data->lights == "none" ? "------" : $data->lights}}</textarea>
                </div>
                <div class="col-md-5">
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="col-md-2 text-center">
                    <button class="btn btn-primary w-100">Sending</button>
                </div>
            </div>
            <hr>
        </div>
        <div class="mb-2">
            <label class="form-label font-monospace" >Addtional Exception</label>
            <div class="row">
                <div class="col-md-5">
                    <textarea class="form-control"  id="exampleFormControlTextarea1" rows="1">{{ $data->addition_exception == "none" ? "---------" : $data->addition_exception}}</textarea>
                </div>
                <div class="col-md-5">
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="col-md-2 text-center">
                    <button class="btn btn-primary w-100">Sending</button>
                </div>
            </div>
            <hr>
        </div>
    </div>
@endsection 

@section('footer')
    @parent 
@endsection 

@section('script')
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    
@endsection 