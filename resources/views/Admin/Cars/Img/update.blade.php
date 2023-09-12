@extends('Admin/Layout/app')

@section('title' , 'Admin || Update')


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
        <form action="{{url('admin/imgs/'.$data->id)}}" method="post" enctype="multipart/form-data">
            @csrf 
            @method('put')
            <div class="mb-3">
                <div class="row">
                    <div class="col-md-6 d-flex jsutify-content-center align-items-center ">
                        <div class="overflow-hidden rounded " style="width: 300px; height: 250px;">
                            <img width="100%" height="100%"  src="{{asset('storage/'.$data->font)}}" alt="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="font">Font Images</label>
                        <input class="form-control text-black " name="font" type="file" id="formFileDisabled" >
                        @if($errors->has('font'))
                            <p class="text-danger">{{$errors->first('font')}}</p>
                        @endif 
                    </div>
                </div>
            </div>
            
            <div class="mb-3">
                <div class="row">
                    <div class="col-md-6 d-flex jsutify-content-center align-items-center ">
                        <div class="overflow-hidden rounded " style="width: 300px; height: 250px;">
                            <img width="100%" height="100%"  src="{{asset('storage/'.$data->east)}}" alt="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="font">Back Images</label>
                        <input class="form-control text-black " name="east" type="file" id="formFileDisabled" >
                        @if($errors->has('font'))
                            <p class="text-danger">{{$errors->first('font')}}</p>
                        @endif 
                    </div>
                </div>
            </div>
            <div class="mb-3 row ">
                <div class="col-md-6 d-flex jsutify-content-center align-items-center ">
                    <div class="overflow-hidden rounded " style="width: 300px; height: 250px;">
                        <img width="100%" height="100%"  src="{{asset('storage/'.$data->side_1)}}" alt="">
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="font">Side  Images</label>
                    <input class="form-control text-black " name="side_1" value="{{old('side_1')}}" type="file" id="formFile" >
                    @if($errors->has('side_1'))
                        <p class="text-danger">{{$errors->first('side_1')}}</p>
                    @endif 
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-md-6 d-flex jsutify-content-center align-items-center ">
                    <div class="overflow-hidden rounded " style="width: 300px; height: 250px;">
                        <img width="100%" height="100%"  src="{{asset('storage/'.$data->side_2)}}" alt="">
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="font">Side Images</label>
                    <input class="form-control text-black " name="side_2" type="file" id="formFile" value="{{old('side_2')}}" >
                    @if($errors->has('side_2'))
                        <p class="text-danger">{{$errors->first('side_2')}}</p>
                    @endif 
                </div>
            </div>
            <div class="mb-3 row ">
                <div class="col-md-6 d-flex jsutify-content-center align-items-center ">
                    <div class="overflow-hidden rounded " style="width: 300px; height: 250px;">
                        <img width="100%" height="100%"  src="{{asset('storage/'.$data->interior)}}" alt="">
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="font">Interior</label>
                    <input class="form-control text-black " name="interior" type="file" value="{{old('interior')}}" id="formFile" >
                    @if($errors->has('interior'))
                        <p class="text-danger">{{$errors->first('interior')}}</p>
                    @endif 
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6 d-flex jsutify-content-center align-items-center ">
                    <div class="overflow-hidden rounded " style="width: 300px; height: 250px;">
                        <img width="100%" height="100%"  src="{{asset('storage/'.$data->kilo)}}" alt="">
                    </div>
                </div>
                <div class="col-md-6 flex justify-content-center align-items-center h-full">
                    <label class="form-label" for="font">Kilos Images</label>
                    <input class="form-control text-black " name="kilo" value="{{old('kilo')}}" type="file" id="formFileDisabled" >
                    @if($errors->has('kilo'))
                        <p class="text-danger">{{$errors->first('kilo')}}</p>
                    @endif 
                </div>
            </div>
            <div class="row">
                <div class="mb-3 w-full col-md-12">
                    <button class="btn btn-primary block  " style="width:100%;">Save</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('script')
    
@endsection 