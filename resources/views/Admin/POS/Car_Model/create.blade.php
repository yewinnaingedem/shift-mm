@extends('Admin.Layout.app')

@section('title' , 'Admin')

@section('style')
@endsection 

@section('navbar') 
    @parent 
@endsection 

@section('page-name' , 'Car Models')

@section('content')
    <div class="container mt-3" >
        <form action="{{url('admin/car_models')}}"  method="post" >
            @csrf 
            <div class="mb-3">
                <label for="brands" class="form-label">Brand</label>
                <select class="form-select" name="brand" id="brands" aria-label="Disabled select example" >
                    @php  $id = session()->has('id') ? session()->get('id') : null   @endphp 
                    @foreach($brands as $brands)
                        <option value="{{$brands->id}}" 
                            {{ $brands->id == $id  ? "selected" : " " }}
                        >{{$brands->brand_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="model" class="form-label">Car Model</label>
                <input type="text" class="form-control" value="{{old('car_model')}}" placeholder="Enter Car Model" name="car_model">
                @if($errors->has('car_model'))
                    <p class="text-danger">{{$errors->first('car_model')}}</p>
                @endif 
            </div>
            <div class="mb-3">
                <label class="form-label" for="bodyStyle">Add Body Style</label>
                <select class="form-select" name="bodyStyle" id="bodyStyle" >
                    <option selected class="d-none">Your body style here </option>
                    @foreach($bodyStyles as $bodyStyle)
                        <option value="{{$bodyStyle->id}}">{{$bodyStyle->body_style}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3 row">
                <div class="col-md-6">
                    <button class="btn btn-primary">Sumbit</button>
                </div>
                <div class="col-md-6 text-end">
                    <a href="{{url('admin/car_models')}}" class="btn btn-danger mb-3">
                        <i class="fa-solid fa-backward"></i>
                        <span>Back </span>
                    </a>
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