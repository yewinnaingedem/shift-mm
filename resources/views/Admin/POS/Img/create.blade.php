@extends('Admin.Layout.app')

@section('title' , 'Admin')

@section('style')
    <style>
        .file-input {
            display : none ;
        }
        .card-main {
            height : 150px ;
            overflow: hidden;
        }
        .object-fit-cover {
            object-fit : cover ;
        }
        .cursor-not-allowed {
            cursor : not-allowed ;
        }
        .img .imagePreview {
            transition : transform 0.3s ease ;
        }
        .img:hover .imagePreview{
            transform: scale(1.1); /* Scale the image on hover */
        }
        .loading-bar {
            position: relative;
            top: 0;
            display: none;
            left: 0;
            width: 100%;
            height: 4px;
            background-color: transparent;
            border-radius : 15px ;
            overflow: hidden;
        }
        .loading-bar--active::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 30%;
            height: 4px;
            background-color: #ff5151;
            animation: moveLoadBar 2s cubic-bezier(0.09, 0.89, 0.7, 0.71) infinite;
        }
        .m-0 {
            margin-bottom : 0 !important ;
        }
        @keyframes moveLoadBar {
            0% {
                left: -10%;
            }
            100% {
                left: 110%;
            }
        }
    </style>
@endsection 

@section('navbar') 
    @parent 
@endsection 

@section('page-name' , 'Car Models')

