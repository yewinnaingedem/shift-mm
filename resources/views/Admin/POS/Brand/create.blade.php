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
        <div class="text-center">
            <div class="text-capitalize font-monospace fw-bold h3">Adding The Brand name</div>
        </div>
        <form action="{{url('admin/brand')}}"  method="post" >
            @csrf 
            <div class="mb-3">
                <label for="brands" class="form-label fw-bold">Add Brand</label>
                <input type="text" name="brand" id="brands" class="form-control mb-1" value="{{old('brand')}}" placeholder="Enter Brand Name">
                @if($errors->has('brand'))
                    <p class="fw-bold text-danger">{{$errors->first('brand')}}</p>
                @endif 
            </div>
            <div class="mb-3 row">
                <div class="col-md-6">
                    <button class="btn btn-primary">Sumbit</button>
                </div>
                <div class="col-md-6 text-end">
                    <a href="{{url('admin/car_models')}}" class="btn btn-primary mb-3">
                        <i class="fa-sharp fa-solid fa-backward"></i>
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