@extends('Admin/Layout/app')

@section('title' , 'Admin || Create')


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
        <form action="{{url('admin/imgs')}}" method="post" enctype="multipart/form-data">
            @csrf 
            <div class="mb-3">
                <label class="form-label" for="font">Font Images</label>
                <input class="form-control text-black " name="font" type="file" id="formFileDisabled" >
                @if($errors->has('font'))
                    <p class="text-danger">{{$errors->first('font')}}</p>
                @endif 
            </div>
            <div class="mb-3">
                <label class="form-label" for="font">East Images</label>
                <input class="form-control text-black " name="east" type="file" value="{{old('east')}}" id="formFile" >
                @if($errors->has('east'))
                    <p class="text-danger">{{$errors->first('east')}}</p>
                @endif 
            </div>
            <div class="mb-3">
                <label class="form-label" for="font">Side  Images</label>
                <input class="form-control text-black " name="side_1" value="{{old('side_1')}}" type="file" id="formFile" >
                @if($errors->has('side_1'))
                    <p class="text-danger">{{$errors->first('side_1')}}</p>
                @endif 
            </div>
            <div class="mb-3">
                <label class="form-label" for="font">Side Images</label>
                <input class="form-control text-black " name="side_2" type="file" id="formFile" value="{{old('side_2')}}" >
                @if($errors->has('side_2'))
                    <p class="text-danger">{{$errors->first('side_2')}}</p>
                @endif 
            </div>
            <div class="mb-3">
                <label class="form-label" for="font">Interior</label>
                <input class="form-control text-black " name="interior" type="file" value="{{old('interior')}}" id="formFile" >
                @if($errors->has('interior'))
                    <p class="text-danger">{{$errors->first('interior')}}</p>
                @endif 
            </div>
            <div class="mb-3">
                <label class="form-label" for="font">Kilos Images</label>
                <input class="form-control text-black " name="kilo" value="{{old('kilo')}}" type="file" id="formFileDisabled" >
                @if($errors->has('kilo'))
                    <p class="text-danger">{{$errors->first('kilo')}}</p>
                @endif 
            </div>
            <div class="mb-3">
                <button class="btn btn-primary w-full ">Create </button>
            </div>
        </form>
    </div>
@endsection

@section('script')
    
@endsection 