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
        .hover-bg-secondary-100:hover {
            background-color : #232D3E ;
        }
        .text-secondary-100 {
            color :#232D3E ;
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
        <div id="indicators-carousel" style="width:80%;" class="relative hover:shadow-md mx-auto mb-4" data-carousel="static">
            <!-- Carousel wrapper -->
            <a href="#" data-modal-target="default-modal" data-modal-toggle="default-modal">
            <!-- <button data-modal-target="default-modal" data-modal-toggle="default-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
  Toggle modal
</button> -->
                <div style="height: 500px; " class="relative m-auto overflow-hidden rounded-lg ">
                    <!-- Item 1 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
                        <img src="{{asset('storage/'.$sale->img1)}}" class="absolute block w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                    <!-- Item 2 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{asset('storage/'.$sale->img2)}}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                    <!-- Item 3 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{asset('storage/'.$sale->img3)}}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                    <!-- Item 4 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{asset('storage/'.$sale->img4)}}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                    <!-- Item 5 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{asset('storage/'.$sale->img5)}}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{asset('storage/'.$sale->img6)}}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{asset('storage/'.$sale->img7)}}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{asset('storage/'.$sale->img7)}}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
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
        <div class="grid grid-cols-3 mb-5">
            <div class='col-span-2  ' style="margin-left : 30px;">
                <div  class="w-full mt-8 ">
                    <div class="px-5">
                        <h2  class="text-2xl font-bold mb-4 ">Details At a Glance</h2>
                        <div class="grid grid-cols-3 grid-flow-row items-center">
                            <div class="p-cus ">
                                <div class="w-100 text-neutral-80 font-light uppercase ">Transmission</div>
                                <div class="w-100 font-bold">{{$sale->transmission_type}}</div>
                            </div>
                            <div class="p-cus ">
                                <div class="w-100 text-neutral-80 font-light uppercase ">Drive Type</div>
                                <div class="w-100 font-bold">All wheel drive</div>
                            </div>
                            <div class="p-cus ">
                                <div class="w-100 text-neutral-80 font-light uppercase ">Number Of Seats</div>
                                <div class="w-100 font-bold">{{$sale->number_seats}}</div>
                            </div>
                            <div class="p-cus ">
                                <div class="w-100 text-neutral-80 font-light uppercase ">Please Of Origin</div>
                                <div class="w-100 font-bold">{{$sale->place_of_orgin}}</div>
                            </div>
                            <div class="p-cus ">
                                <div class="w-100 text-neutral font-light upparecase">Interior</div>
                                <div class="w-100 font-bold">{{$sale->interior_color}}</div>
                            </div>
                            <div class="p-cus ">
                                <div class="w-100 text-neutral-80 font-light upparecase">Fuel Type</div>
                                <div class="w-100 font-bold">Gasoline</div>
                            </div> 
                            <div class="p-cus">
                                <div class="w-100 text-neutral-80 font-light upparecase">VIN #</div>
                                <div class="w-100 font-bold">{{$sale->vin}}</div>
                            </div> 
                            <div class="p-cus">
                                <div class="w-100 text-neutral-80 font-light uppercase ">Exterior</div>
                                <div class="w-100 font-bold">{{$sale->color}}</div>
                            </div>
                        </div>
                        <div class="flex items-center mt-8">
                            <div class="mr-12">
                                <a href="" class="shift-button capitalize border font-semibold border-gray-400 secondary small h-[52px]">
                                    view All Deatals
                                </a>
                            </div>
                            <div class="ml-12 ">
                                <a href="" class="text-blue-700 inline-block my-4 font-light">See Original Window Sticker </a>
                            </div>
                            <a href="" class="ml-5">
                                <i class="fa-solid fa-circle-exclamation"></i>
                            </a>
                        </div>
                        

                    </div>
                    <hr>
                    <div class="px-5">
                        <h2 class="text-2xl font-bold mb-6 mt-6  ">Top Feacture</h2>
                        <div class="grid grid-cols-2 ">
                            
                            <!-- <div class="flex items-center mb-2">
                                <div class="">Prestige Package</div>
                                <a href="" class="ml-5">
                                    <i class="fa-solid fa-circle-exclamation"></i>
                                </a>
                            </div> -->
                            @foreach($advanc as $ad)
                            <div class="flex items-center mb-2">
                                <a href="" class='font-bold hover:bg-main'>
                                    {{$ad}}
                                </a>
                            </div>
                            @endforeach 
                        </div>
                        <!-- <div class="mt-3 mb-4">
                            <button type="button" data-id="{{$df_id}}" class="capitalize border border-gray-500 shift-button rounded-lg font-bold " id="view_all">View All ficuter</button>
                        </div> -->
                        <!-- // Table  -->
                        <div id="detailed-pricing" class="w-full overflow-x-auto py-2 ">
                            <div class="overflow-hidden min-w-max border rounded border-black">
                                <div class="grid grid-cols-2 p-4 text-sm font-medium text-gray-900 bg-gray-100 border-t border-b border-gray-200 gap-x-16 dark:bg-gray-800 dark:border-gray-700 dark:text-white">
                                    <div class="flex items-center">Function Name</div>
                                    <div class="flex items-center">Yes</div>
                                </div>
                                <div class="grid grid-cols-2 px-4 py-5 text-sm text-gray-700 border-b border-gray-200 gap-x-16 dark:border-gray-700">
                                    <div class="text-gray-500 dark:text-gray-400">Air Conditioning</div>
                                    <!-- <div>
                                        <svg class="w-3 h-3 text-green-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                                        </svg>
                                    </div> -->
                                    <div>
                                        <svg class="w-3 h-3 text-green-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 px-4 py-5 text-sm text-gray-700 border-b border-gray-200 gap-x-16 dark:border-gray-700">
                                    <div class="text-gray-500 dark:text-gray-400">Power Steering</div>
                                    <!-- <div>
                                        <svg class="w-3 h-3 text-green-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                                        </svg>
                                    </div> -->
                                    <div>
                                        <svg class="w-3 h-3 text-green-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 px-4 py-5 text-sm text-gray-700 border-b border-gray-200 gap-x-16 dark:border-gray-700">
                                    <div class="text-gray-500 dark:text-gray-400">Power Windows</div>
                                    <!-- <div>
                                        <svg class="w-3 h-3 text-green-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                                        </svg>
                                    </div> -->
                                    <div>
                                        <svg class="w-3 h-3 text-green-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 px-4 py-5 text-sm text-gray-700 border-b border-gray-200 gap-x-16 dark:border-gray-700">
                                    <div class="text-gray-500 dark:text-gray-400">Abs Brakes</div>
                                    <!-- <div>
                                        <svg class="w-3 h-3 text-green-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                                        </svg>
                                    </div> -->
                                    <div>
                                        <svg class="w-3 h-3 text-green-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 px-4 py-5 text-sm text-gray-700 border-b border-gray-200 gap-x-16 dark:border-gray-700">
                                    <div class="text-gray-500 dark:text-gray-400">Airbags</div>
                                    <!-- <div>
                                        <svg class="w-3 h-3 text-green-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                                        </svg>
                                    </div> -->
                                    <div>
                                        <svg class="w-3 h-3 text-green-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 px-4 py-5 text-sm text-gray-700 border-b border-gray-200 gap-x-16 dark:border-gray-700">
                                    <div class="text-gray-500 dark:text-gray-400">Navigation System</div>
                                    <!-- <div>
                                        <svg class="w-3 h-3 text-green-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                                        </svg>
                                    </div> -->
                                    <div>
                                        <svg class="w-3 h-3 text-green-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 px-4 py-5 text-sm text-gray-700 border-b border-gray-200 gap-x-16 dark:border-gray-700">
                                    <div class="text-gray-500 dark:text-gray-400">Bluetooth Connectivity</div>
                                    <!-- <div>
                                        <svg class="w-3 h-3 text-green-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                                        </svg>
                                    </div> -->
                                    <div>
                                        <svg class="w-3 h-3 text-green-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                <div class="w-100  p-6 h-[65%]  border border-gray-500  rounded">
                    <div class="flex justify-between w-full ">
                        <div class="text-primary-60 font-bold text-neutral-90 text-3xl font-display price"> {{$sale->price}} </div>
                        <div>
                            <div class="w-100 ">Est $145/month</div>
                            <div class="text-xs text-neutral-50 font-inter font-normal mt-1"><a href="" class="text-gray-600">Customize my payment</a></div>
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
                                <span>Test drive in-person at <a href="" class="main-color">Portland, OR</a></span> 7,478 miles away
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
                            <div class="flex items-center ">
                                <div class="inline-block mr-3 text-[18px] "><i class="fa-regular fa-envelope"></i></div>
                                <a  href=''  class="inline-block font-semibold main-color">Ask a question about this car</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Payment Plans -->
        <div class="bg-secondary-100 max-w-screen-2xl h-[700px] mx-auto mb-8 rounded-lg border">
            <div>
                <h1 class="mx-6 my-4 text-center font-bold text-[30px] text-white">Bulid Your Prefect Payment Plan </h1>
                <div class="flex item-center justify-center mt-5 mb-5">
                    <div class="py-2 px-4 rounded-l-lg hover-bg-secondary-100 hover:text-white uppercase text-[20px] text-gray-600 font-semibold  border-black bg-white ">Financing </div>
                    <div class="py-2 px-4 rounded-r-lg hover-bg-secondary-100 hover:text-white uppercase text-[20px] text-gray-600 font-semibold  border-black bg-white ">Cash </div>
                </div>
                <div class="grid grid-cols-2 w-[80%] m-auto ">
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
                                <div class="font-extrabold text-[21px]" id="months"></div>
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
            </div>
        </div>
    </main>
    

<!-- Modal toggle -->


<!-- Main modal -->
<div id="default-modal"  aria-hidden="true" style="height: 100vh;" 
class="hidden overflow-y-auto  overflow-x-hidden fixed top-0 z-50 bg-black bg-opacity-95 right-0 left-0   justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4  max-w-full w-full max-h-full ">
        <div class="relative bg-transparent rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="text-gray-400 absolute top-[10px] right-[10px] overflow-hidden z-50  bg-white hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <!-- Modal body -->
            <div class="mt-[60px]">
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

@endsection 

@section('footer') 
    @parent
@endsection 

@section('script')
    <script src="{{asset('storage/Jquery/financing.js')}}"></script>
    <script>
        $(document).ready(()=> {
            $('#view_all').click((e)=>{
                let btn = $(e.currentTarget);
                let dataId = btn.data('id') ;
                $.ajax({
                    type : "get" ,
                    url : "/api/default_function/" + dataId ,
                    success : (response) => {
                        console.log(response);
                    },
                    error : (error) => {
                        console.log(error);
                    }
                });
            });
        });
    </script>
@endsection 