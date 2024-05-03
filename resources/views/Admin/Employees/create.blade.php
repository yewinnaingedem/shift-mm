@extends('Admin.Layout.app')

@section('title' , 'Admin')

@section('style')
    <style>
        .h-150-px {
            height : 150px ;
        }
        .bg-lighter {
            background-color : #85929E ;
        }
        .object-fit-cover {
            object-fit : cover ;
        }
        .bg-light {
            background-color : #f6f6f6 ;
        }
    </style>
@endsection 

@section('navbar') 
    @parent 
@endsection 

@section('page-name' , 'Car Models')

@section('content')
    <div class="container mt-3 shadow-lg py-1 px-3 bg-light rounded"  >
            <div class="d-flex justify-content-around align-items-center">
                <div class="h3 font-monospace text-muted">
                    Create the Employee Role 
                </div>
            </div>
        <form action="{{url('admin/employees')}}"  method="post" enctype="multipart/form-data">
            @csrf 
            <div class="mb-2">
                <!-- Employee Infomation  -->
                <div class="mb-3">
                    <div class="text-muted">
                        <p>Employee Infomation</p>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="name" class="form-label">Full Name</label>
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
                            <label for="date_of_birth" class="form-label">Date Of Birth</label>
                            <input type="date" class="form-control" name="date_of_birth" value="{{old('date_of_birth')}}"  >
                            @if($errors->has('date_of_birth'))
                                <p class="text-danger">{{$errors->first('date_of_birth')}}</p>
                            @endif 
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="gender" class="form-label">Gender</label>
                            <select class="form-select" name="gender" id="gender">
                                <option value="male" selected>Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" name="phone" value="{{old('phone')}}" placeholder="Enter Phone" id="phone" >
                            @if($errors->has('phone'))
                                <p class="text-danger">{{$errors->first('phone')}}</p>
                            @endif 
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="family_phone" class="form-label">Family Phone</label>
                            <input type="text" class="form-control" name="family_phone" value="{{old('family_phone')}}" placeholder="Family Phone" id="family_phone" >
                        </div>
                            <div class="mb-3 col-md-6">
                                <label for="address" class="form-label">Enter Address</label>
                                <textarea class="form-control" name="address" value="{{old('address')}}" id="address" rows="2" placeholder="Enter Address"></textarea>
                                @if($errors->has('address'))
                                    <p class="text-danger">{{$errors->first('address')}}</p>
                                @endif 
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <!-- Employee Details  -->
                <div class="mb-3">
                    <div class="text-muted ">
                        <p>Employee Details </p>
                    </div>
                    <div class="row ">
                        <div class="mb-3 col-md-6">
                            <label for="position" class="form-label">Position </label>
                            <select class="form-select" name="position" id="position"  >
                                @foreach($positions as $position)
                                    <option value="{{$position->id}}">{{$position->role}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="employmentStatus" class="form-label">Employment Status </label>
                            <select class="form-select" name="employmentStatus" id="employmentStatus"  >
                                @foreach($employmentStatus as $status)
                                    <option value="{{$status->id}}">{{$status->status}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="dataOfHiring" class="form-label">Date of hiring</label>
                            <input type="date" class="form-control" name="dataOfHiring" value="{{old('dataOfHiring')}}"  >
                            @if($errors->has('dataOfHiring'))
                                <p class="text-danger">{{$errors->first('dataOfHiring')}}</p>
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
                            <label for="summary" class="form-label">Summary</label>
                            <textarea class="form-control" name="summary" value="{{old('summary')}}" id="summary" rows="2" placeholder="Summary"></textarea>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="note" class="form-label"> Note</label>
                            <textarea class="form-control" name="note" value="{{old('note')}}" id="note" rows="2" placeholder="Note"></textarea>
                        </div>
                    </div>
                </div>
                <hr>
                <!-- font & back NRC  -->
                <div class=" mb-3">
                    <div class="text-muted ">
                        <p>Img Generation</p>
                    </div>
                    <div class="row ">
                        <div class="col-md-4">
                            <label for="profile" class="card">
                                <div class="card-header text-center">
                                    Profile
                                </div>
                                <input type="file" name="profile" id="profile" class="d-none" >
                                <div id="profile-img" class="card-body  bg-lighter overflow-hidden w-100 h-150-px d-flex justify-content-center align-items-center">
                                    <p class="card-text">Please Chose a photo here</p>
                                </div>
                                <div>

                                </div>
                            </label>
                            
                        </div>
                        <div class="col-md-4">
                            <label for="font-nrc" class="card">
                                <div class="card-header text-center">
                                    Font NRC
                                </div>
                                <input type="file" name="font-nrc" id="font-nrc" class="d-none" >
                                <div id="font_nrc" class="card-body bg-lighter  overflow-hidden w-100 h-150-px d-flex justify-content-center align-items-center">
                                    <p class="card-text">Please Chose a photo here</p>
                                </div>
                            </label>
                            @if($errors->has('font-nrc')) 
                                <p class="text-danger">{{$errors->first('font-nrc')}}</p>
                            @endif 
                        </div>
                        <div class="col-md-4">
                            <label for="back-nrc" class="card">
                                <div class="card-header text-center">
                                    Back NRC
                                </div>
                                <input type="file" name="back-nrc" id="back-nrc" class="d-none" >
                                <div id="back_nrc" class="card-body  bg-lighter overflow-hidden w-100 h-150-px d-flex justify-content-center align-items-center">
                                    <p class="card-text">Please Chose a photo here</p>
                                </div>
                                <div></div>
                            </label>
                            @if($errors->has('back-nrc')) 
                                <p class="text-danger">{{$errors->first('back-nrc')}}</p>
                            @endif 
                        </div>
                    </div>
                </div>
                <!-- Submit & Back  -->
                <div class="row">
                    <div class="col-md-6">
                        <a href="{{url('admin/employees')}}" class="btn btn-primary mb-3">
                            <i class="fa-solid fa-circle-arrow-left"></i>
                            <span>Back </span>
                        </a>
                    </div>
                    <div class="col-md-6 text-end">
                        <button class="btn btn-primary">Sumbit</button>
                    </div>
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
            $('#profile').on('change' , function () {
                var input = this ;
                var profile = $('#profile-img');
                profile.html('');
                if(input.files && input.files[0]) {
                    var render = new FileReader() ;
                    render.onload = function (e) {
                        var image = ` <img id="imagePreview" class="object-fit-cover rounded" src="${e.target.result}" alt="Selected Photo" width="100%" height="100%"> ` ;
                        profile.append(image);
                    }
                    render.readAsDataURL(input.files[0]);
                }
            });
        });
    </script>
@endsection 