@section('content')
    <div class="container-fulid pt-2">
        <form action="{{url('admin/car_img')}}" id="uploadForm" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="item_id" value="{{$car_datas['item_id']}}">
            <input type="hidden" name="owner_book_id" value="{{$car_datas['owner_book_id']}}">
            <div class="row mb-3" >
                <!-- img1 -->
                <div class="col-md-4 mb-3">
                    <label for="img1" class="w-100">
                        <input type="file" name="img[1]" id="img1" class="file-input" accept="img/*">
                        <div class="card">
                            <div class="card-header">
                                <div class="text-center fw-bold">Font Images </div>
                            </div>
                            <div class="car-body ">
                                <div class="card-main bg-dark d-flex justify-content-center align-items-center img img1">
                                    <p class="text-white">Please Chose Here</p>
                                </div>
                            </div>
                        </div>
                    </label>
                </div>
                <!-- img2 -->
                <div class="col-md-4 mb-3">
                    <label for="img2" class="w-100">
                        <input type="file" name="img[2]" id="img2" class="file-input" accept="img/*">
                        <div class="card">
                            <div class="card-header">
                                <div class="text-center fw-bold">Back Images </div>
                            </div>
                            <div class="car-body ">
                                <div class="card-main bg-dark d-flex justify-content-center align-items-center img img2">
                                    <p class="text-white">Please Chose Here</p>
                                </div>
                            </div>
                        </div>
                    </label>
                </div>
                <!-- img3 -->
                <div class="col-md-4 mb-3">
                    <label for="img3" class="w-100">
                        <input type="file" name="img[3]" id="img3" class="file-input" accept="img/*">
                        <div class="card">
                            <div class="card-header">
                                <div class="text-center fw-bold">Side Images </div>
                            </div>
                            <div class="car-body ">
                                <div class="card-main bg-dark d-flex justify-content-center img align-items-center img3">
                                    <p class="text-white">Please Chose Here</p>
                                </div>
                            </div>
                        </div>
                    </label>
                </div>
                <!-- img4 -->
                <div class="col-md-4 mb-3">
                    <label for="img4" class="w-100">
                        <input type="file" name="img[4]" id="img4" class="file-input" accept="img/*">
                        <div class="card">
                            <div class="card-header">
                                <div class="text-center fw-bold">Side Images </div>
                            </div>
                            <div class="car-body ">
                                <div class="card-main bg-dark d-flex justify-content-center img align-items-center img4">
                                    <p class="text-white">Please Chose Here</p>
                                </div>
                            </div>
                        </div>
                    </label>
                </div>
                <!-- img5 -->
                <div class="col-md-4 mb-3">
                    <label for="img5" class="w-100">
                        <input type="file" name="img[5]" id="img5" class="file-input">
                        <div class="card">
                            <div class="card-header">
                                <div class="text-center fw-bold">Inside 1 Images </div>
                            </div>
                            <div class="car-body ">
                                <div class="card-main bg-dark d-flex justify-content-center img align-items-center img img5">
                                    <p class="text-white">Please Chose Here</p>
                                </div>
                            </div>
                        </div>
                    </label>
                </div>
                <!-- img6 -->
                <div class="col-md-4 mb-3">
                    <label for="img6" class="w-100">
                        <input type="file" name="img[6]" id="img6" class="file-input">
                        <div class="card">
                            <div class="card-header">
                                <div class="text-center fw-bold">Inside 2 Images </div>
                            </div>
                            <div class="car-body ">
                                <div class="card-main bg-dark d-flex justify-content-center align-items-center img img6">
                                    <p class="text-white">Please Chose Here</p>
                                </div>
                            </div>
                        </div>
                    </label>
                </div>
                <!-- img7 -->
                <div class="col-md-4 mb-3">
                    <label for="img7" class="w-100">
                        <input type="file" name="img[7]" id="img7" class="file-input">
                        <div class="card">
                            <div class="card-header">
                                <div class="text-center fw-bold">OUt Images </div>
                            </div>
                            <div class="car-body ">
                                <div class="card-main bg-dark d-flex justify-content-center align-items-center img img7">
                                    <p class="text-white">Please Chose Here</p>
                                </div>
                            </div>
                        </div>
                    </label>
                </div>
                <!-- img8 -->
                <div class="col-md-4 mb-3">
                    <label for="img8" class="w-100">
                        <input type="file" name="img[8]" id="img8"  class="file-input">
                        <div class="card">
                            <div class="card-header">
                                <div class="text-center fw-bold">Wheel Images </div>
                            </div>
                            <div class="car-body ">
                                <div class="card-main bg-dark d-flex justify-content-center align-items-center img img8">
                                    <p class="text-white">Please Chose Here</p>
                                </div>
                            </div>
                        </div>
                    </label>
                </div>
            </div>
            <div class="mb-3 ">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" >Submit </button>
            </div>
            <!-- Modal  -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Report Demange For 
                                <span class="fw-bold text-danger">{{$car_datas['model_name']}}</span>
                                <span>{{$car_datas['license_plate']}}</span>
                            </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="loading-bar loading-bar--active"></div>
                        <div class="modal-body">
                            <div class="mb-1">
                                <label for="engineAndSuspension" class="col-form-label">Engine And Suspension</label>
                                <textarea class="form-control valid-check" id="engineAndSuspension" name="engineAndSuspension" rows="1"></textarea>
                            </div>
                            <div class="mb-1">
                                <label for="paintAndBody" class="col-form-label">Paint And Body Repairt</label>
                                <textarea class="form-control valid-check" name="paintAndBody" id="paintAndBody" rows="1"></textarea>
                            </div>
                            <div class="mb-1">
                                <label for="paintAndBody" class="col-form-label">TV And Wiring </label>
                                <textarea class="form-control valid-check" id="tvAndWiring" name="tvAndWiring" rows="1"></textarea>
                            </div>
                            <div class="">
                                <label for="addtional_exception" class="col-form-label" >Addtional Exception</label>
                                <textarea class="form-control valid-check" id="addtional_exception" rows="1" name="addtional_exception"></textarea>
                            </div>
                            <fieldset>
                                <legend>
                                    Are You Gonna Check It ?
                                </legend>
                                <div class="row">
                                    <div class="col-md-1">
                                        <hr>
                                    </div>
                                    <div class="col-md-11 d-flex justify-content-start align-items-center">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" value="false" type="checkbox" name="show_room" role="switch" id="show_room">
                                            <label class="form-check-label" for="show_room">Are You Gonna Check it at ShwoRoom <strong>?</strong></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-1">
                                        <hr>
                                    </div>
                                    <div class="col-md-11 d-flex justify-content-start align-items-center">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" value="true" type="checkbox" name="NMVTIS" role="switch" id="NMVTIS">
                                            <label class="form-check-label" for="NMVTIS">Are You Gonna Check it at Car Registation <strong>?</strong> </label>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <div>
                                <input type="checkbox" name="all_good" value="all_good" class="form-check-input me-2" id="all_good">
                                <label for="all_good" class="form-check-label">Everthing Good <strong>?</strong></label>
                            </div>
                            <button type="button" id="submitButton" class="btn btn-primary">Send message</button>
                        </div>
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
            $('#img1').on('change',function () {
                var input = this ;
                var img1 = $('.img1');
                img1.html('') ;
                if(input.files && input.files[0]) {
                    var render = new FileReader() ;
                    render.onload = function (e) {
                        var image = ` <img id="imagePreview" class="object-fit-cover imagePreview rounded" src="${e.target.result}" alt="Selected Photo" width="100%" height="100%"> ` ;
                        img1.append(image);
                    }
                    render.readAsDataURL(input.files[0]);
                }
            });

            $('#img2').on('change',function () {
                var input = this ;
                var img2 = $('.img2');
                img2.html('') ;
                if(input.files && input.files[0]) {
                    var render = new FileReader() ;
                    render.onload = function (e) {
                        var image = ` <img id="imagePreview" class="object-fit-cover imagePreview rounded" src="${e.target.result}" alt="Selected Photo" width="100%" height="100%"> ` ;
                        img2.append(image);
                    }
                    render.readAsDataURL(input.files[0]);
                }

            });

            $('#img3').on('change',function () {
                var input = this ;
                var img3 = $('.img3');
                img3.html('') ;
                if(input.files && input.files[0]) {
                    var render = new FileReader() ;
                    render.onload = function (e) {
                        var image = ` <img id="imagePreview" class="object-fit-cover imagePreview rounded" src="${e.target.result}" alt="Selected Photo" width="100%" height="100%"> ` ;
                        img3.append(image);
                    }
                    render.readAsDataURL(input.files[0]);
                }

            });

            $('#img4').on('change',function () {
                var input = this ;
                var img4 = $('.img4');
                img4.html('') ;
                if(input.files && input.files[0]) {
                    var render = new FileReader() ;
                    render.onload = function (e) {
                        var image = ` <img id="imagePreview" class="object-fit-cover imagePreview rounded" src="${e.target.result}" alt="Selected Photo" width="100%" height="100%"> ` ;
                        img4.append(image);
                    }
                    render.readAsDataURL(input.files[0]);
                }
            });

            $('#img5').on('change',function () {
                var input = this ;
                var img5 = $('.img5');
                img5.html('') ;
                if(input.files && input.files[0]) {
                    var render = new FileReader() ;
                    render.onload = function (e) {
                        var image = ` <img id="imagePreview" class="object-fit-cover imagePreview rounded" src="${e.target.result}" alt="Selected Photo" width="100%" height="100%"> ` ;
                        img5.append(image);
                    }
                    render.readAsDataURL(input.files[0]);
                }

            });

            $('#img6').on('change',function () {
                var input = this ;
                var img6 = $('.img6');
                img6.html('') ;
                if(input.files && input.files[0]) {
                    var render = new FileReader() ;
                    render.onload = function (e) {
                        var image = ` <img id="imagePreview" class="object-fit-cover imagePreview rounded" src="${e.target.result}" alt="Selected Photo" width="100%" height="100%"> ` ;
                        img6.append(image);
                    }
                    render.readAsDataURL(input.files[0]);
                }

            });

            $('#img7').on('change',function () {
                var input = this ;
                var img7 = $('.img7');
                img7.html('') ;
                if(input.files && input.files[0]) {
                    var render = new FileReader() ;
                    render.onload = function (e) {
                        var image = ` <img id="imagePreview" class="object-fit-cover imagePreview rounded" src="${e.target.result}" alt="Selected Photo" width="100%" height="100%"> ` ;
                        img7.append(image);
                    }
                    render.readAsDataURL(input.files[0]);
                }
            });

            $('#img8').on('change',function () {
                var input = this ;
                var img8 = $('.img8');
                img8.html('') ;
                if(input.files && input.files[0]) {
                    var render = new FileReader() ;
                    render.onload = function (e) {
                        var image = ` <img id="imagePreview" class="object-fit-cover imagePreview rounded" src="${e.target.result}" alt="Selected Photo" width="100%" height="100%"> ` ;
                        img8.append(image);
                    }
                    render.readAsDataURL(input.files[0]);
                }
            });

            $(document).on('click','#submitButton' , () => {
                var formData = new FormData($('#uploadForm')[0]);
                $('.loading-bar').show();
                $.ajax({
                    url : "/admin/car_img/test",
                    type : "post" ,
                    data: formData,
                    processData : false ,
                    contentType : false ,
                    success : (success) => {
                        $('.loading-bar').hide();
                        window.location.href = success.redirect;
                    },
                    error : (error) => {
                        console.log(error);
                    }
                });
            });
        });
    </script>
@endsection 