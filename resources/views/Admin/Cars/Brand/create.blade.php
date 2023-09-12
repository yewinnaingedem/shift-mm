@extends('Admin/Layout/app')

@section('title' , 'Brand || Create')


@section('style')
    <style>
        .text-white {
            color : white ;
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
    <div class="container">
        <div >
            <div class="d-flex justify-content-start align-items-start mb-3"> <a href="{{url('admin/brands')}}" class="btn btn-primary"><i class="fa-solid fa-backward"></i> <span>Back</span>  </a></div>
            <form action="{{url('admin/brands')}}" method="post">
                @csrf 
                <div class="mb-3">
                    <label for="" class="form-label">Brand Name</label>
                    <input type="text" name="brand_name" id="" placeholder="Enter Brand Name" value="{{old('brand_name')}}" class="form-control text-white">
                    @if($errors->has('brand_name'))
                        <p class="text-danger">{{$errors->first('brand_name')}}</p>
                    @endif 
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Model </label>
                    <input type="number" name="model" id="" value="{{old('model')}}" placeholder="Enter Brand Model" class="form-control text-white">
                    @if($errors->has('model'))
                        <p class="text-danger">{{$errors->first('model')}}</p>
                    @endif 
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Make  </label>
                    <input type="text" name="make" id="" value="{{old('make')}}" placeholder="Enter Brand Make" class="form-control text-white">
                    @if($errors->has('make'))
                        <p class="text-danger">{{$errors->first('make')}}</p>
                    @endif 
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Name  </label>
                    <input type="text" name="name" id="" value="{{old('name')}}" placeholder="Enter Brand Make" class="form-control text-white">
                    @if($errors->has('name'))
                        <p class="text-danger">{{$errors->first('name')}}</p>
                    @endif 
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary w-full">Create New</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('footer')
    @parent 
@endsection 
@section('script')
   
@endsection 