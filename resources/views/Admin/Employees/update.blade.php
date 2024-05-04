@extends('Admin.Layout.app')

@section('title' , 'Admin')

@section('style')
    <style>
        .profile-header {
            background-color :  #ca9595;
            position : relative ;
            width : 100% ;
            min-height : 200px ;
            height : 150px ;
            border-radius : 5px ;
        }
        .cover-img , .cover-logo{
            width : 100% ;
            height : 200px ;
            min-height : 200px ;
            overflow : hidden ;
        }
        .cover-logo img {
            object-fit : cover ;
            object-position : center ;
        }
        .profile-img {
            bottom : -50px ;
            left : 50px ;
            background : black ;
            border-radius : 50% ;
            overflow : hidden ;
        }
        .profile-img .img-container {
            width : 180px ;
            height : 180px ;
            
        }
        .little-white {
            background : white ;
        }
        ul {
            list-style: none;
        }
        li a {
            text-decoration : none ;
            color : black ;
        }
        .description {
            font-weight : 500 ;
            text-decoration : none ;
            color : #ada4a4 ;
        }
        .cover-logo img {
            
        }
        .bg-cute {
            background-color : #f6f6f6 ;
        }
        .about::first-letter {
            margin-right : 5px ;
            margin-left : 10px ;
            font-size: 1.5em;
            font-weight: bold;
            color: #007bff;
        }
        .description-column {
            width : 70% ;
        }
    </style>
@endsection 

@section('navbar') 
    @parent 
@endsection 

@section('page-name' , 'Car Models')

@section('content')
    <div class="jj">
        <div class="profile mt-2">
            <div class="profile-header">
                <div class="img">
                    <div class="cover-img d-flex justify-content-center align-items-center ">
                        <!-- <label for="">
                            <p>Add your cover photo</p>
                            <input type="file" name="cover-photo" class="d-none" id="">
                        </label> -->
                        <div class="cover-logo">
                            <img class="w-100 h-100" src="{{asset('storage/NRC/img/mingalar.jpg')}}" alt="Mingalar">
                        </div>
                        
                    </div>
                    <div class="profile-img position-absolute">
                        <div class="d-flex img-container  justify-content-center overflow-hidden align-items-center text-white">
                            <img src="{{asset('storage/'. $employee->profile)}}" alt="profile" class="w-100 h-100">
                        </div>
                    </div>
                </div>
            </div>
            <div class="profile-content bg-cute little-white shadow-sm py-4 mb-2">
                <div class="row">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-3 description" >
                        <ul>
                            <li>
                                <span class="fw-semibold">Full Name</span>
                            </li>
                            <li>
                                <span class="fw-semibold">Date Of Birth</span>
                            </li>
                            <li>
                                <span class="fw-semibold">Gender</span>
                            </li>
                            <li>
                                <span class="fw-semibold">Contact Information (Phone )</span>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <ul>
                            <li>
                                <span class="text-muted">{{$employee->full_name}}</span>
                            </li>
                            <li>
                                <span class="text-muted">{{$employee->date_of_birth}}</span>
                            </li>
                            <li>
                                <span class="text-muted" >{{$employee->gender}}</span>
                            </li>
                            <li>
                                <span class="text-muted" >{{$employee->phone_number}}</span>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <ul>
                            <li>
                                <a href="#content_Me">Contact Me</a>
                            </li>
                            <li>
                                <a href="#job_position">Job Position And Status</a>
                            </li>
                            <li>
                                <a href="#summary_note">Summary & Notes  </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="bg-cute shadow-sm py-4 mb-2 px-2 rounded">
                <div class="description-title">
                    <p class="fw-bold">Contant Details </p>
                </div>
                <div class="row px-2">
                    <div class="col-md-3">
                        <i class="fa-solid fa-phone me-1"></i>
                        <span class="fw-semibold">Phone</span>
                    </div>
                    <div class="col-md-1">:</div>
                    <div class="col-md-8">{{$employee->phone_number}}</div>
                </div>
                <div class="row px-2">
                    <div class="col-md-3">
                        <i class="fa-solid fa-envelope me-2"></i>
                        <span class="fw-semibold">Email</span> 
                    </div>
                    <div class="col-md-1">:</div>
                    <div class="col-md-8">{{$employee->email}}</div>
                </div>
                <div class="row px-2 ">
                    <div class="col-md-3">
                        <i class="fa-solid fa-phone-volume me-2"></i>
                        <span class="fw-semibold">Family Phone</span> 
                    </div>
                    <div class="col-md-1">:</div>
                    <div class="col-md-8">{{$employee->emergency_contact_name}}</div>
                </div>
                <div class="row px-2 ">
                    <div class="col-md-3">
                        <i class="fa-solid fa-location-dot me-2"></i>
                        <span class="fw-semibold" >Current Address</span>
                    </div>
                    <div class="col-md-1">:</div>
                    <div class="col-md-8">{{$employee->address}}</div>
                </div>
            </div>
            <div class="py-3 bg-cute shadow-sm mb-3 px-2 rounded">
                <div>
                    <p class="fw-bold">Employee Details</p> 
                </div>
                <div class="employee-details px-3">
                    <table class="table table-striped  table-light rounded">
                        <thead>
                            <tr>
                                <th scope="col">Lable </th>
                                <th scope="col" class="description-column">Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Employee ID</td>
                                <td scope="2">#1256</td>
                            </tr>
                            <tr>
                                <th scope="row">Job Title</th>
                                <td colspan="2">Sale and promotion</td>
                            </tr>
                            <tr>
                                <th scope="row">Position</th>
                                <td colspan="2">{{$employee->role}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Employment  Status</th>
                                <td colspan="2">{{$employee->status}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Start Date</th>
                                <td colspan="2">{{$employee->date_of_hire}}</td>
                            </tr>
                            <tr>
                                <th scope="row">End Date</th>
                                <td colspan="2">---- </td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="mb-3 text-end">
            <a href="{{url('admin/employees')}}" class="btn btn-danger">
                <i class="fa-solid fa-backward me-1"></i>
                <span>Back</span>
            </a>
        </div>
    </div>
@endsection 

@section('footer')
    @parent 
@endsection 

@section('script')

@endsection 