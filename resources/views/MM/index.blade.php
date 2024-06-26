@extends('MM.Layout.app')

@section('title' , 'Shop MM ') 
@section('style')
    <style>
        .font-dispaly{
            color : #06CBA3 ;
        }
        .background-modal {
            background : rgba(17, 17, 17, 0.25);
        }
        .modelAble {
            transition: min-height 0.3s ease
        }
        input[type="number"]::webkit-outer-spin-button , 
        input[type="number"]::webkit-inner-spin-button {
            --webkit-appearance : none ;
        }
        .hover-search .undo-img {
            opacity: 0;
        }
        .hover-search:hover .undo-img {
            opacity: 1;
        }
        .webkit-appearance-none {
            background : none ;
            appearance : none ;
        }
        .range::-webkit-slider-thumb {
            height : 17px ;
            width : 17px ;
            background : #17a2b8 ;
            pointer-events : auto ;
            --webkit-appearance : none ;
        }
        .bg-customize {
            background : #ddd ;
        }
        .ragne-color {
            background : #17A2B8 ;
        }
        #rotateIcon.rotating {
            animation: rotate 0.5s linear infinite; /* Rotate animation */
        }

        @keyframes rotate {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
            }
        }
        #alert-1 {
            position: fixed;
            top : 2px ;
            z-index : 1000000;
            background : tomato ;
            width : 90% ;
            transition: transform 0.3s ease-in-out, opacity 0.3s ease-in-out; 
        }
    </style>
@endsection 
@section('nav-bar')
    @parent 
@endsection 

@section('content') 
    <div class="wrapper m-3" >
        <div id="warning_alter"></div>
        <div class="header flex px-3">
            <div class="w-1/2 " >
                <div class="w-1/3  flex text-[15px] ">
                    <div class="flex w-full p-2 items-center bg-gray-50 border  hover:bg-gray-100 rounded  ">
                        <div class="w-[75%] tracking-wider font-semibold">Show Result :</div>
                        <div class="w-1/4 font-bold" id="showResult">
                            
                        </div>
                    </div>
                    <div class="flex justify-center items-center ml-2 bold  cursor-pointer" id="id_reflesh">
                        <i class="fa-solid fa-arrows-rotate" id="rotateIcon"></i>
                    </div>
                </div>
            </div>
            <div class="w-1/2 flex justify-end items-center">
                <div class="w-1/4 ">
                    <div class="flex w-full p-2 items-center bg-gray-50 border  hover:bg-gray-100 rounded  ">
                        <div class="w-[75%] tracking-wider font-semibold">Total :</div>
                        <div class="w-1/4 font-bold"> {{$totals}} </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            @include('MM.Layout.content')            
        </div>
        <div class="footer px-3">
            <div class="flex">
                <div class="w-1/2">
                    <div class="w-1/2">
                        <div class="w-full flex  gap-1 h-[50px] items-center">
                            <div class="w-1/4 h-full border bg-gray-100 rounded flex justify-center items-center hover:bg-gray-200">
                                <div class="font-bolder">Next >> </div>    
                            </div>
                            <div class="w-1/4 h-full border bg-gray-50 rounded flex justify-center hover:bg-gray-100 items-center">
                                <div class="font-bold">1</div>
                            </div>
                            <div class="w-1/4 h-full border bg-gray-50 rounded flex justify-center hover:bg-gray-100 items-center">
                                <div class="font-bold" >2</div>
                            </div>
                            <div class="w-1/4 h-full border rounded bg-gray-50 flex justify-center hover:bg-gray-100 items-center">
                                <div class="font-bold">3</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-1/2 flex justify-end items-end">
                    <div class="w-1/2 ">
                        <div class="w-full flex  gap-1 h-[50px] items-center">
                            <div class="w-1/4 h-full border bg-gray-100 rounded hover:bg-gray-200 flex justify-center items-center">
                                <div class="font-bolder ">  Pre-Next</div>    
                            </div>
                            <div class="w-1/4 h-full border bg-gray-50 rounded flex justify-center hover:bg-gray-100 items-center">
                                <div class="font-bold">1</div>
                            </div>
                            <div class="w-1/4 h-full border bg-gray-50 rounded flex justify-center hover:bg-gray-100 items-center">
                                <div class="font-bold">2</div>
                            </div>
                            <div class="w-1/4 h-full border bg-gray-50 rounded flex  hover:bg-gray-100 justify-center items-center">
                                <div class="font-bold">3</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section id="popular_search" class="mt-16 px-3">
            <div class="search-header mb-5 ">
                <h2 class="text-xl text-black font-extrabold tracking-wide font-sans  ">Here is popular Search Withing This Week </h2>
            </div>
            <div class="grid grid-cols-4 mb-6 gap-1">
                @foreach($searchQueries as $query) 
                <div class="mb-3 rounded hover:bg-neutral-100 hover-search  hover:shadow py-1 px-2 ">
                    <a href="{{url('mm_cars/search/'.$query->brand_name.'/'. $query->model_name)}}" class="">
                        <div class="flex items-center justify-between">
                            <div class="leading-5  ">
                                <span class="font-semibold">{{$query->brand_name}}</span>
                                <span>{{$query->model_name}}</span>
                            </div>
                            <div class="undo-img duration-150 ">
                                <img class="w-6" src="{{asset('storage/Icons/undo_icon.svg')}}" alt="Undo">
                            </div>
                        </div>    
                    </a>
                </div>
                @endforeach 
            </div>
        </section>
    </div>
@endsection 

@section('footer')
    @parent 
@endsection 

@section('script')
    @vite('resources/js/searchable.js')
    <script  src="{{asset('storage/jquery/mmIndex.js')}}" data-csrf="{{ csrf_token() }}"  data-baseurl="{{ asset('storage/') }}" data-routeurl="{{ url('mm_cars/car/') }}"></script>
@endsection 