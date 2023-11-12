<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite('resources/css/app.css')
    @yield('style')
    <style>
        .font-dispaly , .i-color{
            color : #06CBA3 ;
        }
        .border-display {
            border-color : #06CBA3 ;
        }
        #register_down{
            display :none ;
        }
        #register_down.active_hidden {
            display :block ;
        }
        .text-navy-dark {
            color : #18222e ;
            opacity: 0.8;
        }
        .main-color {
            color : #06CBA3 ;
        }
        .c-hover:hover {
            color : #06cba3;
        }
        .loader {
            width: 100%;
            height: 100vh;
            background : tomato ;
            position: absolute;
        }
        .loader-content{
            
        }
    </style>
</head>
<body>
    @section('nav-bar')
        @include('MM.Layout.navbar')
    @show 
    <!-- search contianer -->
    <div class="mt-[70px]  loader-content"  >
        @section('search-1') 
            @include('MM.Layout.search_1')
        @show 
        @section('content')
            @include('MM.Layout.content')
        @show 

        @section('footer')
            @include('MM.Layout.footer')
        @show 
    </div>
    <div class="loader">

    </div>
    
    


<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js" integrity="sha512-uKQ39gEGiyUJl4AI6L+ekBdGKpGw4xJ55+xyJG7YFlJokPNYegn9KwQ3P8A7aFQAUtUsAQHep+d/lrGqrbPIDQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@yield('script')
<script>
    $(document).ready(function () {
        $(document).on(()=>{
            $('#input_search').focus();
        });
        $(document).on('click','#register' , ()=> {
            $("#register_down").toggle('active_hidden');
        });
        $(window).scroll(()=> {
            $('#register_down').fadeOut();
        });

        $(window).on('load',()=> {
            $('.loader').fadeOut('slow');
            $('loader-content').show('slow');
        });
        var session = "{{session('visited_at')}}" ;

        var elpsedTime = Math.floor((new Date() - new Date(session)) / 1000) ;
        console.log(session);
    })
</script>
</body>
</html>