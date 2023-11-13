@extends('Admin.Layout.app')

@section('title' , 'Admin')

@section('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <style>
        .card-img {
            width : 100% ;
            height: 150px;
            background : tomato ;
            overflow : hidden ;
            border-radius : 4px; 
        }
        .card-img img {
            width : 100% ;
            height: 100%;
            object-fit : cover ;
        }
        .d-none {
            display : none ;
        }
    </style>
@endsection 

@section('navbar') 
    @parent 
@endsection 

@section('page-name' , 'Car Models')

@section('content')
    <div class="container pt-3" >
        <form action="{{url('')}}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="row">
                        <div class="col-md-6 bg-dark text-white d-flex justify-content-center align-items-center rounded">
                            <label for="license_plate" >License Plate</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="license_plate" id="license_plate" class="form-control fw-bold" value="{{old('',$showData->license_plate)}}">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="row">
                        <div class="col-md-6 bg-dark text-white d-flex justify-content-center align-items-center rounded">
                            <label for="license_state" >License State</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="license_state" id="license_state" class="form-control fw-bold" value="{{old('',$showData->license_state)}}">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="row">
                        <div class="col-md-6 bg-dark text-white d-flex justify-content-center align-items-center rounded">
                            <label for="license_plate" >Grade </label>
                        </div>
                        <div class="col-md-6">
                            <select name="grade" class='form-select' id="">
                                @foreach($showData['grades'] as $grade )
                                    <option value="{{$grade->id}}" {{ $showData->grade == $grade->id ? 'selected' : '' }} >
                                        {{$grade->grade == 0 ? 'None' : $grade->grade}}
                                    </option>
                                @endforeach 
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="row">
                        <div class="col-md-6 bg-dark text-white d-flex justify-content-center align-items-center rounded">
                            <label for="license_plate" >Transmission </label>
                        </div>
                        <div class="col-md-6">
                            <select name="grade" class='form-select' id="">
                                @foreach($showData['transmissions'] as $transmission )
                                    <option value="{{$transmission->id}}" {{ $showData->transmission == $transmission->id ? 'selected' : '' }} >
                                        {{$transmission->transmission}}
                                    </option>
                                @endforeach 
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="row">
                        <div class="col-md-6 bg-dark text-white d-flex justify-content-center align-items-center rounded">
                            <label for="vin" >VIN</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="vin" id="vin" class="form-control fw-bold" value="{{old('',$showData->vin)}}">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="row">
                        <div class="col-md-6 bg-dark text-white d-flex justify-content-center align-items-center rounded">
                            <label for="place_of_orgin" >Made In </label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="place_of_orgin" id="place_of_orgin" class="form-control fw-bold" value="{{old('',$showData->place_of_orgin)}}">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="row">
                        <div class="col-md-6 bg-dark text-white d-flex justify-content-center align-items-center rounded">
                            <label for="kilo_meter" >Kilo Meter</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="kilo_meter" id="kilo_meter" class="form-control fw-bold" value="{{old('',$showData->kilo_meter)}}">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="row">
                        <div class="col-md-6 bg-dark text-white d-flex justify-content-center align-items-center rounded">
                            <label for="interior_color" >Interior Color</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="interior_color" id="interior_color" class="form-control fw-bold" value="{{old('',$showData->interior_color)}}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-3 bg-light">
                <div class="col-md-3 mb-3">
                    <label for="img[1]" class="d-flex justify-content-center align-items-center">
                        <input type="file" name="" class="d-none" id="img[1]">
                        <div class="card-img">
                            <img src="{{asset('storage/'.$showData->img1)}}" alt="Img">
                        </div>
                    </label>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="img[2]" class="d-flex justify-content-center align-items-center">
                        <input type="file" name="" class="d-none" id="img[2]">
                        <div class="card-img">
                            <img src="{{asset('storage/'.$showData->img2)}}" alt="Img">
                        </div>
                    </label>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="img[3]" class="d-flex justify-content-center align-items-center">
                        <input type="file" name="" class="d-none" id="img[3]">
                        <div class="card-img">
                            <img src="{{asset('storage/'.$showData->img3)}}" alt="Img">
                        </div>
                    </label>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="img[4]" class="d-flex justify-content-center align-items-center">
                        <input type="file" name="" class="d-none" id="img[4]">
                        <div class="card-img">
                            <img src="{{asset('storage/'.$showData->img4)}}" alt="Img">
                        </div>
                    </label>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="img[5]" class="d-flex justify-content-center align-items-center">
                        <input type="file" name="" class="d-none" id="img[5]">
                        <div class="card-img">
                            <img src="{{asset('storage/'.$showData->img5)}}" alt="Img">
                        </div>
                    </label>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="img[6]" class="d-flex justify-content-center align-items-center">
                        <input type="file" name="" class="d-none" id="img[6]">
                        <div class="card-img">
                            <img src="{{asset('storage/'.$showData->img6)}}" alt="Img">
                        </div>
                    </label>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="img[7]" class="d-flex justify-content-center align-items-center">
                        <input type="file" name="" class="d-none" id="img[7]">
                        <div class="card-img">
                            <img src="{{asset('storage/'.$showData->img7)}}" alt="Img">
                        </div>
                    </label>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="img[8]" class="d-flex justify-content-center align-items-center">
                        <input type="file" name="" class="d-none" id="img[8]">
                        <div class="card-img">
                            <img src="{{asset('storage/'.$showData->img8)}}" alt="Img">
                        </div>
                    </label>
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-md-6">
                    <a href="{{url('admin/cars')}}" class="btn btn-danger">
                        Back
                    </a>
                </div>
                <div class="col-md-6 text-end">
                    <buttn class="btn btn-primary">Save & Change</buttn>
                </div>
            </div>
        </form>
    </div>
@endsection 

@section('footer')
    @parent 
@endsection 

@section('script')
    
@endsection 