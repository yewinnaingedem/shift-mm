@extends('MM.Layout.app')
@section('title' , 'MM | Financing') 

@section('style') 
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200;0,6..12,300;0,6..12,400;0,6..12,500;1,6..12,200;1,6..12,300;1,6..12,400;1,6..12,500&family=Poppins:ital,wght@0,300;0,500;1,200;1,300&display=swap');
        .hover-main-color {
            border-color : #06CBA3 ;
        }
        #makes_ho:hover {

        }
        .bg-main{
            background : #06CBA3 ;
        }
        .hero-section {
            background-image : linear-gradient(#ecf9f7,#fff);
        }
        .main-font {
            font-family: 'Poppins', sans-serif;
        }
        #rotate {
            transform : translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(-5deg) skew(0deg, 0deg);
        }
        .caculator {
            background : #232d3e ;
        }
        .bg-secondary-100 {
            background :#232D3E ;
        }
        .makes:before , .el_hy:before , .luxury:before , .coupe:before , .sedan:before , .suv:before , .truck:before  , .hatchback:before , .van:before , .convertibles:before , .hatchback:before {
            position: absolute;
            content : "" ;
            width : 0% ;
            height: 5px;
            left : 0 ;
            bottom : -12px ;
            border-radius : 5px ;
            background : #06CBA3 ;
        }
        .makes:hover:before  , .el_hy:hover:before , .luxury:hover:before , .coupe:hover:before , .sedan:hover:before , .suv:hover:before , .truck:hover:before  , .hatchback:hover:before , .van:hover:before , .convertibles:hover:before {
            width : 100% ;
        }
    </style>
@endsection 

@section('nav-bar') 
    @parent 
@endsection 

@section('search-1')

@endsection 

