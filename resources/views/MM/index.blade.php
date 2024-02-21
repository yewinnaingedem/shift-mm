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
    <script>
        $(document).ready(function () {
            $('.body-fade').show() ;
            $(window).on('load', function () {
                $('.body-fade').remove();
                $('.loader-content').removeClass('hidden'); 
            } 
            );
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
                            <div>
                                <div class="flex flex-col sm:flex-row gap-4">
                                    <div class="flex flex-col w-full sm:w-1/2">
                                        <label for="min_price" class="text-sm font-medium text-gray-700">Min</label>
                                        <input type="number" id="min_price" name="min_price" value="2772" class="mt-1 p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                                    </div>
                                    <div class="flex flex-col w-full sm:w-1/2">
                                        <label for="max_price" class="text-sm font-medium text-gray-700">Max</label>
                                        <input type="number" id="max_price" name="max_price" value="8018" class="mt-1 p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                                    </div>
                                </div>
                            </div>

                            <div class="relative">
                            <input type="range" id="price-range" name="price-range" min="2772" max="8018" value="2772" class="w-full h-2 bg-gray-200 appearance-none rounded-lg cursor-pointer">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <span id="price-range-value" class="text-sm font-medium text-gray-700">2772</span>
                            </div>
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                <span id="price-range-max" class="text-sm font-medium text-gray-700">8018</span>
                            </div>
                            </div>
                        </li>
                    ` ;
                    $('#modelAble').append(element);
                    $('#modelAble').show();
                }
            });
            

        });
    </script>
@endsection 