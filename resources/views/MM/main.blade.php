@extends('MM.Layout.app')
@section('title' , 'MM | Financing') 

@section('style') 
    <style>
        .main-color {
            color : #06CBA3 ;
        }
    </style>
@endsection 

@section('nav-bar') 
    @parent 
@endsection 

@section('search-1')

@endsection 

@section('content') 
    <div class="main h-100vh" >
        <div class=" grid grid-cols-3 mb-3 ">
            <div class="mx-3 mt-6 flex hover:bg-gray-500 hover:text-white flex-col self-start rounded-lg bg-white  dark:bg-neutral-700 sm:shrink-0 sm:grow sm:basis-0">
                <a href="{{url('mm_cars/shop_mm')}}">
                    <div class="rounded-t-lg flex justify-center items-center pt-2 ">
                        <i class="fa-solid fa-car-side h-[100px] w-[100px] main-color "></i>
                    </div>
                </a>
                <div class="p-6 text-center">
                    <h5
                        class="mb-2 text-xl font-bold leading-tight text-neutral-800 main-color ">
                        Mingalar Car Sale Center 
                    </h5>
                    <p class="mb-4 text-base text-black font-bold main-color">
                        Please Chose With Then Your Budget 
                    </p>
                </div>
            </div>
            <div class="mx-3 mt-6 flex hover:bg-gray-500 flex-col self-start rounded-lg bg-white  dark:bg-neutral-700 sm:shrink-0 sm:grow sm:basis-0">
                <a href="{{url('mm_cars/finance')}}">
                    <div class="rounded-t-lg flex justify-center items-center pt-2">
                        <i class="fa-solid fa-coins h-[100px] w-[100px] main-color "></i>
                    </div>
                </a>
                <div class="p-6 text-center">
                    <h5
                        class="mb-2 text-xl font-bold leading-tight text-neutral-800 main-color">
                        Mingalar Car Sale Center 
                    </h5>
                    <p class="mb-4 text-base text-black font-bold main-color">
                        Please Chose With Then Your Budget 
                    </p>
                </div>
            </div>
            <div class="mx-3 mt-6 flex hover:bg-gray-500 flex-col self-start rounded-lg bg-white  dark:bg-neutral-700 sm:shrink-0 sm:grow sm:basis-0">
                <a href="{{url('mm_cars/')}}">
                    <div class="rounded-t-lg flex justify-center items-center pt-2">
                        <i class="fa-solid fa-landmark h-[100px] w-[100px] main-color "></i>
                    </div>
                </a>
                
                <div class="p-6 text-center">
                    <h5
                        class="mb-2 text-xl font-bold leading-tight text-neutral-800 main-color">
                        Mingalar Car Sale Center 
                    </h5>
                    <p class="mb-4 text-base text-black font-bold main-color">
                        Please Chose With Then Your Budget 
                    </p>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-2">
            <div class="mx-3 mt-6 flex hover:bg-gray-500 flex-col self-start rounded-lg bg-white  dark:bg-neutral-700 sm:shrink-0 sm:grow sm:basis-0">
                    <a href="url('mm_cars/')">
                        <div class="rounded-t-lg flex justify-center items-center pt-2">
                            <i class="fa-solid fa-gears h-[100px] w-[100px] main-color "></i>
                        </div>
                    </a>
                    
                    <div class="p-6 text-center">
                        <h5
                            class="mb-2 text-xl font-bold leading-tight text-neutral-800 main-color">
                            Mingalar Car Sale Center 
                        </h5>
                        <p class="mb-4 text-base text-black font-bold main-color">
                            Please Chose With Then Your Budget 
                        </p>
                    </div>
            </div>
            <div class="mx-3 mt-6 flex hover:bg-gray-500 flex-col self-start rounded-lg bg-white  dark:bg-neutral-700 sm:shrink-0 sm:grow sm:basis-0">
                    <a href="#!">
                        <div class="rounded-t-lg flex justify-center items-center pt-2">
                            <i class="fa-solid fa-handshake h-[100px] w-[100px] main-color "></i>
                        </div>
                    </a>
                    
                    <div class="p-6 text-center">
                        <h5
                            class="mb-2 text-xl font-bold leading-tight text-neutral-800 main-color">
                            Mingalar Car Sale Center 
                        </h5>
                        <p class="mb-4 text-base text-black font-bold main-color">
                            Please Chose With Then Your Budget 
                        </p>
                    </div>
            </div>
         </div>
    </div>
@endsection 

@section('footer') 
@endsection 

@section('script')
@endsection 