@extends('Admin.Layout.app')

@section('title' , 'Admin')

@section('style')
    <style>
        .cursor-pointer {
            cursor: pointer;
        }
    </style>
@endsection 

@section('navbar') 
    @parent 
@endsection 

@section('page-name' , 'Car Models')

@section('content')
    <div class="container my-3">
        <div class="row">
            <div class="col-md-6 d-flex jsutify-content-center align-items-center">
                <div class="text-capitalize fs-5 fw-semibold ">
                    This is the sale report for today
                </div>
            </div>
            <div class="col-md-6 text-end">
                <a href="{{url('admin/dashbord')}}" class="btn btn-danger">
                    <i class="fa-solid fa-hand me-2"></i> 
                    <span class="fw-semibold">Back</span>
                </a>
            </div>
        </div>
        <div class="card-contaier mt-3">
            <div class="card bg-warning shadow">
                <div class="card-header fw-bold">
                    <div class="row">
                        <div class="col-md-6">
                            2012 / Accent / 5Q-1589 
                        </div>
                        <div class="col-md-6 text-end">
                            2024 / 02 / 01 
                        </div>
                    </div>
                </div>
                <div class="card-body row">
                    <div class="col-md-8">
                        <h5 class="card-title">
                            Yoma HP with 30% Downpayment within 5 years 
                        </h5>
                        <p class="card-text">
                            <div>
                                U Soe Thiha Naung saled this car Deposit 10000 Lakhs death line 2024-5-15  <span class="seeMore cursor-pointer">....see more<i class="fa-solid fa-chevron-down"></i></span>
                            </div>
                            <div class="main-content d-none">
                                <ul class="text-white">
                                    <li>Font Bumper</li>
                                    <li>TV</li>
                                    <li>Aircon Back</li>
                                    <li>Suspension</li>
                                </ul>
                                <div class="fw-bold">
                                    Agreed with U Soe Thi Ha Aung 
                                </div>
                            </div>
                        </p>
                    </div>
                    <div class="col-md-4 text-end d-flex justify-content-end align-items-center">
                        <div>
                            <a href="#" class="btn btn-primary">See Car What it was </a>
                        </div>
                    </div>
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
        $(document).ready(function () {
            let $seeMore = $('.seeMore');
            $(document).on('click' , '.seeMore' , function (e) {
                let currentTarget = $(e.currentTarget);
                currentTarget.toggleClass('d-none');
                var mainContent = currentTarget.parent().parent().find('.main-content').toggleClass('d-none');
                if(mainContent.hasClass('d-none')) {
                    mainContent.slideDown();
                }
            });
        });
    </script>    
@endsection 