@extends('MM.Layout.app')
@section('title' , 'Shop MM') 

@section('style') 
    <style>
        .max-w-screen-2xl {
            max-width : 1300px ;
        }
        .border-secondary {
            border-color  :  #232D3E ;
        }
        .text-neutral-90 {
            color : #06cba3 ;
        }
        .bg-primary {
            background-color : #06cba3 ;
            opacity: 1;
        }
        .text-neutral-80 {
            color : #71747D ;
        }
        .drop-area {
            background-position: center;
            background-size : cover ;
        }
        .p-cus {
            padding : 8px 0 ;
        }
        .shift-button {
            padding : 10px 15px ;
            border-radius : 15px ;
        }
        .bg-secondary-100 {
            background-color : #232D3E ;
        }
        /* .hover-bg-secondary-100:hover {
            background-color : #232D3E ;
        } */
        .text-secondary-100 {
            color :#232D3E ;
        }
        .arrow-container {
            position: relative;
            width: 1em;
            height: 1em;
        }

        .arrow {
            position: absolute;
            left: 0;
            top: 0;
            animation: arrow-animation 2s linear infinite;
        }

        @keyframes arrow-animation {
            0% {
                left: -100%;
            }
            100% {
                left: 100%;
            }
        }
        .active-btn {
            background: #1a202c;
            color: white;
        }
    </style>
@endsection 

@section('nav-bar') 
    @parent 
@endsection 

@section('search-1')
@endsection 

