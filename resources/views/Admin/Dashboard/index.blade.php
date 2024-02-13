@extends('Admin.Layout.app')

@section('title' , 'Admin')

@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magic/1.1.0/magic.min.css">
    <style>
        #curve_chart {
            border-radius : 10px ;
        }
        .chart-container {
            background : #f8f8f8 ;
            position: relative;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Shadow effect */
            border-radius: 10px; /* Rounded corners */
            overflow: hidden; /* Hide any overflow content */
            padding : 30px 10px ;
        }
        .chart-container:hover   {
            box-shadow: 5px 8px 5px rgba(0, 0, 0, 0.3);
        }
        .google-visualization-table-caption {
            margin-bottom: 10px; /* Add margin at the bottom */
        }
        .bg-main {
            height : 100px ;
        }
        .bg-img {
            top : 0 ;
            right:  0;
        }
        .w-100px {
            width : 100px ;
            height : 100px ;
        }
        .fs-18 {
            font-size : 25px ;
            font-weight : 800 ;
        }
        .color{
            color: #848080 ;
        }
        .fn-f-mono {
            font-family : monospace ;
        }
        .fs-20px {
            font-size : 20px ;
        }
        .right-0 {
            right : 0 ;
        }
        .bg-color {
            background : #13a0ac ;
        }
        .hover-element {
            cursor: pointer;
        }
        .d-cusotmize {
            display: none;
            opacity: 0;
            transition: opacity 0.3s ease ;
            margin-right  : 12px ;
        }
        .hover-element:hover .d-cusotmize {
            background : #95F1DF ;
            display : block ;
            opacity: 0.65;
            color : #141616 ;
        }
        .h-200 {
            min-height: 300px;
        }
    </style>
@endsection 

@section('navbar') 
    @parent 
@endsection 

@section('page-name' , 'Car Models')

@section('content')
    <div class="container ">
        <blockquote class="blockquote text-center mt-1">
            <p class="fw-bolder">Daily Report For Admin ...</p>
        </blockquote>
        <div class="row">
            <div class="col-md-6 ">
                <div class="chart-container h-200">
                    <div class="google-visualization-table-caption text-center fw-bold">
                        Sale Performance
                    </div>
                    <div class="loading-content">
                        <div class="loader position-absolute d-flex justify-content-center bg-transparent  align-items-center w-100 h-100">
                            <div class="spinner-border" role="status"></div>
                        </div>
                    </div>
                    <div  id="curve_chart" ></div>
                </div>
            </div>
            <div class="col-md-6 ">
                <div class="chart-container h-200">
                    <div class="google-visualization-table-caption text-center fw-bold">
                        Monthly Sale Performance
                    </div>
                    <div class="loading-content">
                        <div class="loader position-absolute d-flex justify-content-center bg-transparent  align-items-center w-100 h-100">
                            <div class="spinner-border" role="status"></div>
                        </div>
                    </div>
                    <div id="coreChart" ></div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-6 position-relative  hover-element mb-3 rounded tinRightIn" >
                <div class=" position-relative shadow rounded overflow-hidden bg-info  bg-main">
                    <div class=" w-100px h-100px  p-2">
                        <img class="bg-cover w-100 h-100" src="{{asset('storage/images/simileEmoji.png')}}" alt="">
                    </div>
                    <div class="color bg-img position-absolute w-100 fn-f-mono h-100 d-flex justify-content-around align-items-center">
                        <div class="fw-bold text-center fs-20px">
                            Saled Car For Today 
                        </div>
                        <div class="fw-bold  fs-18">
                            {{ $todaySold }}
                        </div>
                    </div>
                </div>
                <div class="position-absolute top-0 right-0 d-cusotmize w-25 h-100 bg-color rounded rotateLeft">
                    <a href="{{url('admin/dashboard/saledFor2Day')}}" class="text-decoration-none d-flex justify-content-center w-100 h-100 align-items-center ">
                        <div class="fw-bold me-2">
                            See 
                        </div>
                        <div class="">
                            <i class="fa-solid fa-forward"></i>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-6 position-relative  hover-element mb-3 rounded">
                <div class=" position-relative shadow rounded overflow-hidden bg-info  bg-main">
                    <div class=" w-100px h-100px  p-2">
                        <img class="bg-cover w-100 h-100" src="{{asset('storage/images/loveEmoji.png')}}" alt="">
                    </div>
                    <div class="color bg-img position-absolute w-100 fn-f-mono h-100 d-flex justify-content-around align-items-center">
                        <div class="fw-bold text-center fs-20px">
                            Depoist State Cars
                        </div>
                        <div class="fw-bold  fs-18">
                            {{ $depositStates }}
                        </div>
                    </div>
                </div>
                <div class="position-absolute top-0 right-0 d-cusotmize w-25 h-100 bg-color rounded">
                    <a href="{{url('admin/deposits/state')}}" class="text-decoration-none d-flex justify-content-center w-100 h-100 align-items-center ">
                        <div class="fw-bold me-2">
                            See 
                        </div>
                        <div class="">
                            <i class="fa-solid fa-forward"></i>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-6 position-relative  hover-element mb-3 rounded">
                <div class=" position-relative shadow rounded overflow-hidden bg-info  bg-main">
                    <div class=" w-100px h-100px  p-2">
                        <img class="bg-cover w-100 h-100" src="{{asset('storage/images/dogEmoji.png')}}" alt="">
                    </div>
                    <div class="color bg-img position-absolute w-100 fn-f-mono h-100 d-flex justify-content-around align-items-center">
                        <div class="fw-bold text-center fs-20px">
                            Machines State Cars 
                        </div>
                        <div class="fw-bold  fs-18">
                            12
                        </div>
                    </div>
                </div>
                <div class="position-absolute top-0 right-0 d-cusotmize w-25 h-100 bg-color rounded">
                    <a href="{{url('admin/machines/state')}}" class="text-decoration-none d-flex justify-content-center w-100 h-100 align-items-center ">
                        <div class="fw-bold me-2">
                            See 
                        </div>
                        <div class="">
                            <i class="fa-solid fa-forward"></i>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-6 position-relative  hover-element mb-3 rounded">
                <div class=" position-relative shadow rounded overflow-hidden bg-info  bg-main">
                    <div class=" w-100px h-100px  p-2">
                        <img class="bg-cover w-100 h-100" src="{{asset('storage/images/dogLIstionToMusi.png')}}" alt="">
                    </div>
                    <div class="color bg-img position-absolute w-100 fn-f-mono h-100 d-flex justify-content-around align-items-center">
                        <div class="fw-bold text-center fs-20px">
                            History Of Selling Car 
                        </div>
                        <div class="fw-bold  fs-18">
                            12
                        </div>
                    </div>
                </div>
                <div class="position-absolute top-0 right-0 d-cusotmize w-25 h-100 bg-color rounded">
                    <a href="{{url('admin/histroy/sold_out')}}" class="text-decoration-none d-flex justify-content-center w-100 h-100 align-items-center ">
                        <div class="fw-bold me-2">
                            See 
                        </div>
                        <div class="">
                            <i class="fa-solid fa-forward"></i>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection 

@section('footer')
    @parent 
@endsection 

@section('script')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="module" src="{{asset('storage/Chart/LineChart.js')}}"></script>
@endsection 