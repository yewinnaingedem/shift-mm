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
        .h-133 {
            height: 133px;
            overflow: hidden;
        }
        .object-contain {
            object-fit : contain ;
        }
        .carousel-inner {
            width : 70% ;
            margin : 0 auto ;
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
                <blockquote class="blockquote text-capitalize text-center mt-1">
                    <p class="fw-semibold">Daily Report For Admin ...</p>
                </blockquote>
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
                                    @php
                                        $brokerName = $soldOut->brokerName == "" ? false : true ;
                                    @endphp 

                                    <span class="fw-bold">{{$soldOut->dealerName}}</span>,  
                                    {{
                                        $brokerName ?  "represented by broker Mr." . $soldOut->brokerName : ""
                                    }}
                                    and {{$soldOut->by_name}} have agreed to the purchase of a <span class="fw-semibold"> {{$soldOut->year}} {{$soldOut->brand_name}}, {{ $soldOut->exterior_color }} in color, </span>
                                    equipped with additional features including a <span class="fw-semibold">{{$soldOut->noted}}.</span>
                                    <span class="seeMore cursor-pointer">....see more<i class="fa-solid fa-chevron-down"></i></span>
                                    <div class="main-content d-none">
                                    {{$soldOut->by_name}} has made a deposit of <span class="fw-semibold">{{$soldOut->depositAmount}}</span> Lakhs to secure the transaction until the deadline of
                                    <span class="fw-bold"> {{$soldOut->finalDate}} </span>
                                        Both parties commit to honoring the terms of the agreement, {{ $brokerName ? 'with Mr.'. $soldOut->brokerName : "" }} facilitating the transaction and
                                        serving as a point of contact for any inquiries.
                                    </div>
                                </div>
                            </p>
                        </div>
                        <div class="col-md-4 text-end d-flex justify-content-end align-items-center">
                            <div id="{{'imgFor'. $soldOut->imageId}}" class="carousel slide carousel-fade w-100 " data-bs-ride="carousel">
                                <div class="carousel-inner img-thumbnail h-133 ">
                                    <div class="carousel-item w-100 h-100 active">
                                        <img src="{{asset('storage/'.$soldOut->img1)}}" class="d-block object-contain h-100  w-100" alt="...">
                                    </div>
                                    <div class="carousel-item w-100 h-100">
                                        <img src="{{asset('storage/'.$soldOut->img2)}}" class="d-block object-contain h-100 w-100" alt="...">
                                    </div>
                                    <div class="carousel-item w-100 h-100">
                                        <img src="{{asset('storage/'.$soldOut->img3)}}" class="d-block object-contain h-100  w-100" alt="...">
                                    </div>
                                    <div class="carousel-item w-100 h-100">
                                        <img src="{{asset('storage/'.$soldOut->img4)}}" class="d-block object-contain h-100 w-100" alt="...">
                                    </div>
                                    <div class="carousel-item w-100 h-100">
                                        <img src="{{asset('storage/'.$soldOut->img5)}}" class="d-block object-contain h-100 w-100" alt="...">
                                    </div>
                                    <div class="carousel-item w-100 h-100">
                                        <img src="{{asset('storage/'.$soldOut->img6)}}" class="d-block object-contain h-100 w-100" alt="...">
                                    </div>
                                    <div class="carousel-item w-100 h-100">
                                        <img src="{{asset('storage/'.$soldOut->img7)}}" class="d-block object-contain h-100 w-100" alt="...">
                                    </div>
                                    <div class="carousel-item w-100 h-100">
                                        <img src="{{asset('storage/'.$soldOut->img8)}}" class="d-block object-contain h-100 w-100" alt="...">
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="{{'#imgFor'.$soldOut->imageId}}" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="{{'#imgFor'.$soldOut->imageId}}" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
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