@section('content') 
    <main class="px-0 m-auto bg-white sm:px-4">
        <div class="max-w-screen-2xl mx-auto mb-4  border-b-0  border-gray-400">
            <nav  class="mx-3 text-gray-900 pt-5 text-sm font-sans block">
                <a href="">{{$sale->model_name}} </a>
                
                <a href="">{{$sale->grade_main == "none" ? " " : $sale->grade_main}}</a>
            </nav>
            <div class="block pl-8 pt-2  bg-white">
                <div class="flex justify-between ">
                    <div>
                        <div class="flex items-center w-100  ">
                            <h1 class="text-2xl font-semibold font- ">{{$sale->year}} {{$sale->model_name}} {{$sale->grade_main == "none" ? " " : $sale->grade_main}}</h1>
                            <div class="bg-white ml-2 text-neutral-500 border items-center border-secondary flex jsutify-center p-2 text-sm font-semibold rounded-lg capitalize ">
                                <i class="fa-solid text-black fa-certificate mr-1.5"></i>
                                <div class="ml-2">Shift Cartificated </div>
                            </div>
                            <div class=" ml-2 bg-primary text-neutral-100 border border-primary flex items-center p-2 outline-none text-xs rounded-lg capitalize ">
                                Best Seller 
                            </div>
                            
                        </div>
                        <div class="flex items-center w-100 mb-4 text-xs ">
                            <div class="font-bold text-xs text-gray-dark"> {{$sale->kilo_meter . ''.'Kilo'}}  </div>
                        </div>
                    </div>
                    <div class="flex items-center mb-2 ">
                        <div>
                            <div class='flex justify-end '>
                                <h2 class="text-base font-bold ">
                                    <span class="text-2xl price">{{$sale->price}} </span>
                                </h2>
                            </div>
                            <div class="flex justify-end text-xs text-gray-500">
                                <span class="emi_month"></span>
                            </div>
                        </div>
                        <div>
                            <div class="ml-3 "style="margin-left : 12px ;">
                                <a href="" class="flex text-center justify-center border rounded-lg bg-primary p-5 font-bold">Test Drive or Buy Online </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- image -->
        <div id="indicators-carousel" style="width:80%;" class="relative hover:shadow-md shadow-xl border border-gray-50  rounded-md mx-auto mb-4" data-carousel="static">
            <!-- Carousel wrapper -->
            <a href="#" data-modal-target="default-modal" data-modal-toggle="default-modal">
                <div style="height: 500px;" class="relative m-auto overflow-hidden rounded-lg">
                    <!-- Item 1 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
                    <img src="{{asset('storage/'.$sale->img1)}}" class="w-full h-full object-fit" alt="..." style="object-position: center;">
                    </div>
                    <!-- Item 2 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="{{asset('storage/'.$sale->img2)}}" class="w-full h-full object-fit" alt="..." style="object-position: center;">
                    </div>
                    <!-- Item 3 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="{{asset('storage/'.$sale->img3)}}" class="w-full h-full object-fit" alt="..." style="object-position: center;">
                    </div>
                    <!-- Item 4 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="{{asset('storage/'.$sale->img4)}}" class="w-full h-full object-fit" alt="..." style="object-position: center;">
                    </div>
                    <!-- Item 5 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="{{asset('storage/'.$sale->img5)}}" class="w-full h-full object-fit" alt="..." style="object-position: center;">
                    </div>
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="{{asset('storage/'.$sale->img6)}}" class="w-full h-full object-fit" alt="..." style="object-position: center;">
                    </div>
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="{{asset('storage/'.$sale->img7)}}" class="w-full h-full object-fit" alt="..." style="object-position: center;">
                    </div>
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="{{asset('storage/'.$sale->img7)}}" class="w-full h-full object-fit" alt="..." style="object-position: center;">
                    </div>
                </div>
            </a>
            <!-- Slider indicators -->
            <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
                <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 6" data-carousel-slide-to="5"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 7" data-carousel-slide-to="6"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 8" data-carousel-slide-to="7"></button>
            </div>
            <!-- Slider controls -->
            <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-gray/30 dark:bg-gray-800/30  group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-gray/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>
        <!-- information content  -->
        <div class="grid grid-cols-3 mb-5">
            <div class='col-span-2  ' style="margin-left : 30px;">
                <div  class="w-full mt-8  ">
                    <div class="px-5 mb-3">
                        <h2  class="text-2xl font-bold mb-4 ">Details At a Glance</h2>
                        <div class="grid grid-cols-4 grid-flow-row items-center">
                            <div class="p-cus ">
                                <div class="w-100 text-neutral-80 font-light uppercase ">Transmission </div>
                                <div class="w-100 font-bold">{{$sale->transmission_type}}</div>
                            </div>
                            <div class="p-cus ">
                                <div class="w-100 text-neutral-80 font-light uppercase ">Drive Type</div>
                                <div class="w-100 font-bold">
                                    <!-- drive Type ; -->
                                    {{$sale->transmissionType}}
                                </div>
                            </div>
                            <div class="p-cus ">
                                <div class="w-100 text-neutral-80 font-light uppercase ">Number Of Seats
                                    <span class="ml-2">
                                        <i class="fa-solid fa-chair"></i>
                                    </span>
                                </div>
                                <div class="w-100 font-bold"> <span class="">{{$sale->number_seats}}</span></div>
                            </div>
                            <div class="p-cus ">
                                <div class="w-100 text-neutral-80 font-light uppercase ">Please Of Origin</div>
                                <div class="w-100 font-bold">{{$sale->country}}</div>
                            </div>
                            <div class="p-cus ">
                                <div class="w-100 text-neutral font-light upparecase">Interior</div>
                                <div class="w-100 font-bold capitalize">{{$sale->interior_color}}</div>
                            </div>
                            <div class="p-cus ">
                                <div class="w-100 text-neutral-80 font-light upparecase">Fuel Type
                                    <span class="ml-2 ">
                                        <i class="fa-solid fa-gas-pump"></i>
                                    </span>
                                </div>
                                <div class="w-100 font-bold">
                                    <!-- Fuel Type  -->
                                    {{$sale->fuelType}}
                                </div>
                            </div> 
                            <div class="p-cus">
                                <div class="w-100 text-neutral-80 font-light upparecase">VIN #</div>
                                <div class="w-100 font-bold">{{$sale->vin}}</div>
                            </div> 
                            <div class="p-cus">
                                <div class="w-100 text-neutral-80 font-light uppercase ">Exterior</div>
                                <div class="w-100 font-bold">{{$sale->exterior}}</div>
                            </div>
                            <div class="p-cus">
                                <div class="w-100 text-neutral-80 font-light uppercase ">Grade</div>
                                <div class="w-100 font-bold">{{$sale->mainGrade}}</div>
                            </div>
                            <div class="p-cus">
                                <div class="w-100 text-neutral-80 font-light uppercase ">Engine Power
                                    @if($sale->trubo)
                                    <span class="bg-green-900 shadow-sm tracking-tight text-white lowercase px-2  py-1 font-extrabold text-[12px] rounded">
                                    <i class="fa-solid fa-circle-check"></i>
                                        turbo 
                                    </span>
                                    @endif
                                </div>
                                <div class="w-100 font-bold">{{$sale->engine_power . " CC" . " / " . $sale->cylinder}}</div>
                            </div>
                            
                            <div class="p-cus">
                                <div class="w-100 text-neutral-80 font-light uppercase ">License State</div>
                                <div class="w-100 font-bold text-white text-[18px] ">
                                    <div class="license w-[60%] border border-white rounded bg-black ">
                                        <div class="licnese-header flex justify-center items-center " >
                                            <div class="text-[12px] tracking-wider font-extrabold ">{{$sale->lincese_state_main}}</div>
                                        </div>
                                        <div class="linces-body flex justify-center items-center ">
                                            <div class="text-[13px] tracking-wider">
                                                <!-- Add licnese Plate -->
                                                {{$sale->licenserPlate}}
                                            </div>
                                        </div>
                                        <div class="license-footer flex justify-center items-center ">
                                            <div class="text-[10px]">
                                            {{$sale->brandName}} {{$sale->model_name}} 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="px-5">
                        <h2 class="text-2xl font-bold mb-6 mt-6  ">Top Feacture</h2>
                        <div class="grid grid-cols-2 ">
                            @php 
                                $count = count($advanc) > 1 ? true : false ;
                            @endphp
                            @if($count)
                                @foreach($advanc as $ad)
                                <div class="flex items-center mb-2">
                                    <a href="" class='font-bold hover:bg-main'>
                                        {{$ad}}
                                    </a>
                                </div>
                                @endforeach 
                            @else 
                                <div class="flex items-center mb-2">
                                    <a href="" class='font-bold hover:bg-main capitalize bg-gray-300 rounded-md px-3 text-yellow-800 py-1'>
                                        <i class="fa-solid fa-triangle-exclamation"></i>
                                        <span>There is no Special Top Functons </span>
                                    </a>
                                </div>
                            @endif
                        </div>
                        <div class="mt-3 mb-4 ">
                            <button type="button" data-id="{{$df_id}}" class="capitalize border border-gray-500 shift-button rounded-lg font-bold " id="view_all">
                                View Base Functons
                            </button>
                        </div>
                        <div class="grid grid-cols-2 w-full" id="dataContainer">
                        </div>
                    </div>
                    <hr>
                    <div class="px-5">
                        <h2 class="text-2xl font-bold mt-10 mb-6 ">Vehicle History</h2>
                        <div class="grid grid-cols-1 text-base">
                            <div class="flex flex-row">
                                <div class="w-2/3 ">Pass Owner</div>
                                <div class="w-1/3  font-semibold">{{$sale->pass_owner}}</div>
                            </div>
                            <div class="flex flex-row">
                                <div class="w-2/3 ">Reported accidents</div>
                                <div class="w-1/3  font-semibold">none</div>
                            </div>
                            <div class="flex flex-row">
                                <div class="w-2/3 ">Manufacturer's warranty</div>
                                <div class="w-1/3  font-semibold">{{$sale->warranty}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
            <div class="col-span-1 my-[135px] mx-2 hover:shadow-full rounded-xl  flex-col mt-2 flex justify-center items-center ">
                <div class="w-100  p-6 h-[100%]  border border-gray-500  rounded">
                    <div class="flex justify-between w-full ">
                        <div class="text-primary-60 font-bold text-neutral-90 text-3xl font-display price"> {{$sale->price}} </div>
                        <div>
                            <div class="w-100 ">
                                <div class="relative">
                                    <div id="hoverButton" class="text-red-600">Est <span class="estAmount"></span> <span>/Monthly</span></div>                                    <div id="hoverData" class="w-full hidden absolute top-[40px] right-[150px]  bg-blend-darken rouned">
                                        <ul class="w-100 p-[2px] block text-[10px]   text-white fw-bolder bg-gray-950 rounded">
                                            <li class="w-100 flex">
                                                <div class="w-1/2  flex content-center items-center">
                                                    <div>EST</div>    
                                                </div>
                                                <div class="w-1/2 flex content-center items-center">
                                                    <div class="estAmount"></div>
                                                </div>
                                            </li>
                                            <li class="w-100 flex">
                                                <div class="w-1/2 flex content-center items-center">
                                                    <div>Loan Months</div>    
                                                </div>
                                                <div class="w-1/2 flex content-center items-center">
                                                    <div ><span class="months"></span> Months</div>
                                                </div>
                                            </li>
                                            <li class="w-100 flex">
                                                <div class="w-1/2 flex content-center items-center">
                                                    <div>DownPayment</div>    
                                                </div>
                                                <div class="w-1/2 flex content-center items-center" >
                                                    <div class="dpPresent"></div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="text-xs text-neutral-50 font-inter font-normal mt-1"><a href="#paymentPlan" class="text-gray-600">Customize my payment</a></div>
                        </div>
                    </div>
                    <hr class="mt-8 mb-8">
                    <div>
                        <h1 class="capitalize font-bold font-serif mb-4">Get Pre-Quanity </h1>
                        <div>
                            <i class="fa-solid fa-landmark main-color mr-3 "></i>
                            <span class="font-bold"><a href="">Get pre-qualified</a></span>for personalized terms in just a few minutes with no impact to your credit score.
                        </div>
                    </div>
                    <hr class="mt-8 mb-8">
                    <div>
                        <h1 class="font-semibold mb-4 ">How do you want to get your car?</h1>
                        <div class="flex items-center mb-4">
                            <div class="main-color inline-block mr-3 text-[20px]" ><i class="fa-solid fa-truck-monster"></i></div>
                            <div class="inline-block">
                                <span>Test drive in-person at <a href="" class="main-color">Mingalar Car Sale Center , OR</a></span> 7,478 miles away
                            </div>
                        </div>
                        <div class='flex item-center '>
                            <div class="main-color text-[20px] mr-3">
                                <i class="fa-solid fa-building-user"></i>
                            </div>
                            <div>
                                <div class="font-semibold"><span class="">Buy online for free pickup</span> ,  or delivery to: <a href="" class="main-color">1171</a> </div>
                                <div class="text-[13px] font-semibold ">Delivery cost calculated based on your shipping address</div>
                            </div>
                        </div>
                        <div class="mb-4 mt-8">
                            <button class="bg-primary rounded-l-lg px-3 py-2 text-[25px] w-full"><i class="fa-solid text-gray-700 fa-handshake"></i><span></span></button>
                        </div>
                        <div class="mb-4 mt-5">
                            <a href="" class="font-semibold text-gray-600 border w-full text-center  inline-block border-black rounded-lg py-3 px-4">Buy it now Online</a>
                        </div>
                        <hr class="mt-4 mb-4">
                        <div>
                            <h1 class="font-bold text-gray-900 mb-4">We're here to help</h1>
                            <div class="flex items-center " >
                                <div class="inline-block mr-3 text-[18px] "><i class="fa-regular fa-envelope"></i></div>
                                <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="inline-block font-semibold main-color" type="button">
                                    Ask a question about this car
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Payment Plans -->
        <div class="bg-secondary-100 max-w-screen-2xl h-[700px] mx-auto mb-8 rounded-lg border" id="paymentPlan">
            <div>
                <h1 class="mx-6 my-4 text-center font-bold text-[30px] text-white">Bulid Your Prefect Payment Plan </h1>
                <div class="flex item-center justify-center mt-5 mb-5">
                    <div data-target="content1" class="toggle-btn py-2 cursor-pointer px-4 rounded-l-lg  active-btn  uppercase text-[20px] text-gray-900 font-semibold  border-black bg-white ">
                        Financing 
                    </div>
                    <div data-target="content2" class="toggle-btn cursor-pointer py-2 px-4 rounded-r-lg   uppercase text-[20px] text-gray-900 font-semibold  border-black bg-white ">
                        Cash
                     </div>
                </div>
                <div class="grid grid-cols-2 w-[80%] m-auto collapsible " id="content1">
                    <div class="text-secondary-100 mr-1 bg-white h-[400px] px-5 border rounded-lg my-2 mb-4 ">
                        <h1 class="text-center my-3 font-bold text-[25px] capitalize">Enter Your Estimated Term </h1>
                        <hr>
                        <div>
                            <h1 class="font-semibold mb-3">Loan length</h1>
                            <div class="flex items-center w-full  mx-auto mb-3">
                                <div id="36mons" class="w-[33%] border rounded-l-lg cursor-pointer flex justify-center items-center bg-secondary-100 text-white py-2">
                                    <div class="inline-block mr-2">36</div> 
                                    <div class="inline-block font-bold">Months</div>
                                </div>
                                <div id="48mons" class="w-[33%] border cursor-pointer flex justify-center items-center bg-secondary-100 text-white py-2">
                                    <div class="inline-block mr-2">48</div>
                                    <div class="inline-block font-bold">Months</div>
                                </div>
                                <div id="60mons" class="w-[33%] border cursor-pointer rounded-r-lg flex justify-center items-center bg-secondary-100 text-white py-2">
                                    <div class="inline-block mr-2">60</div>
                                    <div class="inline-block font-bold">Months</div>
                                </div>
                            </div>
                            <hr class="mb-2">
                            <h1 class="font-semibold mb-3">DownPayment %</h1>
                            <div class="flex items-center w-full  mx-auto mb-3">
                                <div id="30dp" class="w-[33%] border rounded-l-lg cursor-pointer flex justify-center items-center bg-secondary-100 text-white py-2">
                                    <div class="inline-block mr-2">30</div> 
                                    <div class="inline-block font-bold">%</div>
                                </div>
                                <div id="40dp" class="w-[33%] border  flex justify-center cursor-pointer items-center bg-secondary-100 text-white py-2">
                                    <div class="inline-block mr-2">40</div>
                                    <div class="inline-block font-bold">%</div>
                                </div>
                                <div id="50dp" class="w-[33%] border rounded-r-lg flex cursor-pointer justify-center items-center bg-secondary-100 text-white py-2">
                                    <div class="inline-block mr-2">50</div>
                                    <div class="inline-block font-bold">%</div>
                                </div>
                            </div>
                            <hr class="mb-2">
                            <h1 class="font-semibold mb-3">Option </h1>
                            <div class="grid grid-cols-2 gap-1">
                                <div class="col-span-1">
                                    <label for="">DownPayment</label>
                                    <input type="number" name="downPayment" maxlength="2" class="px-3 py-2.5 w-full text-white outline-none border-none bg-secondary-100 rounded-lg" placeholder="Enter Downpayments">
                                </div>
                                <div class="col-span-1">
                                    <label for="">Months</label>
                                    <input type="number" name="month" maxlength="3" class="px-3 py-2.5 w-full text-white outline-none border-none bg-secondary-100 rounded-lg" placeholder="Enter Months">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-secondary-100 bg-white h-[350px ] ml-2 px-5 border rounded-lg my-2 mb-4">
                        <h1 class="text-center my-3 font-bold text-[25px] capitalize">Estimated Price Breakdown</h1>
                        <hr>
                        <div class="mt-4" id='emi'>
                            <div class="flex justify-between items-center py-1 ">
                                <div class="font-semibold text-[17px]">Vehicle price</div>
                                <div class="font-bold text-[18px]" data-id="{{$sale->price}}" id="formatnumber1"></div>
                            </div>
                            <div class="flex justify-between items-center py-1 dpAfter" >
                                <div class="font-semibold text-[17px]">Down payment <span class="font-bold dpPresent"></span> </div>
                                <div class="font-bold text-[18px] " id="downPaymentVal"></div>
                            </div>
                            <div class="flex justify-between items-center py-1 ">
                                <div class="font-semibold text-[17px]">Insurance <span class="font-bold">(1%)</span></div>
                                <div class="font-bold text-[18px]" id="ins_1"></div>
                            </div>
                            <div class="flex justify-between items-center py-1 ">
                                <div class="font-semibold text-[17px]">Service Charge <span class="font-bold">(2% on Vehicle price)</span></div>
                                <div class="font-bold text-[18px]" id="sv_c"></div>
                            </div>
                            <div class="flex justify-between items-center py-1 ">
                                <div class="font-semibold text-[17px]">Length of loan</div>
                                <div class="font-bold text-[18px]"><span class="months"> </span> Months</div>
                            </div>
                            <div class="flex justify-between items-center py-1 ">
                                <div class="font-semibold text-[17px]">Interest of rated</div>
                                <div class="font-bold text-[18px]">10 %</div>
                            </div>
                            <hr class="font-bold">
                            <div class="flex justify-between items-center py-1 ">
                                <div class="font-bold text-[17px] ">Est . Initial Payment</div>
                                <div class="font-extrabold text-[21px]" id='initial'></div>
                            </div>
                            <div class="flex justify-between items-center py-1 ">
                                <div class="font-semibold text-[17px]">Est. Monthly Payment</div>
                                <div class="font-extrabold text-[21px]" id="fin_mon"></div>
                            </div>
                            <div class="flex justify-between items-center py-1 ">
                                <div class="font-semibold text-[17px]">Est. Finance Amount</div>
                                <div class="font-extrabold text-[21px]" id="fin_am"></div>
                            </div>
                            <div class="mb-3">
                                <button class="py-4 w-full text-center font-bold border bg-primary rounded-lg ">Get Started </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Content 2 -->
                <div id="content2" class="collapsible hidden">
                    <div class="w-[80%] m-auto bg-white h-full rounded-md p-4 relative" >
                        <div class="w-full bg-gray-200 hidden rounded-full h-1.5 mb-4 absolute top-0 left-0 dark:bg-gray-700">
                            <div class="bg-blue-600 h-1.5  dark:bg-blue-500 progess" ></div>
                        </div>
                        <div class="mb-3">
                            <h2 class="font-extrabold capitalize text-black text-[25px] text-center tracking-wider ">Cash Pay Plan</h2>
                        </div>
                        <div class="grid grid-cols-3 mb-2 text-gray-900 p-">
                            <div class="flex justify-center  ">
                                <div class="text-[20px] font-bold">
                                    Car Price
                                </div>
                            </div>
                            <div class="text-dark flex justify-center items-center overflow-hidden">
                                <div class="arrow-container font-extrabold w-11/12 text-[20px]">
                                    <i class="fa-solid fa-angles-right arrow"></i>
                                </div>
                            </div>
                            <div class="text-gray-900 font-bold text-[20px] flex justify-center items-center">
                                <div class="price">
                                {{$sale->price . "Kyats"}}
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-3 mb-3 text-gray-900">
                            <div class="flex justify-center items-center">
                                <div class="text-[20px] font-bold">
                                    Insurance <span class="font-bold">( 1.5 % on car price)</span>
                                </div>
                            </div>
                            <div class="text-dark flex justify-center items-center overflow-hidden">
                                <div class="arrow-container font-extrabold w-11/12 text-[20px]">
                                    <i class="fa-solid fa-angles-right arrow"></i>
                                </div>
                            </div>
                            <div class="text-gray-900 font-bold text-[20px] flex justify-center items-center">
                                <div class="insurace_amout">
                                    
                                </div>
                            </div>
                        </div>
                        <div class="border-dashed mx-auto my-2 mb-4 w-[500px] border border-black h-[250px]  p-[30px] text-center bg-white rounded-md">
                            <label for="upload-image" id="drop-image">
                                <input type="file" name="images" id="upload-image" accept="images/*" hidden>
                                <div id="drop-area" class="flex justify-center items-center w-100 h-full ">
                                    <div>
                                        <div class="text-[50px]">
                                            <i class="fa-solid fa-cloud-arrow-up"></i>
                                        </div>
                                        <p>Drop any images </p>
                                    </div>
                                </div>
                            </label>
                        </div>
                        <div class="grid grid-cols-2 mb-6">
                            <div class="flex justify-center items-center">
                                <div class="w-1/2">
                                    <button id="make_deposit" class="px-3 py-2 w-full rounded bg-blue-600 text-white">Cash</button>
                                </div>
                            </div>
                            <div class="flex justify-center items-center">
                                <div class="w-1/2">
                                    <a href="tel:09673127480" class="px-3 w-full py-2 block text-center rounded bg-blue-600 text-white">Call To Pay</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    
    <!-- Main modal -->
    <div id="default-modal"  aria-hidden="true"  
        class="hidden overflow-y-auto w-100  min-h-full bg-gray-900 h-full overflow-x-hidden fixed top-0 z-[50000] background-modal  right-0 left-0   justify-center items-center  md:inset-0  max-h-full">
        <div class="relative p-4  max-w-full w-[90%] max-h-full ">
            <div class="relative bg-transparent rounded-lg shadow dark:bg-gray-700">
                <button type="button" class="text-gray-400 absolute top-[10px] right-[10px] overflow-hidden z-50  bg-white hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <!-- Modal body -->
                <div class="">
                    <div id="indicators-carousel"  class="relative hover:shadow-md mx-auto " data-carousel="static">
                    <!-- Carousel wrapper -->
                        <a href="#">
                            <div style="height: 80vh; " class="relative m-auto overflow-hidden rounded-lg ">
                                <!-- Item 1 -->
                                <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
                                    <img src="{{asset('storage/'.$sale->img1)}}" class="absolute object-cover block w-full h-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                                </div>
                                <!-- Item 2 -->
                                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                    <img src="{{asset('storage/'.$sale->img2)}}" class="absolute object-cover block w-full h-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                                </div>
                                <!-- Item 3 -->
                                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                    <img src="{{asset('storage/'.$sale->img3)}}" class="absolute object-cover block w-full h-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                                </div>
                                <!-- Item 4 -->
                                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                    <img src="{{asset('storage/'.$sale->img4)}}" class="absolute object-cover block w-full h-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                                </div>
                                <!-- Item 5 -->
                                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                    <img src="{{asset('storage/'.$sale->img5)}}" class="absolute object-cover block w-full h-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                                </div>
                                <!-- Item 6 -->
                                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                    <img src="{{asset('storage/'.$sale->img6)}}" class="absolute object-cover block w-full h-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                                </div>
                                <!-- Item 7 -->
                                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                    <img src="{{asset('storage/'.$sale->img7)}}" class="absolute object-cover block w-full h-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                                </div>
                                <!-- Item 8 -->
                                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                    <img src="{{asset('storage/'.$sale->img8)}}" class="absolute object-cover block w-full h-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                                </div>
                            </div>
                        </a>
                    <!-- Slider indicators -->
                    <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 6" data-carousel-slide-to="5"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 7" data-carousel-slide-to="6"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 8" data-carousel-slide-to="7"></button>
                    </div>
                    <!-- Slider controls -->
                        <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                                </svg>
                                <span class="sr-only">Previous</span>
                            </span>
                        </button>
                        <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                </svg>
                                <span class="sr-only">Next</span>
                            </span>
                        </button>
                    </div>
                </div>
                <!-- Modal footer -->
            </div>
        </div>
    </div>
    
    <!-- Main modal -->
    <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-lg max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Send Mail Here 
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form class="p-4 md:p-5" id="sendMail">
                    @csrf 
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                            <input type="email" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" required="">
                        </div>
                        <div class="col-span-2">
                            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Here is how you send Mail</label>
                            <textarea id="description" name="description" rows="3" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write product description here"></textarea>                    
                        </div>
                    </div>
                    <div class="text-end" id="submitTest">
                        <button type="submit" class="text-white flex justify-between items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <div class="font-bold ">
                                Send Email 
                            </div>
                            <div role="status" class="ml-1">
                                <svg aria-hidden="true" class="inline w-5 h-5 text-gray-200 animate-spin dark:text-gray-600 fill-blue-700 dark:fill-blue-800" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                    <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                                </svg>
                            </div>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div> 

@endsection 

@section('footer') 
    @parent
@endsection 

@section('script')
    <script src="{{asset('storage/Jquery/financing.js')}}"></script>
    <script>
        $(document).ready(()=> {
            $('#view_all').click((e)=>{
                let value = $('<div class="flex justify-center item-center h-5">\
                                <div class="rounded-md h-12 w-12 border-4 border-t-4 border-blue-500 animate-spin absolute"></div>\
                            </div> ')
                $('#dataContainer').append(value);
                
                let btn = $(e.currentTarget);
                let dataId = btn.data('id') ;
                $.ajax({
                    type : "get" ,
                    url : "/api/default_function/" + dataId ,
                    success : (response) => {
                        btn.parent().remove();
                        $('#dataContainer').empty();
                        $.each(response, function(key, value) {
                            if(value == 1 ) {
                                var replace= key.replace('_'," ");
                                var element = $('<div class="flex items-center mb-2">\
                                                <a href="" class="font-bold hover:bg-main capitalize">\
                                                ' +replace  + '\
                                                </a>\
                                            </div>');
                                
                            }
                            $('#dataContainer').append(element);
                        });
                    },
                    error : (error) => {
                        console.log(error);
                    }
                });
            });
            let carId = "{{$sale->mainId}}";
            $('#sendMail').submit(function (e) {
                e.preventDefault();
                var fromData = $(this).serialize() ;
                $.ajax({
                    'url' : "/mm_cars/askquestion/" + carId ,
                    'method' : "post" ,
                    data : fromData ,
                    success : (response) => {
                        if(response == 'success') {
                            $('#submitTest').empty().text('Success! Now Check Your Email Box').addClass('text-green-600 fw-bolder');
                        }
                    },
                    error : (error) => {
                        console.log(error);
                    }
                })
            });
            $('#hoverButton').mouseenter(function() {
                $('#hoverData').removeClass('hidden');
            });

            $('#hoverButton').mouseleave(function() {
                $('#hoverData').addClass('hidden');
            });

            $('.toggle-btn').click(function(){
                var target = $(this).data('target');
                $('.collapsible').hide();
                $('#' + target).show();
                $('.toggle-btn').toggleClass('active-btn');                
            });

            const dropArea = $('#drop-image') , inputFile = $('#upload-image') , imageView = $('#drop-area') ;
            var inputImg = $("input[name='']");
            $(document).on('change',inputFile , uploadeImage) ;

            function uploadeImage (e) {
                var input = e.target.files[0];
                inputImg.files= e.target.files ;
                $(inputImg).trigger('change');
                if(input) {
                    let imageLink = URL.createObjectURL(input) ;
                    imageView.css('background-image' , 'url(' + imageLink + ')' ) ;
                    imageView.css('background-position' , 'center');
                    imageView.css('background-repeat' , 'no-repeat');
                    imageView.find('div').remove();
                    imageView.find('p').remove();
                }
            }
            
            $(dropArea).on('dragover', function(e) {
                e.preventDefault();
                e.stopPropagation();
            });

            $(dropArea).on('dragenter', function(e) {
                e.preventDefault();
                e.stopPropagation();
            });

            $(dropArea).on('drop', function(e) {
                e.preventDefault();
                e.stopPropagation();
                var files = e.originalEvent.dataTransfer.files;
                inputImg.files= files ;
                $(inputImg).trigger('change');
                if (files.length > 0) {
                     if (files[0].type.startsWith('image/')) {
                        let imageLink = URL.createObjectURL(files[0]) ;
                        imageView.css('background-image', 'url(' + imageLink + ')');
                        imageView.css('background-position', 'center');
                        imageView.css('background-repeat', 'no-repeat');
                        imageView.find('div').remove();
                        imageView.find('p').remove();
                    } 
                }
            });
            
            $('#make_deposit').click(function () {
                var imgFile = inputImg.files[0]; 
                var formData = new FormData();
                formData.append('image', imgFile);
                formData.append('_token', '{{csrf_token()}}');

                $.ajax({
                    url  : '/mm_cars/make/deposit' ,
                    method : 'post' ,
                    xhr : function () {
                        var xhr =  new window.XMLHttpRequest();
                        xhr.onreadystatechange = function () {
                            var progess = xhr.readyState;
                            var progessBarWidth = $('.progess') ;
                            progessBarWidth.parent().removeClass('hidden');
                            if(progess < XMLHttpRequest.DONE ) {
                                progressBarWidthParent =  25 * progess ; 
                                progessBarWidth.css('width' , progressBarWidthParent + "%")
                                console.log(progressBarWidthParent);
                            }else {
                                progessBarWidth.css('width' , "100%");
                                setTimeout(() => {
                                    progessBarWidth.css('width' , "0");
                                    progessBarWidth.parent().addClass('hidden');
                                    
                                }, 500);
                            }
                            
                        }.bind(this);
                        return xhr ;
                    }.bind(this),
                    contentType : false ,
                    processData: false ,
                    data : formData,
                    success : (response) => {
                        swal("Good job!", response.message, "success")
                    },
                    error : (error) => {
                        console.log(error);
                    }
                })
            });
        });


    </script>
@endsection 