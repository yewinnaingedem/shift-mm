@extends('Admin.Layout.app')

@section('title' , 'Admin')

@section('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
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
    <div class="container-fulid pt-3">
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
                                <label for="engine_malfunction" class="col-form-label">Engine Malfunction</label>
                                <textarea class="form-control valid-check" id="engine_malfunction" name="engine_malfunction" rows="1"></textarea>
                            </div>
                            <div class="mb-1">
                                <label for="paint_demage" class="col-form-label">Paint Demange</label>
                                <textarea class="form-control valid-check" name="paint_demage" id="paint_demage" rows="1"></textarea>
                            </div>
                            <div class="mb-1">
                                <label for="tv" class="col-form-label">TV Exception</label>
                                <textarea class="form-control valid-check" id="tv" name="tv" rows="1"></textarea>
                            </div>
                            <div class="mb-1">
                                <label for="suspection" class="col-form-label">Suspection</label>
                                <textarea class="form-control valid-check" id="suspection" name="suspection" rows="1"></textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-1">
                                    <label for="light" class="col-form-label">Lights</label>
                                    <textarea class="form-control valid-check" id="light" rows="1" name="light"></textarea>
                                </div>
                                <div class="col-md-6 mb-1">
                                    <label for="message-text" class="col-form-label">Addtional Exception</label>
                                    <textarea class="form-control valid-check" id="addtional_exception" rows="1" name="addtional_exception"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <div>
                                <input type="checkbox" name="all_good" value="all_good" class="form-check-input" id="all_good">
                                <label for="all_good" class="form-check-label fw-bold">All Fine ? </label>
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
                let valid = $('.valid-check');
                let allGood = $('#all_good');
                let checked = true ;
                $('.loading-bar').show();
                valid.each(function (index , element) {
                    let value = $(element).val().trim();
                    if(allGood.is(':checked') ) {
                        $(element).removeClass('is-invalid');
                        $(element).next('.error-message').remove();
                        $(element).val('');
                    }else {
                        if(value === "") {
                            $(element).next('.error-message').remove();
                            $(element).addClass('is-invalid');
                            var errorMessage = $('<p>').addClass('text-danger m-0 error-message').text('Your Value is not validate');
                            $(element).after(errorMessage);
                            checked = false ;
                        }else {
                            $(element).removeClass('is-invalid');
                            $(element).next('.error-message').remove();
                        }
                    };

                    
                });
                var formData = new FormData($('#uploadForm')[0]);
                
                if(checked) {
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
                }
            });
        });
    </script>
@endsection 