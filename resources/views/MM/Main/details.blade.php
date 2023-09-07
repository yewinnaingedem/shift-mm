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
    </style>
@endsection 

@section('nav-bar') 
    @parent 
@endsection 

@section('search-1')
@endsection 

@section('content') 
    <main class="px-0 m-auto bg-white sm:px-4">
        <div class="max-w-screen-2xl mx-auto mb-4 ">
            <nav  class="mx-3 text-gray-900 pt-5 text-sm font-sans block">
                <a href="">Audi </a>
                /
                <a href="">SQ5</a>
            </nav>
            <div class="block pl-8 pt-2 sticky top-[3.70rem] mt-1.5  z-[9996] bg-white">
                <div class="flex justify-between ">
                    <div>
                        <div class="flex items-center w-100  ">
                            <h1 class="text-2xl font-semibold font- ">2018 Audi SQ5 Prestige</h1>
                            <div class="bg-white ml-2 text-neutral-100 border items-center border-secondary flex jsutify-center p-2 text-sm font-semibold rounded-lg capitalize ">
                                <i class="fa-solid fa-certificate mr-1.5"></i>
                                <div class="ml-2">Shift Cartificated </div>
                            </div>
                            <div class=" ml-2 bg-primary text-neutral-100 border border-primary flex items-center p-2 outline-none text-xs rounded-lg capitalize ">
                                Best Seller 
                            </div>
                            
                        </div>
                        <div class="flex items-center w-100 mb-4 text-xs ">
                            <div class="font-bold text-xs text-gray-dark"> 77 K Miles</div>
                        </div>
                    </div>
                    <div class="flex items-center ">
                        <div>
                            <div class='flex justify-end '>
                                <h2 class="text-base font-bold ">
                                    <s class="text-base font-normal ">$32950</s>
                                    <span class="text-2xl">$30950</span>
                                </h2>
                            </div>
                            <div class="flex justify-end text-xs text-gray-500">
                                <span>Est . $420/month</span>
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
            <div style="height: 500px; " class="relative m-auto overflow-hidden rounded-lg ">
                <!-- Item 1 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
                    <img src="{{asset('storage/img/dog-log-in.jpg')}}" class="absolute block w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
                <!-- Item 2 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="{{asset('storage/img/zqfDT1BcYXoBV2qZdsECSvoOzYh5AdqE9tziLjfI.jpg')}}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
                <!-- Item 3 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="{{asset('storage/img/ZlJ3ylCClUGWdEeDnKfKN5aKiCABRsqXL1grVgbz.jpg')}}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
                <!-- Item 4 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="{{asset('storage/img/user_profile.jpg')}}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
                <!-- Item 5 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="{{asset('storage/img/oT4JROIop9PxeFVvjgSkSkl8JE71ZHqUvxAFa0cK.jpg')}}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
            </div>
            <!-- Slider indicators -->
            <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
                <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
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
        <div class="grid grid-cols-3">
            <div class='col-span-2  ' style="margin-left : 30px;">
                <div  class="w-full mt-8 ">
                    <div class="px-5">
                        <h2  class="text-2xl font-bold mb-4 ">Details At a Glance</h2>
                        <div class="grid grid-cols-3 grid-flow-row items-center">
                            <div class="p-cus ">
                                <div class="w-100 text-neutral-80 font-light uppercase ">Mpg</div>
                                <div class="w-100 font-bold">19 City / 24 Hry</div>
                            </div>
                            <div class="p-cus ">
                                <div class="w-100 text-neutral-80 font-light uppercase ">Transmission</div>
                                <div class="w-100 font-bold">Automatic</div>
                            </div>
                            <div class="p-cus ">
                                <div class="w-100 text-neutral-80 font-light uppercase ">Drive Type</div>
                                <div class="w-100 font-bold">All wheel drive</div>
                            </div>
                            <div class="p-cus ">
                                <div class="w-100 text-neutral-80 font-light uppercase ">Engine Type</div>
                                <div class="w-100 font-bold">6-cylinder V</div>
                            </div>
                            <div class="p-cus ">
                                <div class="w-100 text-neutral-80 font-light uppercase ">Horsepower</div>
                                <div class="w-100 font-bold">354 HP @ 5400 RPM</div>
                            </div>
                            <div class="p-cus ">
                                <div class="w-100 text-neutral font-light upparecase">Interior</div>
                                <div class="w-100 font-bold">Black</div>
                            </div>
                            <div class="p-cus ">
                                <div class="w-100 text-neutral-80 font-light upparecase">Fuel Type</div>
                                <div class="w-100 font-bold">Gasoline</div>
                            </div> 
                            <div class="p-cus">
                                <div class="w-100 text-neutral-80 font-light upparecase">VIN #</div>
                                <div class="w-100 font-bold">WA1C4AFY1J2097150</div>
                            </div> 
                            <div class="p-cus">
                                <div class="w-100 text-neutral-80 font-light uppercase ">Exterior</div>
                                <div class="w-100 font-bold">Daytona Gray Pearl Effect</div>
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
                            <div class="flex items-center mb-2">
                                <div class="">Prestige Package</div>
                                <a href="" class="ml-5">
                                    <i class="fa-solid fa-circle-exclamation"></i>
                                </a>
                            </div>
                            <div class="flex items-center mb-2">
                                <div class="">Driver Assistance Package</div>
                                <a href="" class="ml-5">
                                    <i class="fa-solid fa-circle-exclamation"></i>
                                </a>
                            </div>
                            <div class="flex items-center mb-2">
                                <div class="">S Sport Package</div>
                                <a href="" class="ml-5">
                                    <i class="fa-solid fa-circle-exclamation"></i>
                                </a>
                            </div>
                            <div class="flex items-center mb-2">
                                <a href="">
                                    Driver Vanity Mirror
                                </a>
                            </div>
                            <div class="flex items-center mb-2">
                                <a href="">
                                    Luggage Rack
                                </a>
                            </div>
                            <div class="flex items-center mb-2">
                                <a href="">
                                    Rear Defrost
                                </a>
                            </div>
                            <div class="flex items-center mb-2">
                                <a href="">
                                    Driver Vanity Mirror
                                </a>
                            </div>
                            <div class="flex items-center mb-2">
                                <a href="">
                                    Driver Vanity Mirror
                                </a>
                            </div>
                            <div class="flex items-center mb-2">
                                <a href="">
                                    Passenger Illuminated Visor Mirror
                                </a>
                            </div>
                            <div class="flex items-center mb-2">
                                <a href="">
                                    Stability Control
                                </a>
                            </div>
                            <div class="flex items-center mb-2">
                                <a href="">
                                    Traction Control
                                </a>
                            </div>
                            <div class="flex items-center mb-2">
                                <a href="">
                                    Locking/Limited Slip Differential
                                </a>
                            </div>
                            <div class="flex items-center mb-2">
                                <a href="">
                                    Abs
                                </a>
                            </div>
                        </div>
                        <div class="mt-3 mb-4">
                            <a href="" class="capitalize border border-gray-500 shift-button rounded-lg font-bold ">View All ficuter</a>
                        </div>
                    </div>
                    <hr>
                    <div class="px-5">
                        <h2 class="text-2xl font-bold mt-10 mb-6 ">Vehicle History</h2>
                        <div class="grid grid-cols-1 text-base">
                            <div class="flex flex-row">
                                <div class="w-2/3 ">Pass Owner</div>
                                <div class="w-1/3  font-semibold">2</div>
                            </div>
                            <div class="flex flex-row">
                                <div class="w-2/3 ">Reported accidents</div>
                                <div class="w-1/3  font-semibold">0</div>
                            </div>
                            <div class="flex flex-row">
                                <div class="w-2/3 ">Manufacturer's warranty</div>
                                <div class="w-1/3  font-semibold">Over</div>
                            </div>
                        </div>
                        <div class="mt-5 mb-3 ">
                            <a href="" class="shift-button border border-gray-700 ">View Full Carfax Report </a>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>  
            <div class="col-span-1 flex justify-between flex-col mt-7 ">
                <div class="w-100 px-3">
                    <div class="flex justify-between w-full ">
                        <div class="text-primary-60 font-semibold text-neutral-90 text-3xl font-display"> $30,950</div>
                        <div>
                            <div class="w-100 ">Est $145/month</div>
                            <div class="text-xs text-neutral-50 font-inter font-normal mt-1"><a href="" class="text-gray-300">Customize my payment</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection 

@section('footer') 

@endsection 

@section('script')
    <script>

    </script>
@endsection 