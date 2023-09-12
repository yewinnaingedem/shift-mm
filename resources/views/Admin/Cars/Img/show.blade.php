@extends('Admin/Layout/app')

@section('title' , 'Admin || Show')


@section('style')
    <style>
        .add-button {
            padding : 10px 20px ;
            border-radius : 10px ;
        }
        a {
            text-decoration : none ;
        }
    </style>
@endsection 

@section('sidebar')
    @parent 
@endsection 

@section('navbar')
    @parent 
@endsection 
@section('content')
    <div class="content-wrapper">
        <h1 class="text-center text-info text-lg mb-2">Car Imgaes</h1>
        <div class="mb-3">
            <a href="{{url('admin/imgs')}}" class="add-button bg-primary mb-2 text-white">
                Back  <span class="text-lg " style="margin-right:5px; font-size:20px;"> <<  </span>
            </a>
        </div>

        <div class="row">
            <div class="col-md-4 mb-3 align-items-center d-flex justify-content-center">
                <div class="overflow-hidden  rounded  " style="width:250px; height:250pxl">
                    <img style="width:100% ;height:100%;" src="{{asset('storage/'.$image->font )}}" alt="">
                </div>
            </div>
            <div class="col-md-4 mb-3 align-items-center d-flex justify-content-center">
                <div class="overflow-hidden  rounded  " style="width:250px; height:250pxl">
                    <img style="width:100% ;height:100%;" src="{{asset('storage/'.$image->east )}}" alt="">
                </div>
            </div>
            <div class="col-md-4 mb-3 align-items-center d-flex justify-content-center">
                <div class="overflow-hidden  rounded  " style="width:250px; height:250pxl">
                    <img style="width:100% ;height:100%;" src="{{asset('storage/'.$image->side_1 )}}" alt="">
                </div>
            </div>
            <div class="col-md-4 mb-3 align-items-center d-flex justify-content-center">
                <div class="overflow-hidden  rounded  " style="width:250px; height:250pxl">
                    <img style="width:100% ;height:100%;" src="{{asset('storage/'.$image->side_2 )}}" alt="">
                </div>
            </div>
            <div class="col-md-4 mb-3 align-items-center d-flex justify-content-center">
                <div class="overflow-hidden  rounded  " style="width:250px; height:250pxl">
                    <img style="width:100% ;height:100%;" src="{{asset('storage/'.$image->interior )}}" alt="">
                </div>
            </div>
            <div class="col-md-4 mb-3 align-items-center d-flex justify-content-center">
                <div class="overflow-hidden  rounded  " style="width:250px; height:250pxl">
                    <img style="width:100% ;height:100%;" src="{{asset('storage/'.$image->kilo )}}" alt="">
                </div>
            </div> 
        </div>
    </div>
@endsection

@section('script')
    
@endsection 