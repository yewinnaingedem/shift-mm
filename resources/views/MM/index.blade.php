@extends('MM.Layout.app')

@section('title' , 'Shop MM ') 
@section('style')
    <style>
        .font-dispaly{
            color : #06CBA3 ;
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
                
                let $curretTarget = $(e.currentTarget);
                let $idValut = $curretTarget.attr('id');
                $.ajax({
                    url : "http://localhost:8000/api/" + $idValut ,
                    type : "Get" ,
                    success : (response) => {
                        var element = " " ;
                        $('#loadContent').remove();
                        $('#modelAble').empty();
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
                        let $classCount = $('.count').lenght ;
                        console.log($classCount);
                    },
                    error : (error) => {
                        console.log(error);
                    }
                })
            });
            

        });
    </script>
@endsection 