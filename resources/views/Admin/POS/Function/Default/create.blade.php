@extends('Admin.Layout.app')

@section('title' , 'Admin')

@section('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <style>
        .yes-no {
            padding : 8px 20px;
            border : 1px solid gray ;
            background : #18222e ;
            outline : none ;
            color : white ;
            font-size : 18px ;
        }
        .bg-main {
            background :  #06CBA3;
        }
        .ques {
            font-size : 18px ;
        }
        .ml-3 {
            margin-left : 8px ;
        }
    </style>
@endsection 

@section('navbar') 
    @parent 
@endsection 

@section('page-name' , 'Car Models')

@section('content')
    <div class="container mt-3  pt-3" >
        
        <form action="{{url('admin/default-function')}}"  method="post">
            @csrf 
            <div class="">
                <p class="fw-bold ques"> Does Air Conditioniong have as a default ?</p>
                <div class="ml-3">
                    <label for="ac_yes" class="rounded yes-no"> 
                        <input type="radio" class="d-none" name="ac" value="TRUE" id="ac_yes">
                        <div class="fw-bold">
                            Yes 
                        </div>
                    </label>
                    <label for="ac_no" class="rounded yes-no"> 
                        <input type="radio" class="d-none" name="ac" value="FALSE" id="ac_no">
                        <div class="fw-bold">
                            No
                        </div>
                    </label>
                </div>
            </div>
            <hr>
            <div class="mb-3">
                <p class="fw-bold ques">Does Power Steering have as a default?</p>
                <div class="ml-3">
                    <label for="ps_yes" class="rounded yes-no"> 
                        <input type="radio" class="d-none" name="power_steering" value="TRUE" id="ps_yes">
                        <div class="fw-bold">
                            Yes 
                        </div>
                    </label>
                    <label for="ps_no" class="rounded yes-no"> 
                        <input type="radio" class="d-none" name="power_steering" value="FALSE" id="ps_no">
                        <div class="fw-bold">
                            No
                        </div>
                    </label>
                </div>
            </div>
            <hr>
            <div class="mb-3">
                <p class="fw-bold ques">Does Power Window have for all doors as a default?</p>
                <div class="ml-3">
                    <label for="pw_yes" class="rounded yes-no"> 
                        <input type="radio" class="d-none" name="power_windows" value="TRUE" id="pw_yes">
                        <div class="fw-bold">
                            Yes 
                        </div>
                    </label>
                    <label for="pw_no" class="rounded yes-no"> 
                        <input type="radio" class="d-none" name="power_windows" value="FALSE" id="pw_no">
                        <div class="fw-bold">
                            No
                        </div>
                    </label>
                </div>
            </div>
            <hr>
            <div class="mb-3">
                <p class="fw-bold ques">Does ABS Breaks have for all doors as a default?</p>
                <div class="ml-3">
                    <label for="abs_yes" class="rounded yes-no"> 
                        <input type="radio" class="d-none" name="abs_brakes" value="TRUE" id="abs_yes">
                        <div class="fw-bold">
                            Yes 
                        </div>
                    </label>
                    <label for="abs_no" class="rounded yes-no"> 
                        <input type="radio" class="d-none" name="abs_brakes" value="FALSE" id="abs_no">
                        <div class="fw-bold">
                            No
                        </div>
                    </label>
                </div>
            </div>
            <hr>
            <div class="mb-3">
                <p class="fw-bold ques">Does Air Bags have for It as a default?</p>
                <div class="ml-3">
                    <label for="air_yes" class="rounded yes-no"> 
                        <input type="radio" class="d-none" name="airbags" value="TRUE" id="air_yes">
                        <div class="fw-bold">
                            Yes 
                        </div>
                    </label>
                    <label for="air_no" class="rounded yes-no"> 
                        <input type="radio" class="d-none" name="airbags" value="FALSE" id="air_no">
                        <div class="fw-bold">
                            No
                        </div>
                    </label>
                </div>
            </div>
            <hr>
            <div class="mb-3">
                <p class="fw-bold ques">Does navigation_system have for It as a default?</p>
                <div class="ml-3">
                    <label for="nav_yes" class="rounded yes-no"> 
                        <input type="radio" class="d-none" name="navigation_system" value="TRUE" id="nav_yes">
                        <div class="fw-bold">
                            Yes 
                        </div>
                    </label>
                    <label for="nav_no" class="rounded yes-no"> 
                        <input type="radio" class="d-none" name="navigation_system" value="FALSE" id="nav_no">
                        <div class="fw-bold">
                            No
                        </div>
                    </label>
                </div>
            </div>
            <hr>
            <div class="mb-3">
                <p class="fw-bold ques">Does bluetooth_connectivity have for It as a default?</p>
                <div class="ml-3">
                    <label for="blue_yes" class="rounded yes-no"> 
                        <input type="radio" class="d-none" name="bluetooth_connectivity" value="TRUE" id="blue_yes">
                        <div class="fw-bold">
                            Yes 
                        </div>
                    </label>
                    <label for="blue_no" class="rounded yes-no"> 
                        <input type="radio" class="d-none" name="bluetooth_connectivity" value="FALSE" id="blue_no">
                        <div class="fw-bold">
                            No
                        </div>
                    </label>
                </div>
            </div>
            <hr>
            <div class="mb-3 row">
                <div class="col-md-6">
                    <button class="btn btn-primary">Sumbit</button>
                </div>
                <div class="col-md-6 text-end">
                    <a href="{{url('admin/default-function')}}" class="btn btn-primary mb-3">
                        <i class="fa-sharp fa-solid fa-backward"></i>
                        <span>Back </span>
                    </a>
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
        $(document).ready(()=>{
            var $focusIn = $('input[name="function"]');
            $focusIn.focus();
            $('input[name="ac"]').on('change', function () {
                $('input[name="ac"]').parent().removeClass('bg-main');
                if ($(this).is(':checked')) {
                    $(this).parent().addClass('bg-main');
                }
            });
            $('input[name="power_steering"]').on('change', function () {
                $('input[name="power_steering"]').parent().removeClass('bg-main');
                if ($(this).is(':checked')) {
                    $(this).parent().addClass('bg-main');
                }
            });
            $('input[name="power_windows"]').on('change', function () {
                $('input[name="power_windows"]').parent().removeClass('bg-main');
                if ($(this).is(':checked')) {
                    $(this).parent().addClass('bg-main');
                }
            });
            $('input[name="abs_brakes"]').on('change', function () {
                $('input[name="abs_brakes"]').parent().removeClass('bg-main');
                if ($(this).is(':checked')) {
                    $(this).parent().addClass('bg-main');
                }
            });
            $('input[name="airbags"]').on('change', function () {
                $('input[name="airbags"]').parent().removeClass('bg-main');
                if ($(this).is(':checked')) {
                    $(this).parent().addClass('bg-main');
                }
            });
            $('input[name="navigation_system"]').on('change', function () {
                $('input[name="navigation_system"]').parent().removeClass('bg-main');
                if ($(this).is(':checked')) {
                    $(this).parent().addClass('bg-main');
                }
            });
            $('input[name="bluetooth_connectivity"]').on('change', function () {
                $('input[name="bluetooth_connectivity"]').parent().removeClass('bg-main');
                if ($(this).is(':checked')) {
                    $(this).parent().addClass('bg-main');
                }
            });
        });
    </script>
@endsection 