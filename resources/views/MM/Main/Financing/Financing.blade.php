@extends('MM.Layout.app')
@section('title' , 'MM | Financing') 

@section('style') 
    <style>
        .hover-main-color {
            border-color : #06CBA3 ;
        }
        #makes_ho:hover {

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
            <div class="px-5 bg-white absolute top-[4.5rem] block w-full left-0 ">
                <div class="hidden" id="makes_ho">
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
                        <div class="col-span-1"></div>
                    </div>
                </div>
            </div>
        </div>
    </main>
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
            makes.hover(function () {
                $('#makes_ho').show();
            }, ()=> {
                $('#makes_ho').hide();
            });
        });
    </script>
@endsection 