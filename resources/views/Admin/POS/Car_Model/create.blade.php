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
    <div class="container mt-3" >
        <a href="{{url('')}}" class="btn btn-primary mb-3">
            <i class="fa-sharp fa-solid fa-backward"></i>
            <span>Back </span>
        </a>
        <form action="{{url('admin/car_models')}}"  method="post">
            @csrf 
            <div class="mb-3">
                <label for="brands" class="form-label">Brand</label>
                <select class="form-select" name="brand" id="brands" aria-label="Disabled select example" >
                    @foreach($brands as $brands)
                        <option value="{{$brands->id}}">{{$brands->brand_name}}</option>
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
                <button class="btn btn-primary">Sumbit</button>
            </div>
        </form>
    </div>
@endsection 

@section('footer')
    @parent 
@endsection 

@section('script')
    
@endsection 