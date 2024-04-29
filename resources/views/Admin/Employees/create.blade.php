@extends('Admin.Layout.app')

@section('title' , 'Admin')

@section('style')
    <style>
        .h-200-px {
            height : 200px ;
        }
        .bg-lighter {
            background-color : #85929E ;
        }
        .object-fit-cover {
            object-fit : cover ;
        }
    </style>
@endsection 

@section('navbar') 
    @parent 
@endsection 

@section('page-name' , 'Car Models')

@section('content')
    <div class="container mt-3" >
            
            <div class="d-flex justify-content-around align-items-center">
                <div class="h2 ">
                    Create the Employee Role 
                </div>
            </div>
        <form action="{{url('admin/employees')}}"  method="post" enctype="multipart/form-data">
            @csrf 
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" value="{{old('name')}}" class="form-control" placeholder="Enter Name">
                    @if($errors->has('name'))
                        <p class="text-danger">{{$errors->first('name')}}</p>
                    @endif 
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label" for="email">Email</label>
                    <input type="text" name="email" id="email" value="{{old('email')}}" class="form-control" placeholder="Enter Email">
                    @if($errors->has('email'))
                        <p class="text-danger">{{$errors->first('email')}}</p>
                    @endif 
                </div>
                <div class="mb-3 col-md-6">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" class="form-control" name="phone" value="{{old('phone')}}" placeholder="Enter Phone" id="phone" >
                    @if($errors->has('phone'))
                        <p class="text-danger">{{$errors->first('phone')}}</p>
                    @endif 
                </div>
                <div class="mb-3 col-md-6">
                    <label for="position" class="form-label">Position </label>
                    <select class="form-select" name="position" id="models" aria-label="Disabled select example" >
                        @foreach($positions as $position)
                            <option value="{{$position->id}}">{{$position->role}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3 col-md-6">
                    <label for="age" class="form-label">Age </label>
                    <input type="number" class="form-control" name="age" value="{{old('age')}}" placeholder="Enter Age" id="age" >
                    @if($errors->has('age'))
                        <p class="text-danger">{{$errors->first('age')}}</p>
                    @endif 
                </div>
                <div class="mb-3 col-md-6">
                    <label for="start_date" class="form-label">Start Date</label>
                    <input type="date" class="form-control" name="start_date" value="{{old('start_date')}}"  >
                    @if($errors->has('start_date'))
                        <p class="text-danger">{{$errors->first('start_date')}}</p>
                    @endif 
                </div>
                <div class="mb-3 col-md-6">
                    <label for="salary" class="form-label">Salary</label>
                    <input type="number" class="form-control" name="salary" value="{{old('salary')}}" placeholder="Enter Salary" id="salary" >
                    @if($errors->has('salary'))
                        <p class="text-danger">{{$errors->first('salary')}}</p>
                    @endif 
                </div>
                <div class="mb-3 col-md-6">
                    <label for="address" class="form-label">Enter Address</label>
                    <textarea class="form-control" name="address" value="{{old('address')}}" id="address" rows="1" placeholder="Enter Address"></textarea>
                    @if($errors->has('address'))
                        <p class="text-danger">{{$errors->first('address')}}</p>
                    @endif 
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="font-nrc" class="card">
                        <div class="card-header text-center">
                            Font NRC
                        </div>
                        <input type="file" name="font-nrc" id="font-nrc" class="d-none" >
                        <div id="font_nrc" class="card-body bg-lighter  overflow-hidden w-100 h-200-px d-flex justify-content-center align-items-center">
                            <p class="card-text">Please Chose a photo here</p>
                        </div>
                    </label>
                    @if($errors->has('font-nrc')) 
                        <p class="text-danger">{{$errors->first('font-nrc')}}</p>
                    @endif 
                </div>
                <div class="col-md-6">
                    <label for="back-nrc" class="card">
                        <div class="card-header text-center">
                            Back NRC
                        </div>
                        <input type="file" name="back-nrc" id="back-nrc" class="d-none" >
                        <div id="back_nrc" class="card-body  bg-lighter overflow-hidden w-100 h-200-px d-flex justify-content-center align-items-center">
                            <p class="card-text">Please Chose a photo here</p>
                        </div>
                        <div></div>
                    </label>
                    @if($errors->has('back-nrc')) 
                        <p class="text-danger">{{$errors->first('back-nrc')}}</p>
                    @endif 
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <a href="{{url('admin/employees')}}" class="btn btn-primary mb-3">
                        <i class="fa-sharp fa-solid fa-backward"></i>
                        <span>Back </span>
                    </a>
                </div>
                <div class="col-md-6 text-end">
                    <button class="btn btn-primary">Sumbit</button>
                </div>
            </div>
        </form>
    </div>
@endsection 

@section('footer')
    @parent 
@endsection 

@section('script')
    <script>
        $(document).ready(()=> {
            $('#font-nrc').on('change' , function () {
                var input = this ;
                var fontNrc = $('#font_nrc');
                fontNrc.html('');
                if(input.files && input.files[0]) {
                    var render = new FileReader() ;
                    render.onload = function (e) {
                        var image = ` <img id="imagePreview" class="object-fit-cover rounded" src="${e.target.result}" alt="Selected Photo" width="100%" height="100%"> ` ;
                        fontNrc.append(image);
                    }
                    render.readAsDataURL(input.files[0]);
                }
            });
            $('#back-nrc').on('change' , function () {
                var input = this ;
                var fontNrc = $('#back_nrc');
                fontNrc.html('');
                if(input.files && input.files[0]) {
                    var render = new FileReader() ;
                    render.onload = function (e) {
                        var image = ` <img id="imagePreview" class="object-fit-cover rounded" src="${e.target.result}" alt="Selected Photo" width="100%" height="100%"> ` ;
                        fontNrc.append(image);
                    }
                    render.readAsDataURL(input.files[0]);
                }
            });
        });
    </script>
@endsection 