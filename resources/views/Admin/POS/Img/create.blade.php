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
            <div class="mb-3 ">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" >Submit </button>
            </div>
        </form>
    </div>
    <!-- Bootstrap Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Report Demange For <span class="fw-bold text-danger">Accent</span></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-1">
                        <div class="row">
                            <div class="col-md-6 ">
                                <label for="recipient-name" class="col-form-label">Engine Malfunction</label>
                            </div>
                            <div class="col-md-6  form-switch d-flex justify-content-end align-items-center">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" name="recipient_name" type="checkbox" role="switch" id="recipient_name" >
                                    <label class="form-check-label fw-bold text-danger" for="recipient_name">Good ?</label>
                                </div>
                            </div>
                        </div>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="recipient" rows="1"></textarea>
                    </div>
                    <div class="mb-1">
                        <div class="row">
                            <div class="col-md-6 ">
                                <label for="message-text" class="col-form-label">Paint Demange</label>
                            </div>
                            <div class="col-md-6  form-switch d-flex justify-content-end align-items-center">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" >
                                    <label class="form-check-label fw-bold text-danger" for="flexSwitchCheckChecked">Good ?</label>
                                </div>
                            </div>
                        </div>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
                    </div>
                    <div class="mb-1">
                        <div class="row">
                            <div class="col-md-6 ">
                                <label for="message-text" class="col-form-label">TV Exception</label>
                            </div>
                            <div class="col-md-6  form-switch d-flex justify-content-end align-items-center">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" >
                                    <label class="form-check-label fw-bold text-danger" for="flexSwitchCheckChecked">Good ?</label>
                                </div>
                            </div>
                        </div>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
                    </div>
                    <div class="mb-1">
                        <div class="row">
                            <div class="col-md-6 ">
                                <label for="message-text" class="col-form-label">Suspection</label>
                            </div>
                            <div class="col-md-6  form-switch d-flex justify-content-end align-items-center">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" >
                                    <label class="form-check-label fw-bold text-danger" for="flexSwitchCheckChecked">Good ?</label>
                                </div>
                            </div>
                        </div>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
                    </div>
                    <div class="mb-1">
                        <div class="row">
                            <div class="col-md-6 ">
                                <label for="message-text" class="col-form-label">Addtional Exception</label>
                            </div>
                            <div class="col-md-6  form-switch d-flex justify-content-end align-items-center">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" >
                                    <label class="form-check-label fw-bold text-danger" for="flexSwitchCheckChecked">Good ?</label>
                                </div>
                            </div>
                        </div>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Send message</button>
            </div>
            </div>
        </div>
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

            var malfunction = $('input[name="recipient_name"]');
            $(document).on('change', malfunction , function () {
                if (malfunction.is(':checked')) {
                    $('#exampleFormControlTextarea1').prop('disabled', true);
                    malfunction.val('none');
                    $('#exampleFormControlTextarea1').addClass('cursor-not-allowed');
                } else {
                    $('#exampleFormControlTextarea1').prop('disabled', false);
                    malfunction.val(' ');
                    $('#exampleFormControlTextarea1').removeClass('cursor-not-allowed');
                }
                console.log(malfunction.val());
            });
            
            var malfunction = $('input[name="recipient_name"]');
            $(document).on('change', malfunction , function () {
                if (malfunction.is(':checked')) {
                    $('#exampleFormControlTextarea1').prop('disabled', true);
                    $('#exampleFormControlTextarea1').addClass('cursor-not-allowed');
                } else {
                    $('#exampleFormControlTextarea1').prop('disabled', false);
                    $('#exampleFormControlTextarea1').removeClass('cursor-not-allowed');
                }
            });

            var malfunction = $('input[name="recipient_name"]');
            $(document).on('change', malfunction , function () {
                if (malfunction.is(':checked')) {
                    $('#exampleFormControlTextarea1').prop('disabled', true);
                    $('#exampleFormControlTextarea1').addClass('cursor-not-allowed');
                } else {
                    $('#exampleFormControlTextarea1').prop('disabled', false);
                    $('#exampleFormControlTextarea1').removeClass('cursor-not-allowed');
                }
            });
        });
    </script>
@endsection 