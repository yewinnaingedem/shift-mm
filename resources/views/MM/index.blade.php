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
    </style>
@endsection 
@section('nav-bar')
    @parent 
@endsection 

@section('content') 
    @include('MM.Layout.content')
@endsection 

@section('footer')
    @parent 
@endsection 

@section('script')
    @vite('resources/js/searchable.js')
    <script>
        $(document).ready(function () {
            $('.body-fade').show() ;
            $(window).on('load', function () {
                $('.body-fade').remove();
                $('.loader-content').removeClass('hidden'); 
            });

            $('.price').each(function() {
                var $priceElement = $(this);
                var test = $priceElement.html();
                var val = parseFloat(test).toLocaleString(); // Assuming the content is a number
                $priceElement.html(val); // Update the content with the formatted value
            });
            
            $('.clickAble').click((e) => {
                $('#loadContent').show();
                $('#modelAble').hide();
                $('#modelAble').empty();
                var $curretTarget = $(e.currentTarget);
                var $idValut = $curretTarget.attr('id');
                if($idValut != "price") {
                    $.ajax({
                    url : "http://localhost:8000/api/" + $idValut ,
                    type : "Get" ,
                    success : (response) => {
                        var element = " " ;
                        $('#loadContent').hide();
                        $.each(response.data , function (index , item ) {
                            element += `
                                    <li class="count">
                                        <a href="#" class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                                            <i class="fa-solid ${response.icon} h-4 main-color"></i>
                                            <span class="flex-1 ms-3 whitespace-nowrap">${item.responseData}</span>
                                        </a>
                                    </li>
                                        ` ;
                            });
                            $('#modelAble').append(element);
                            $('#modelAble').show();
                        },
                        error : (error) => {
                            console.log(error);
                        }
                    });
                }else {
                    $('#loadContent').hide();
                    let element = 
                    `
                        <li class="count">
                            <div class="broder mb-[20px]">
                                <div class="flex flex-col sm:flex-row gap-4 mb-[40px] priceInput" >
                                    <div class="flex flex-col w-full sm:w-1/2">
                                        <label for="min_price" class="text-sm font-medium text-gray-700">Min</label>
                                        <input type="number" id="min_price" name="min_price" value="2772" class="mt-1 p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                                    </div>
                                    <div class="flex flex-col w-full sm:w-1/2">
                                        <label for="max_price" class="text-sm font-medium text-gray-700">Max</label>
                                        <input type="number" id="max_price" name="max_price" value="8018" class="mt-1 p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                                    </div>
                                </div>
                                <div class="slider  h-[5px] relative rounded bg-customize mt-3">
                                    <div class="progess ragne-color h-[5px] rounded absolute left-[25%] right-[25%]" ></div>
                                </div>
                                <div class="range-input relative">
                                    <input type="range" id="range-min" class="absolute range-min range top-[-5px] pointer-events-none h-[5px] w-full webkit-appearance-none bg-none" min="0" max="10000" max="25000" value="2500" name="range-min" id="">
                                    <input type="range" id="range-max" class="absolute range-max range top-[-5px] pointer-events-none h-[5px] w-full webkit-appearance-none bg-none" min="0" max="10000" max="75000" value="7500" name="range-max" id="">
                                </div>
                                <div class="mt-[30px] flex">
                                    <div class="w-1/2 text-start">
                                        <button id="clearFormated" class="px-4 py-3 rounded bg-red-700 text-white font-bold shadow-sm">Clear </button>
                                    </div>
                                    <div class="w-1/2 flex justify-end items-center">
                                        <a href="" class="px-4 tracking-wide hover:bg-blue-800   py-3 rounded bg-blue-700 text-white font-bold shadow-md">Get Started</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    ` ;
                    $('#modelAble').append(element);
                    rangeInput () ; priceInput () ;
                    $('#modelAble').show();
                }
            });
            // Range Input ;
            function rangeInput () {
                let rangeInputs = $('.range-input input');
                let progess = $('.slider .progess');
                let priceInputs = $('.priceInput input');
                let priceGap = 1000 ;
                rangeInputs.each((index, input) => {
                    $(input).on('input', (e) => {
                        let minValue = parseInt($(rangeInputs[0]).val());
                        let maxValue = parseInt($(rangeInputs[1]).val());
                        let right = 100 - (maxValue / rangeInputs[1].max) * 100 ;
                        if(maxValue - minValue < priceGap) {
                            if(e.target.id === "range-min") {
                                $(rangeInputs[0]).val(maxValue - priceGap);
                            }else {
                                $(rangeInputs[1]).val(minValue + priceGap);
                            }
                        }else {
                            $(priceInputs[0]).val(minValue);
                            $(priceInputs[1]).val(maxValue);
                            $(progess).css('left', (minValue / rangeInputs[0].max) * 100 + '%');
                            $(progess).css('right', + right + "%");
                        }
                    });
                });
            }
            // Price Input ;
            function priceInput () {
                let priceInputs = $('.priceInput input');
                let progess = $('.slider .progess');
                let rangeInputs = $('.range-input input');
                let priceGap = 1000 ;
                priceInputs.each((index, input) => {
                    $(input).on('input', (e) => {
                        let minValue = parseInt($(priceInputs[0]).val());
                        let maxValue = parseInt($(priceInputs[1]).val());
                        let right = 100 - (maxValue / rangeInputs[1].max) * 100 ;
                        if((maxValue - minValue >= priceGap) && maxValue <= 10000) {
                            if(e.target.id === "min_price") {
                                $(rangeInputs[0]).val(minValue);
                                $(progess).css('left', (minValue / rangeInputs[0].max) * 100 + '%');
                            }else {
                                $(rangeInputs[1]).val(maxValue);
                                $(progess).css('right', + right + "%");
                            }
                        }
                    });
                });
            }
            // end js 
        }) ;
    </script>
@endsection 