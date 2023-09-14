@extends('Admin/Layout/app')

@section('title' , 'Admin || Show')


@section('style')
   <style>
        .w-full {
            width : 100% ;
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
    <div class="d-flex justify-content-start align-items-start mb-3"> 
        <a href="{{url('admin/brands')}}" class="btn btn-info">
            <i class="fa-solid fa-backward"></i> 
            <span>Back</span>  
        </a>
    </div>
    <div>
        <form action="{{url('admin/brands/'.$data->id)}}" method="post">
            @method('put')
            @csrf 
            <div class="mb-3">
                <label for="" class="form-label">Brand Name</label>
                <input type="text" name="brand_name" value="{{old('brand_name',$data->brand_name)}}" id="" class="form-control">
                @if($errors->has('brand_name'))
                    <p class="text-danger">{{$errors->first('brand_name')}}</p>
                @endif 
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Brand Model</label>
                <input type="text" name="model" value="{{old('model',$data->model)}}" id="" class="form-control">
                @if($errors->has('model'))
                    <p class="text-danger">{{$errors->first('model')}}</p>
                @endif 
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Brand Make</label>
                <input type="text" name="make" value="{{old('make',$data->make)}}" id="" class="form-control">
                @if($errors->has('make'))
                    <p class="text-danger">{{$errors->first('make')}}</p>
                @endif 
            </div>
            <div class="mb-3">
                <label for="" class="form-label"> Name</label>
                <input type="text" name="name" value="{{old('name',$data->name)}}" id="" class="form-control">
                @if($errors->has('name'))
                    <p class="text-danger">{{$errors->first('name')}}</p>
                @endif 
            </div>
            <div class="mb-3">
                <button class="btn btn-primary w-full">Edit</button>
            </div>
        </form>
    </div>
@endsection

@section('script')
    
@endsection 