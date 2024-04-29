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
        .cover-img {
            width : 100% ;
            min-height : 200px ;
        }
        .profile-img {
            bottom : -50px ;
            left : 50px ;
            background : black ;
            border-radius : 50% ;
        }
        .profile-img label {
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
                        <label for="">
                            <p>Add your cover photo</p>
                            <input type="file" name="cover-photo" class="d-none" id="">
                        </label>
                    </div>
                    <div class="profile-img position-absolute">
                        <label for="profile" class=" d-flex justify-content-center align-items-center text-white">
                            <p>Profile</p>
                            <input type="file" name="profile" class="d-none" id="profile">
                        </label>
                    </div>
                </div>
            </div>
            <div class="profile-content bg-cute little-white py-4 mb-2">
                <div class="row">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-3 description" >
                        <ul>
                            <li>
                                <a href="">Full Name</a>
                            </li>
                            <li>
                                <a href="">Date Of Birth</a>
                            </li>
                            <li>
                                <a href="">Gender</a>
                            </li>
                            <li><a href="">Contact Information (Phone, Email, Address)</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <ul>
                            <li>
                                <a href="">Mg Ye Win Naing</a>
                            </li>
                            <li>
                                <a href="">18/12/2001</a>
                            </li>
                            <li>
                                <a href="">Male</a>
                            </li>
                            <li>
                                <a href="">09673127480</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <ul>
                            <li>
                                <a href="">About Me</a>
                            </li>
                            <li>
                                <a href="">Pervious Jon </a>
                            </li>
                            <li>
                                <a href="">Content Details  </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="bg-cute py-4 mb-2 px-2 rounded">
                <div class="description-title">
                    <p class="fw-bold">Contant Details </p>
                </div>
                <div class="row px-2">
                    <div class="col-md-3">Phone</div>
                    <div class="col-md-1">:</div>
                    <div class="col-md-8">09673127480</div>
                </div>
                <div class="row px-2">
                    <div class="col-md-3">Email</div>
                    <div class="col-md-1">:</div>
                    <div class="col-md-8">yewinnang@116058</div>
                </div>
                <div class="row px-2 ">
                    <div class="col-md-3">Family Phone</div>
                    <div class="col-md-1">:</div>
                    <div class="col-md-8">09751200100</div>
                </div>
                <div class="row px-2 ">
                    <div class="col-md-3">Current Address</div>
                    <div class="col-md-1">:</div>
                    <div class="col-md-8">Hlaing Thar Yar , street 1 , </div>
                </div>
            </div>
            <div class="about-me bg-warning mb-3 py-3 px-2 rounded">
                <div class="fw-bold">
                    <p>About Me</p>
                </div>
                <div class="content">
                    <div class="about">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Labore, enim libero! Provident tempore voluptates commodi incidunt at harum, facilis laboriosam amet libero accusantium quidem vero voluptatem, deserunt, repellendus quam eius? Architecto sed deserunt blanditiis nemo non. Eligendi repellendus voluptatem, culpa illo maxime delectus nihil consequatur cum! Assumenda perspiciatis numquam omnis nihil soluta ipsum accusamus quas velit eaque quos alias animi magni, dolorem, quisquam corrupti! Molestiae animi suscipit commodi asperiores, praesentium esse maxime possimus aut, rem, modi voluptates earum. Recusandae, adipisci unde perspiciatis, pariatur aliquam quae placeat nam, voluptatibus quo quos odit. Beatae ut soluta quae amet numquam, sequi facilis quis?</div>
                </div>
            </div>
            <div class="py-3">
                <div>
                    <p>Employee Details</p> 
                </div>
                <div class="employee-details">
                    <table class="table table-dark table-striped rounded">
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
                                <td colspan="2">Supervior</td>
                            </tr>
                            <tr>
                                <th scope="row">Employment  Status</th>
                                <td colspan="2">Sale and promotion</td>
                            </tr>
                            <tr>
                                <th scope="row">Start Date</th>
                                <td colspan="2">now()</td>
                            </tr>
                            <tr>
                                <th scope="row">End Date</th>
                                <td colspan="2">Sale and promotion</td>
                            </tr>
                            <tr>
                                <th scope="row">Job Title</th>
                                <td colspan="2">Sale and promotion</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection 

@section('footer')
    @parent 
@endsection 

@section('script')

@endsection 