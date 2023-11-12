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
    </style>
@endsection 

@section('navbar') 
    @parent 
@endsection 

@section('page-name' , 'Car Models')

@section('content')
    <div class="container-fulid pt-3">
        <form action="{{url('admin/car_img')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="item_id" value="{{$car_datas['item_id']}}">
            <input type="hidden" name="owner_book_id" value="{{$car_datas['owner_book_id']}}">
            <div class="row mb-3" >
                <!-- img1 -->
                <div class="col-md-4 mb-3">
                    <label for="img1" class="w-100">
                        <input type="file" name="img[1]" id="img1" class="file-input">
                        <div class="card">
                            <div class="card-header">
                                <div class="text-center fw-bold">Font Images </div>
                            </div>
                            <div class="car-body ">
                                <div class="card-main bg-dark d-flex justify-content-center align-items-center img1">
                                    <p class="text-white">Please Chose Here</p>
                                </div>
                            </div>
                        </div>
                    </label>
                </div>
                <!-- img2 -->
                <div class="col-md-4 mb-3">
                    <label for="img2" class="w-100">
                        <input type="file" name="img[2]" id="img2" class="file-input">
                        <div class="card">
                            <div class="card-header">
                                <div class="text-center fw-bold">Back Images </div>
                            </div>
                            <div class="car-body ">
                                <div class="card-main bg-dark d-flex justify-content-center align-items-center img2">
                                    <p class="text-white">Please Chose Here</p>
                                </div>
                            </div>
                        </div>
                    </label>
                </div>
                <!-- img3 -->
                <div class="col-md-4 mb-3">
                    <label for="img3" class="w-100">
                        <input type="file" name="img[3]" id="img3" class="file-input">
                        <div class="card">
                            <div class="card-header">
                                <div class="text-center fw-bold">Side Images </div>
                            </div>
                            <div class="car-body ">
                                <div class="card-main bg-dark d-flex justify-content-center align-items-center img3">
                                    <p class="text-white">Please Chose Here</p>
                                </div>
                            </div>
                        </div>
                    </label>
                </div>
                <!-- img4 -->
                <div class="col-md-4 mb-3">
                    <label for="img4" class="w-100">
                        <input type="file" name="img[4]" id="img4" class="file-input">
                        <div class="card">
                            <div class="card-header">
                                <div class="text-center fw-bold">Side Images </div>
                            </div>
                            <div class="car-body ">
                                <div class="card-main bg-dark d-flex justify-content-center align-items-center img4">
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
                                <div class="card-main bg-dark d-flex justify-content-center align-items-center img5">
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
                                <div class="card-main bg-dark d-flex justify-content-center align-items-center img6">
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
                                <div class="card-main bg-dark d-flex justify-content-center align-items-center img7">
                                    <p class="text-white">Please Chose Here</p>
                                </div>
                            </div>
                        </div>
                    </label>
                </div>
                <!-- img8 -->
                <div class="col-md-4 mb-3">
                    <label for="img8" class="w-100">
                        <input type="file" name="img[8]" id="img8" class="file-input">
                        <div class="card">
                            <div class="card-header">
                                <div class="text-center fw-bold">Wheel Images </div>
                            </div>
                            <div class="car-body ">
                                <div class="card-main bg-dark d-flex justify-content-center align-items-center img8">
                                    <p class="text-white">Please Chose Here</p>
                                </div>
                            </div>
                        </div>
                    </label>
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-md-6"></div>
                <div class="col-md-6 text-end">
                    <button type="submit" class="btn btn-primary w-50">
                        Submit 
                    </button>
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
                        var image = ` <img id="imagePreview" class="object-fit-cover rounded" src="${e.target.result}" alt="Selected Photo" width="100%" height="100%"> ` ;
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
                        var image = ` <img id="imagePreview" class="object-fit-cover rounded" src="${e.target.result}" alt="Selected Photo" width="100%" height="100%"> ` ;
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
                        var image = ` <img id="imagePreview" class="object-fit-cover rounded" src="${e.target.result}" alt="Selected Photo" width="100%" height="100%"> ` ;
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
                        var image = ` <img id="imagePreview" class="object-fit-cover rounded" src="${e.target.result}" alt="Selected Photo" width="100%" height="100%"> ` ;
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
                        var image = ` <img id="imagePreview" class="object-fit-cover rounded" src="${e.target.result}" alt="Selected Photo" width="100%" height="100%"> ` ;
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
                        var image = ` <img id="imagePreview" class="object-fit-cover rounded" src="${e.target.result}" alt="Selected Photo" width="100%" height="100%"> ` ;
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
                        var image = ` <img id="imagePreview" class="object-fit-cover rounded" src="${e.target.result}" alt="Selected Photo" width="100%" height="100%"> ` ;
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
                        var image = ` <img id="imagePreview" class="object-fit-cover rounded" src="${e.target.result}" alt="Selected Photo" width="100%" height="100%"> ` ;
                        img8.append(image);
                    }
                    render.readAsDataURL(input.files[0]);
                }
            });

        });
    </script>
@endsection 