@section('content') 
    <main class="sticky top-[60px] z-50">
        <div class="block px-5 pt-2 bg-white border-b-2 relative border-gray-300">
            <div class="flex items-center justify-between ">
                <div id="makes" class="pb-3 border-b-0  ">
                    <div class="relative makes">makes</div>
                </div>
                <div id="el_hy" class="pb-3 border-b-0  ">
                    <div class="el_hy relative" >Electric / Hybird </div>
                </div>
                <div id="luxury" class="pb-3 border-b-0">
                    <div class="luxury relative" >Luxury</div>
                </div>
                <div id="sedan" class="pb-3 border-b-0   ">
                    <div class="sedan relative" >Sedan</div>
                </div>
                <div id="coupe" class="pb-3 border-b-0   ">
                    <div class="coupe relative" >Coupe</div>
                </div>
                <div id="suv" class="pb-3 border-b-0   ">
                    <div class="suv relative">SUV</div>
                </div>
                <div id="truck" class="pb-3 border-b-0   ">
                    <div class="truck relative">Truck</div>
                </div>
                <div id="van" class="pb-3 border-b-0   ">
                    <div class="van relative">Van</div>
                </div>
                <div id="convertibles" class="pb-3 border-b-0   ">
                    <div class="convertibles relative">Convertibles</div>
                </div>
                <div id="hatchback" class="pb-3 border-b-0   ">
                    <div class="hatchback relative">Hatchback</div>
                </div>
            </div>
            <div class="px-5 bg-white absolute top-[45px] z-30 block w-full left-0 ">
                <div class="z-50" id="makes_ho">
                    
                </div>
            </div>
        </div>
    </main>
    <div class="pt-[98px] overflow-hidden pb-[125px] hero-section">
        <div class="mx-auto mt-0 max-w-[1300px]">
            <div class="grid grid-cols-2 ">
                <div class="pr-10">
                    <h1 class="text-[65px] font-bold main-font" >Smiple , Flexible  Financing</h1>
                    <div class="main-font mt-3 mb-3">
                        <p class="text-[15px] font-bold">Get multiple competitive loan offers on the car you want, all in one easy go. Start by getting pre-qualified to see accurate monthly payment estimates while you shop.</p>
                    </div>
                    <div class="mt-5">
                        <a href="" class="px-4 py-3 font-bold bg-main rounded-md border border-gray-400 ">Get Pre-Qualifed</a>
                    </div>
                </div>
                <div>
                    <div class="flex justify-center items-center flex-row">
                        <div class="flex items-center justify-center  relative">
                            <img id="rotate" src="{{asset('storage/svg/background.svg')}}" alt="">
                            <img id="rotate" src="{{asset('storage/svg/bg_car.svg')}}" class="absolute bottom-[75px] left-[90px]" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-gray-200 px-5">
        <div class="pt-[60px] pb-5">
            <h1 class="text-center font-bold text-[35px] font-main mb-4">Reasons to Shift The Way You Finance</h1>
            <div class="grid grid-cols-3 gap-4 ">
                <div class="p-[28px] font-main bg-white rounded-lg shadow-md hover:shadow-lg">
                    <h5 class="main-color font-bold mb-2 ">Fast and Easy Experience</h5>
                    <p class="text-gray-400 font-bold text-sm">On average, our customers get their vehicles 2 to 3 days faster when financing through Shift.</p>
                </div>
                <div class="p-[28px] font-main bg-white rounded-lg shadow-md hover:shadow-lg">
                    <h5 class="main-color font-bold mb-2 ">Qualified Offers in Minutes</h5>
                    <p class="text-gray-400 font-bold text-sm">The lenders we partner with are specialized to meet your expectations for buying a car.</p>
                </div>
                <div class="p-[28px] font-main bg-white shadow-md rounded-lg hover:shadow-lg">
                    <h5 class="main-color font-bold mb-2 ">Nationwide Lender Network</h5>
                    <p class="text-gray-400 font-bold text-sm">Our nationally recognized lenders compete with each other and the greater market to get you the best offers.</p>
                </div>
                <div class="p-[28px] font-main bg-white shadow-md rounded-lg hover:shadow-lg">
                    <h5 class="main-color font-bold mb-2 ">Simple Interest Loans</h5>
                    <p class="text-gray-400 font-bold text-sm">Your interest is based on the principal you borrow, so you can owe less by paying off your loan early.</p>
                </div>
                <div class="p-[28px] font-main bg-white shadow-md rounded-lg hover:shadow-lg">
                    <h5 class="main-color font-bold mb-2 ">Minimal Credit Score Impact</h5>
                    <p class="text-gray-400 font-bold text-sm">Once you have applied, qualified, and signed, we then consolidate multiple credit inquiries into one.</p>
                </div>
                <div class="p-[28px] font-main bg-white shadow-md rounded-lg hover:shadow-lg">
                    <h5 class="main-color font-bold mb-2 ">Dedicated Financial Advisors</h5>
                    <p class="text-gray-400 font-bold text-sm">If you need some help, advice or clarification, we’re here to help you every step of the way.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Attration -->
    <div class="bg-white px-5">
        <div class="py-[35px]">
            <h1 class="font-bold font-main text-[35px] mb-5 text-center text-gray-900">Make it Yours With Zero Hidden Fees</h1>
            <div class="grid grid-cols-2 gap-5 px-[25%]">
                <div class="flex flex-col items-start">
                    <div class="border rounded-full  w-[40px] h-[40px] flex justify-center items-center bg-main font-bold text-2xl mb-2">1</div>
                    <h1 class="font-bold text-gray-700 mb-3 mt-2 text-xl">Get Pre-Qualified</h1>
                    <div class="font-bold text-gray-500  ">
                        <p class="text-sm">Input a few basic details about yourself and your budget to see more realistic monthly payments on every car as you shop.</p>
                    </div>
                </div>
                <div class="flex flex-col items-start">
                    <div class="border rounded-full  w-[40px] h-[40px] flex justify-center items-center bg-main mb-2 font-bold text-2xl">2</div>
                    <h1 class="font-bold text-gray-700 mb-3 mt-2 text-xl">Complete Your Application</h1>
                    <div class="font-bold text-gray-500  ">
                        <p class="text-sm">Whether buying online or in-store at a Shift location, choose to finance the car you want and complete your application during checkout.</p>
                    </div>
                </div>
                <div class="flex flex-col items-start">
                    <div class="border rounded-full  w-[40px] h-[40px] flex justify-center items-center bg-main mb-2 font-bold text-2xl">3</div>
                    <h1 class="font-bold text-gray-700 mb-3 mt-2 text-xl">Review Your Loan Offers</h1>
                    <div class="font-bold text-gray-500  ">
                        <p class="text-sm">We’ll then curate the best offers from our network of trusted lenders. Take a beat to review and ask as many questions as you d like. (We re here to help!)</p>
                    </div>
                </div>
                <div class="flex flex-col items-start">
                    <div class="border rounded-full  w-[40px] h-[40px] flex justify-center items-center bg-main mb-2 font-bold text-2xl">4</div>
                    <h1 class="font-bold text-gray-700 mb-3 mt-2 text-xl">Lock in Your Loan</h1>
                    <div class="font-bold text-gray-500  ">
                        <p class="text-sm">Choose the loan offer and monthly payment that’s right for you, lock it in with your Shift Advisor, and then finalize your purchase.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Customer Rate -->
    <div class="bg-gray-500 px-5 rounded-md hero-section">
        <div class="grid grid-cols-2 px-[50px] py-[30px] gap-3" >
            <div class="py-[30px]">
                <div class="flex justify-center items-center font-bold  text-[50px]">
                    <h1 class="font-extrabold">9</h1>
                    <div>/</div>
                    <h1>10</h1>
                </div>
                <div class="text-[30px]   text-center font-bold">
                    <h1>Customers Who Finance Choose <a href="" class="main-color font-bold">Shift </a></h1>
                </div>
            </div>
            <div class="py-[30px]  flex justify-center items-center font-bold">
                <p>That is because we have honed and refined the process to make financing your vehicle a breeze. We curate your offers from our nationwide network of lenders who all competing to get you the best rate. And, our team of financing experts are always just a phone call away to help.</p>
            </div>
        </div>
    </div>
    <!-- Custormer Review -->
    <div class="px-5 bg-white">
        <div>
            <h1 class="text-center font-bold mb-3 text-[35px] ">Customers Love Our Easy Financing Process</h1>
            <div class="grid grid-cols-5 py-7">
                <div class="col-span-1 flex justify-center flex-col items-center">
                    <div class="font-semibold mb-2">
                        <h1 class="text-center">Greate</h1>
                    </div>
                    <div class="flex justify-center items-center mb-2">
                        <div class="w-[25px] h-[25px] justify-center bg-main rounded-sm flex items-center mr-0.5 "><i class="fa-solid fa-star text-white" ></i></div>
                        <div class="w-[25px] h-[25px] justify-center bg-main rounded-sm flex items-center mr-0.5"><i class="fa-solid fa-star text-white" ></i></div>
                        <div class="w-[25px] h-[25px] justify-center bg-main rounded-sm flex items-center mr-0.5"><i class="fa-solid fa-star text-white" ></i></div>
                        <div class="w-[25px] h-[25px] justify-center bg-main rounded-sm flex items-center mr-0.5"><i class="fa-solid fa-star text-white" ></i></div>
                        <div class="w-[25px] h-[25px] justify-center bg-gray-300  rounded-sm flex items-center mr-0.5"><i class="fa-solid fa-star text-white" ></i></div>
                    </div>
                    <div class="flex items-center justify-center text-xs mb-2">
                        <p>Based On <span class="underline pb-2 font-semibold ">740 reviews</span></p>
                    </div>
                    <div class="flex items-center justify-center text-[30px] font-bold">
                        <i class="fa-regular fa-star main-color "></i>
                        <a href="" class="font-bold text-black text-xl ">TustPoint</a>
                    </div>
                </div>
                <div class="col-span-4">
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Qui accusamus voluptatibus distinctio iure deleniti eum explicabo perferendis illo ex quod doloribus, saepe alias. Voluptates possimus ipsum ratione commodi eum amet!</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Pricing caculator -->
    <div class="caculator px-5 rounded-sm">
        <div class="py-[25px]">
            <h1 class="text-center font-bold text-[35px] text-white mb-2 ">Pricing Calculator</h1>
            <h1 class="text-center font-bold text-[25px] text-white mb-3">Enter a few details to shop for vehicles within your budget.</h1>
            <div class="grid grid-cols-2 gap-5 ">
                <div class="bg-white rounded-md px-3 py-7 h-[400px]">
                    <div class="flex border-b-2 justify-between border-gray-300 mb-3 pb-3">
                        <div class="w-[50%] text-center">Monthly Loan Payments </div>
                        <div class="w-[50%] text-center">Total Vehicle Budget </div>
                    </div>
                    <!-- Vehicle Price -->
                    <div class="mb-3">
                        <div class="flex items-center justify-between mb-2">
                            <div class="font-bold text-xl text-gray-600">Vehicle Price</div>
                            <div> <span id="pirceID" class="font-extrabold"></span> <span class="ml-2 font-bold">Lakhs</span></div>
                        </div>
                        <div class="w-full ">
                            <input class="block w-full" type="range" name="priceRange" min="200" max="3500" value="500">
                        </div>
                    </div>
                    <!-- Loan Month -->
                    <div class="mb-3">
                        <div class="flex items-center justify-between mb-2">
                            <div class="font-bold text-xl text-gray-600">Loan Length Months </div>
                        </div>
                        <div class="flex items-center w-full  mx-auto mb-3">
                                <div class="w-[33%] border rounded-l-lg flex justify-center items-center bg-secondary-100 text-white py-2">
                                    <div class="inline-block mr-2">36</div> 
                                    <div class="inline-block font-bold">Months</div>
                                </div>
                                <div class="w-[33%] border  flex justify-center items-center bg-secondary-100 text-white py-2">
                                    <div class="inline-block mr-2">48</div>
                                    <div class="inline-block font-bold">Months</div>
                                </div>
                                <div class="w-[33%] border rounded-r-lg flex justify-center items-center bg-secondary-100 text-white py-2">
                                    <div class="inline-block mr-2">60</div>
                                    <div class="inline-block font-bold">Months</div>
                                </div>
                            </div>
                    </div>
                    <!-- DownPayment -->
                    <div class="mb-3">
                        <div class="flex items-center justify-between mb-2">
                            <div class="font-bold text-xl text-gray-600">DownPayment </div>
                        </div>
                        <div class="flex items-center w-full  mx-auto mb-3">
                                <div class="w-[33%] border rounded-l-lg flex justify-center items-center bg-secondary-100 text-white py-2">
                                    <div class="inline-block mr-2">30</div> 
                                    <div class="inline-block font-bold">%</div>
                                </div>
                                <div class="w-[33%] border  flex justify-center items-center bg-secondary-100 text-white py-2">
                                    <div class="inline-block mr-2">40</div>
                                    <div class="inline-block font-bold">%</div>
                                </div>
                                <div class="w-[33%] border rounded-r-lg flex justify-center items-center bg-secondary-100 text-white py-2">
                                    <div class="inline-block mr-2">50</div>
                                    <div class="inline-block font-bold">%</div>
                                </div>
                            </div>
                    </div>
                </div>
                <!-- another content -->
                <div class="flex flex-col items-start bg-white w-full h-[400px] rounded-lg overflow-hidden">
                    <div class="bg-main w-full h-[25%] flex items-center justify-center text-white">
                        <h1 class="font-bold text-[35px]">Summary </h1>
                    </div>
                    <div class='h-[50%] w-full px-3 '>
                        <div class="py-3">
                            <div class="flex justify-between items-center ">
                                <div class="font-bold text-lg text-gray-700">Vehicle Price</div>
                                <div> <span id="vehiclePrice" class="font-extrabold"></span> <span class="ml-1 font-semibold">Kyats</span></div>
                            </div>
                            <div class="flex justify-between items-center ">
                                <div class="font-bold text-lg text-gray-700">Down Payments</div>
                                <div> <span id="DownPayment" class='font-bold'></span> <span class="ml-1 font-semibold">Kyats</span></div>
                            </div>
                            <div class="flex justify-between items-center ">
                                <div class="font-bold text-lg text-gray-700">Interest Rate</div>
                                <div><span class="text-xl text-gray-900 font-bold">10</span> <span class="ml-1">%</span></div>
                            </div>
                            <div class="flex justify-between items-center ">
                                <div class="font-bold text-lg text-gray-700 ">Loan Amout</div>
                                <div><span id="loanAmount" class="font-bold"></span> <span class="ml-1">Kyats</span></div>
                            </div>
                            <hr class="mt-3">
                            <div class="grid grid-cols-3 pt-3">
                                <div class="flex flex-col col-span-2  justify-start items-center">
                                    <div class="font-bold">
                                        <h1 class="text-gray-700 text-[25px]">Estimated Monthly Payment</h1>
                                    </div>
                                    <div class="font-bold main-color text-[45px]">
                                        <span id='estimetedMonth'></span> <span class="text-[25px]">Kyats</span>
                                    </div>
                                </div>
                                <div class="col-span-1 flex justify-center items-center">
                                    <a href="" class="px-5 py-4 border font-bold rounded-xl bg-main  text-[12px] ">Shop Cars in your budget</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-main h-auto"></div>
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
        var imgeUrl = "{{asset('storage/img/bg_cars.png')}}" ;
    </script>
    <script src="{{asset('storage/Jquery/Details.js')}}"></script>
@endsection 