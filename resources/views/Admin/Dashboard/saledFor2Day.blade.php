@extends('Admin.Layout.app')

@section('title' , 'Admin')

@section('style')
    <style>
        .cursor-pointer {
            cursor: pointer;
        }
        .sale-agreement {
            line-height: 1.6;
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
            @foreach($todaySoldes as soldOut)
            <div class="card bg-warning shadow">
                <div class="card-header fw-bold">
                    <div class="row">
                        <div class="col-md-6">
                            2012 / Accent / 5Q-1589 
                        </div>
                        <div class="col-md-6 text-end">
                            {{ $soldOut->created_at }}
                        </div>
                    </div>
                </div>
                <div class="card-body row">
                    <div class="col-md-8">
                        <h5 class="card-title">
                            Yoma HP with 30% Downpayment within 5 years 
                        </h5>
                        <p class="card-text">
                            <div class="sale-agreement">
                                Mr. U Soe Thiha Naung, represented by broker Mr. Kyaw Min Htike, 
                                and ABC Motors have agreed to the purchase of a <span class="fw-semibold"> 2023 Toyota Camry, silver in color, </span>
                                equipped with additional features including a <span class="fw-semibold">front bumper, TV, air conditioning, and back suspension.</span>
                                <span class="seeMore cursor-pointer">....see more<i class="fa-solid fa-chevron-down"></i></span>
                                <div class="main-content d-none">
                                ABC Motors has made a deposit of <span class="fw-semibold">10000</span> Lakhs to secure the transaction until the deadline of
                                <span class="fw-bold"> May 15, 2024. </span>
                                Both parties commit to honoring the terms of the agreement, with Mr. Kyaw Min Htike facilitating the transaction and
                                serving as a point of contact for any inquiries.
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
            @endforeach
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
                var mainContent = currentTarget.parent().find('.main-content').toggleClass('d-none');
                if(mainContent.hasClass('d-none')) {
                    mainContent.slideDown();
                }
            });
            let mainContent = $('.main-content');
            if(mainContent.text().length > 300) {

            }
        });
    </script>    
@endsection 