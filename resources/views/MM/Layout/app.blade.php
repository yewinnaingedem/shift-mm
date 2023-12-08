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
        ::-webkit-scrollbar  {
            width: 10px ;
            height: 5px;
        }
    </style>
</head>
<body>
    @section('nav-bar')
        @include('MM.Layout.navbar')
    @show 
    <div class="loader none" >
        <div class="flex items-center justify-center h-screen">
            <div class="relative">
                <div class="h-24 w-24 rounded-full border-t-8 border-b-8 border-gray-200"></div>
                <div class="absolute top-0 left-0 h-24 w-24 rounded-full border-t-8 border-b-8 border-blue-500 animate-spin">
                </div>
            </div>
        </div>
    </div>
    <!-- search contianer -->
    <div class="mt-[70px]  loader-content"  >
        @section('search-1') 
            @include('MM.Layout.search_1')
        @show 
        @yield('content')
        @section('footer')
            @include('MM.Layout.footer')
        @show 
    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js" integrity="sha512-uKQ39gEGiyUJl4AI6L+ekBdGKpGw4xJ55+xyJG7YFlJokPNYegn9KwQ3P8A7aFQAUtUsAQHep+d/lrGqrbPIDQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/instantsearch.js@4"></script>
<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
@yield('script')
<script>
    const { createApp } = Vue ;
    createApp({
        data () {
            return {
                searchQuery : null ,
                results : [] ,
            }
        },
        methods : {
            getResults () {
                $.ajax({
                    url : "/admin/search/" + this.searchQuery ,
                    method : "Get" ,
                    success : (data ) => {
                        this.results = data ;
                    },
                    error : (error) => {
                        console.log(error ) ;
                    }
                });

            }
        },
        watch : {
            searchQuery (after , before) {
                if(after !== "") {
                    this.getResults() ;    
                }
                
            }
        },
    }).mount("#app");
</script>

<script>
    $(document).ready(()=> {
        $('.loader').show() ;
        $(window).on('load', function () {
            $('.loader').hide();
        });
    });
</script>
</body>
</html>