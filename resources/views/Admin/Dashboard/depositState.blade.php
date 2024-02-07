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
        .fs-20 {
            font-size : 20px ;
        }
        .fs-18 {
            font-size : 18px ;
        }
        .mx-auto {
            margin : 0 auto ;
        }
        .h-100px {
            height: 100px;
        }
        .fs-15 {
            font-size : 10px ;
        }
        .bottom-27px {
            bottom : -27px ;
        }
        .right-0 {
            right : 0px ;
            margin-right : 3px ;
        }
        .left-5px {
            left : 0px ;
        }
        .fs-20 {
            font-size : 20px ;
        }
    </style>
@endsection 

@section('navbar') 
    @parent 
@endsection 

@section('page-name' , 'Car Models')

@section('content')
    <div class="container my-3">
        <blockquote class="blockquote text-center fs-20">
            <p class="fw-semibold">This is the Deposit Panding State</p>
        </blockquote>
        <div class="panding-container">
            @foreach($depositStates as $deposits)
            <div class="row w-100 mx-auto mb-3">
                <div class="col-md-12 w-100 h-100px row p-3 rounded bg-danger shadow deposit">
                    <div class="col-md-8 fs-18 d-flex justify-content-start align-items-center">
                        <div class="text-black fw-semibold">
                            <figure>
                                <blockquote class="blockquote">
                                    <p>{{$deposits->name}} Bought {{ $deposits->brandName}} With <span class="depositAmount">{{$deposits->depositAmount}}</span></p>
                                </blockquote>
                                <figcaption class="blockquote-footer bg-info  px-2 rounded text-black">
                                    {{$deposits->brandName}} <span class="fw-bold">{{$deposits->license_plate}}--</span> <cite title="Source Title "class="date">{{$deposits->finalDate}}</cite>
                                </figcaption>
                            </figure>
                        </div>
                    </div>
                    <div class="col-md-4  text-center d-flex justify-content-end align-items-center">
                        <div class="fw-bold w-50 h-100 rounded bg-white fs-20">
                            <div class="w-100">
                                <span class="position-relative w-25">
                                    <span class="days"></span>
                                    <span class="position-absolute fw-semibold bottom-27px fs-15 right-0 daysText text-center"></span>
                                </span>
                                <span class="position-relative w-25">
                                    <span class="hours"></span>
                                    <span class="position-absolute fw-semibold bottom-27px fs-15 right-0 hoursText text-center"></span>
                                </span>
                                <span class="position-relative w-25">
                                    <span class="minutes"></span>
                                    <span class="position-absolute fw-semibold bottom-27px fs-15 right-0 minsText text-center"></span>
                                </span>
                                <span class="position-relative w-25">
                                    <span class="seconds"></span>
                                    <span class="position-absolute bottom-27px fw-semibold fs-15 left-5px secondsText text-center"></span>
                                </span>
                            </div>
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
        $(document).ready(()=> {
            let deposit = $('.deposit');
            deposit.each(function (index , element ) {
                var dateIn = $(element).find('.date').text();
                var daysIn = $(element).find('.days');
                var hoursIn = $(element).find('.hours');
                var minutesIn = $(element).find('.minutes');
                var secondsIn = $(element).find('.seconds');
                var depositAmount = $(element).find('.depositAmount');
                var value = depositAmount.text().trim() ;
                var deadline = new Date(dateIn).getTime();

                var amount  = Number(value).toLocaleString();
                depositAmount.text(amount);
                var x = setInterval(() => {
                    var  now = new Date().getTime();
                    var distance = deadline  - now ;
                    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                    
                    daysIn.text(days + " :");
                    hoursIn.text(hours + " :");
                    minutesIn.text(minutes + " :");
                    secondsIn.text(seconds );

                    $('.daysText').text('Days');
                    $('.hoursText').text('Hours');
                    $('.minsText').text('Mins');
                    $('.secondsText').text('Seconds');
                    if(distance < 0) {
                        clearInterval(x);
                        console.log('Expired');
                    }
                }, 1000);
            });
        });
    </script>
@endsection 