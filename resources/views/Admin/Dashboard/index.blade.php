@extends('Admin.Layout.app')

@section('title' , 'Admin')

@section('style')
    <style>
        #curve_chart {
            border-radius : 10px ;
        }
        .chart-container {
            background : #f8f8f8 ;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Shadow effect */
            border-radius: 10px; /* Rounded corners */
            overflow: hidden; /* Hide any overflow content */
            padding : 30px 15px ;
        }
        .chart-container:hover   {
            box-shadow: 5px 8px 5px rgba(0, 0, 0, 0.3);
        }
        .google-visualization-table-caption {
            margin-bottom: 10px; /* Add margin at the bottom */
        }
    </style>
@endsection 

@section('navbar') 
    @parent 
@endsection 

@section('page-name' , 'Car Models')

@section('content')
    <div class="container my-3">
        <div class="row">
            <div class="col-md-6 chart-container">
                <div class="google-visualization-table-caption text-center fw-bold">
                    Sale Performance
                </div>
                <div  id="curve_chart" ></div>
            </div>
            <div class="col-md-6">

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