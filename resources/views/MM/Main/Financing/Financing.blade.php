@extends('MM.Layout.app')
@section('title' , 'MM | Financing') 

@section('style') 
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200;0,6..12,300;0,6..12,400;0,6..12,500;1,6..12,200;1,6..12,300;1,6..12,400;1,6..12,500&family=Poppins:ital,wght@0,300;0,500;1,200;1,300&display=swap');
        .hover-main-color {
            border-color : #06CBA3 ;
        }
        #makes_ho:hover {

        }
        .bg-main{
            background : #06CBA3 ;
        }
        .hero-section {
            background-image : linear-gradient(#ecf9f7,#fff);
        }
        .main-font {
            font-family: 'Poppins', sans-serif;
        }
        #rotate {
            transform : translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(-5deg) skew(0deg, 0deg);
        }
    </style>
@endsection 

@section('nav-bar') 
    @parent 
@endsection 

@section('search-1')

@endsection 

@section('content') 
    <main class="">
        <div class="block px-5 pt-2 bg-white border-b-2 relative border-gray-300">
            <div class="flex items-center justify-between ">
                <div id="makes" class="pb-3 border-b-0 hover:border-b-4 hover-main-color">
                    <div >Makes</div>
                </div>
                <div id="el_hy" class="pb-3 border-b-0 hover:border-b-4 hover-main-color">
                    <div >Electric / Hybird </div>
                </div>
                <div id="luxury" class="pb-3 border-b-0 hover:border-b-4 hover-main-color ">
                    <div >Luxury</div>
                </div>
                <div id="sedan" class="pb-3 border-b-0 hover:border-b-4 hover-main-color ">
                    <div >Sedan</div>
                </div>
                <div id="coupe" class="pb-3 border-b-0 hover:border-b-4 hover-main-color ">
                    <div >Coupe</div>
                </div>
                <div id="suv" class="pb-3 border-b-0 hover:border-b-4 hover-main-color ">
                    <div>SUV</div>
                </div>
                <div id="truck" class="pb-3 border-b-0 hover:border-b-4 hover-main-color ">
                    <div>Truck</div>
                </div>
                <div id="van" class="pb-3 border-b-0 hover:border-b-4 hover-main-color ">
                    <div>Van</div>
                </div>
                <div id="convertibles" class="pb-3 border-b-0 hover:border-b-4 hover-main-color ">
                    <div>Convertibles</div>
                </div>
                <div id="hatchback" class="pb-3 border-b-0 hover:border-b-4 hover-main-color ">
                    <div>Hatchback</div>
                </div>
            </div>
            <div class="px-5 bg-white absolute top-[4.5rem] z-30 block w-full left-0 ">
                <div class="hidden z-50" id="makes_ho">
                    <div class="grid grid-cols-3 ">
                        <div class="col-span-2">
                            <h1 class="font-semibold main-color mb-3">All Makes</h1>
                            <div class="grid grid-cols-6">
                                <div class>
                                    <a href="">Acura</a>
                                </div>
                                <div class>
                                    <a href="">Cardilac</a>
                                </div>
                                <div class>
                                    <a href="">Aston Martin</a>
                                </div>
                                <div class>
                                    <a href="">Ford</a>
                                </div>
                                <div class>
                                    <a href="">Toyota</a>
                                </div>
                                <div class>
                                    <a href="">Nissan</a>
                                </div>
                                <div class>
                                    <a href="">Soueast</a>
                                </div>
                                <div class>
                                    <a href="">Baic</a>
                                </div><div class>
                                    <a href="">GAC</a>
                                </div>
                                <div class>
                                    <a href="">BYD</a>
                                </div>
                                <div class>
                                    <a href="">GMC</a>
                                </div>
                                <div class>
                                    <a href="">KIA</a>
                                </div>
                                <div class>
                                    <a href="">Hundai</a>
                                </div>
                                <div class>
                                    <a href="">Hunda </a>
                                </div>
                                <div class>
                                    <a href="">Jetour</a>
                                </div>
                                <div class>
                                    <a href="">Hijet</a>
                                </div>
                                <div class>
                                    <a href="">Changhe</a>
                                </div>
                                <div class>
                                    <a href="">Brillance</a>
                                </div>
                                <div class>
                                    <a href="">Suzuki</a>
                                </div>
                                <div class>
                                    <a href="">Cherovolet</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-1">
                            <img src="{{asset('storage/img/bg_cars.png')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <div class="pt-[98px] overflow-hidden pb-[125px] hero-section">
        <div class="mx-auto mt-0 max-w-[1300px]">
            <div class="grid grid-cols-2 ">
                <div class="pr-10">
                    <h1 class="text-[65px] font-bold main-font" >Smiple , Flexible  Financing</h1>
                    <div class="main-font mt-3 mb-3">
                        <p class="text-[15px] font-light">Get multiple competitive loan offers on the car you want, all in one easy go. Start by getting pre-qualified to see accurate monthly payment estimates while you shop.</p>
                    </div>
                    <div class="mt-5">
                        <a href="" class="px-4 py-3 font-bold bg-main rounded-md border border-gray-400 ">Get Pre-Qualifed</a>
                    </div>
                </div>
                <div>
                    <div class="flex justify-center items-center flex-row">
                        <div class="flex items-center justify-center  relative">
                            <img id="rotate" src="{{asset('storage/svg/background.svg')}}" alt="">
                            <img id="rotate" src="{{asset('storage/svg/bg_car.svg')}}" class="absolute bottom-[75px] left-[90px]" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 

@section('footer') 

@endsection 

@section('script')
    <script>
        $(document).ready(function () {
            let makes = $('#makes');
            let el_hy = $('#el_hy');
            let luxury = $('#luxury');
            let sedan = $('#sedan');
            let coupe = $('#coupe');
            let suv = $('#suv');
            let truck = $('#truck');
            let van = $('#van');
            let convertibles = $('#convertibles');
            let hatchback = $('#hatchback');
            makes.mouseenter(function () {
                $('#makes_ho').show();
            });
            makes.mouseleave(function () {
                $('#makes_ho').hide();
            })
        });
    </script>
@endsection 