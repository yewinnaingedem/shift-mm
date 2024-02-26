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

    <div class="wrapper m-3">
        <div class="header flex px-3">
            <div class="w-1/2">
                <div class="w-1/3  flex text-[15px] ">
                    <div class="flex w-full p-2 items-center bg-gray-50 border  hover:bg-gray-100 rounded  ">
                        <div class="w-[75%] tracking-wider font-semibold">Show Result :</div>
                        <div class="w-1/4 font-bold">105 
                            <span>
                                <i class="fa-solid fa-angle-down"></i>
                            </span> 
                        </div>
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
        $(document).ready(function () {
            $('.body-fade').show() ;
            var targetArr = [] ;
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
                targetArr = [] ;
                $('#grapItem').empty(); 
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
                                        <a href="#" class="flex items-center choseItem p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
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

            function generateHTMLString(arr) {
                var htmlString = "";
                arr.forEach(function(target) {
                    htmlString += `
                        <li>
                            <button class="bg-gray-50 py-[6px] px-[15px] hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white rounded-lg hover:bg-gray-100 shadow-sm">
                                <span class="font-bold text-input text-[15px] text-gray-700 me-1">&quot;${target}&quot;</span>
                                <span class="font-lighter delete-icon text-[#717387]">
                                    <i class="fa-solid fa-xmark"></i>
                                </span>
                            </button>
                        </li>
                    `;
                });
                $('#grapItem').empty().append(htmlString);
            }
            
            
            $(document).on('click', '.choseItem', (e) => {
                e.preventDefault();
                var currentEle = $(e.currentTarget);
                var value = currentEle.find('span').text().trim();
                
                // Check if the value is not already in the targetArr
                if (!targetArr.includes(value) && targetArr.length <= 2) {
                    targetArr.push(value);
                }
                generateHTMLString(targetArr) ;
            });

            $(document).on('click' , ".delete-icon" , (e) => {
                var targetEle = $(e.currentTarget) ;
                var row = targetEle.parent() ;
                var text = row.find('.text-input').text().trim() ;
                var origin = text.replace(/"/g, '')
                var index = $.inArray(origin, targetArr);
                if (index !== -1) {
                    targetArr.splice(index, 1);
                }
                generateHTMLString(targetArr) ;
            });

            $(document).on('click','.clear-data' , function () {
                targetArr = [] ;
                generateHTMLString(targetArr) ;
            })
            // end js 
        }) ;
        
    </script>
@endsection 