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
            @foreach($todaySoldes as $soldOut)
            <div class="card bg-warning shadow mb-3">
                <div class="card-header fw-bold">
                    <div class="row">
                        <div class="col-md-6">
                            {{$soldOut->year}} / {{$soldOut->brand_name}} / {{$soldOut->license_plate}} 
                        </div>
                        <div class="col-md-6 text-end">
                            {{ $soldOut->dateTime}}
                        </div>
                    </div>
                </div>
                <div class="card-body row">
                    <div class="col-md-8">
                        <h5 class="card-title">
                            {{$soldOut->hp_loan}} with {{$soldOut->asdownpayment}} Downpayment within {{$soldOut->loan_month}}
                        </h5>
                        <p class="card-text">
                            <div class="sale-agreement">
                                Mr. U Soe Thiha Naung, represented by broker Mr. Kyaw Min Htike, 
                                and {{$soldOut->by_name}} have agreed to the purchase of a <span class="fw-semibold"> {{$soldOut->year}} {{$soldOut->brand_name}}, silver in color, </span>
                                equipped with additional features including a <span class="fw-semibold">{{$soldOut->noted}}.</span>
                                <span class="seeMore cursor-pointer">....see more<i class="fa-solid fa-chevron-down"></i></span>
                                <div class="main-content d-none">
                                {{$soldOut->by_name}} has made a deposit of <span class="fw-semibold">{{$soldOut->depositAmount}}</span> Lakhs to secure the transaction until the deadline of
                                <span class="fw-bold"> {{$soldOut->finalDate}} </span>
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