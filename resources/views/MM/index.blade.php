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
        .loader-container {

        }
    </style>
@endsection 
@section('nav-bar')
    @parent 
@endsection 

@section('content') 
    <div class="wrapper m-3">
        <div class="header flex px-3">
            <div class="w-1/2 " >
                <div class="w-1/3  flex text-[15px] ">
                    <div class="flex w-full p-2 items-center bg-gray-50 border  hover:bg-gray-100 rounded  ">
                        <div class="w-[75%] tracking-wider font-semibold">Show Result :</div>
                        <div class="w-1/4 font-bold">105 
                            <span>
                                <i class="fa-solid fa-angle-down"></i>
                            </span> 
                        </div>
                    </div>
                    <div class="flex justify-center items-center ml-2 bold  cursor-pointer" id="id_reflesh">
                        <i class="fa-solid fa-arrows-rotate"></i>
                    </div>
                </div>
            </div>
            <div class="w-1/2 flex justify-end items-center">
                <div class="w-1/4 ">
                    <div class="flex w-full p-2 items-center bg-gray-50 border  hover:bg-gray-100 rounded  ">
                        <div class="w-[75%] tracking-wider font-semibold">Total :</div>
                        <div class="w-1/4 font-bold">150 </div>
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
    </div>
@endsection 

@section('footer')
    @parent 
@endsection 

@section('script')
    @vite('resources/js/searchable.js')
    <script>
        var baseUrl = "{{ asset('storage/') }}";
    </script>
    <script src="{{asset('storage/jquery/mmIndex.js')}}"></script>
@endsection 