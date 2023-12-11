<div id="item_search">
    <section class="grid grid-cols-4 auto-rows-fr gap-4 mb-8 mt-5 m-full px-4">
        <!-- cart1 -->
        @foreach ($datas as $data)
            <div class="rounded-xl shadow-md hover:shadow-xl bg-white flex flex-col">
                <!-- header -->
                <div class="for-cars-slide">
                    <div class="w-full overflow-hidden  rounded-xl  " >
                        <!-- Img Slide-->
                        <div id="indicators-carousel" class="relative w-full" data-carousel="static">
                            <!-- Carousel wrapper -->
                            <a href="{{url('mm_cars/car/'.$data->brand_name.'_'.$data->model_name.'_'.$data->year.'_'.'id'.'_'.$data->sale_id)}}">
                                <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                                    <!-- Item 1 -->
                                    <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
                                        <img src="{{asset('storage/'.$data->img1)}}" class="absolute block w-full -translate-x-1/2 h-full object-cover -translate-y-1/2 top-1/2 left-1/2" alt="...">
                                    </div>
                                    <!-- Item 2 -->
                                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                        <img src="{{asset('storage/'.$data->img2)}}" class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                                    </div> 
                                    <!-- Item 3 -->
                                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                        <img src="{{asset('storage/'.$data->img3)}}" class="absolute block w-full  h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                                    </div>
                                    <!-- Item 4 -->
                                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                        <img src="{{asset('storage/'.$data->img4)}}" class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                                    </div>
                                    <!-- Item 5 -->
                                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                        <img src="{{asset('storage/'.$data->img5)}}" class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                                    </div>
                                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                        <img src="{{asset('storage/'.$data->img6)}}" class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                                    </div>
                                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                        <img src="{{asset('storage/'.$data->img7)}}" class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                                    </div>
                                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                        <img src="{{asset('storage/'.$data->img8)}}" class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                                    </div>
                                </div>
                            </a>
                            <!-- Slider indicators -->
                            <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
                                <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
                                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
                                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
                                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 6" data-carousel-slide-to="4"></button>
                                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 7" data-carousel-slide-to="4"></button>
                                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 8" data-carousel-slide-to="4"></button>
                            </div>
                            <!-- Slider controls -->
                            <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                    <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                                    </svg>
                                    <span class="sr-only">Previous</span>
                                </span>
                            </button>
                            <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                    <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                    </svg>
                                    <span class="sr-only">Next</span>
                                </span>
                            </button>
                        </div>

                    </div>
                </div>
                <!-- body -->
                <div class="grow flex flex-col content-between justify-between font-normal pt-3 px-3 pb-4 ">
                    <div class="flex h-[110px] pb-1 justify-between align-baseline font-serif gap-x-4  border-b-2 border-neutral-300">
                        <a href="">
                            <div class="capitalize font-sans text-gray-dark text-[14px] font-bold"><span>{{$data->year}}</span> {{$data->model_name}} for Sale </div>
                            <div class="text-gray-light text-[13px] flex justify-between items-center" style="color:rgb(101 , 96 , 96 , )" >
                                <div class="">Kilo:</div>
                                <div id="kilo">{{$data->kilo_meter}}</div>
                            </div>
                            <div class='chat-notification-message flex justify-between items-center ' > 
                                <div class="">Num : </div>
                                <div>{{$data->license_plate}}</div>
                            </div>
                            <div class="text-gray-light text-[13px] flex justify-between items-center "> 
                                <div>Vin:</div>
                                <div>{{$data->vin}}</div>
                            </div>
                        </a>
                        <div>
                            <a href="" class="text-right shrink-0 font-sans">
                                <div class="text-gray-darkest font-dispaly font-bold font-sans text-xl price"> {{$data->price }}</div>
                                @php 
                                    $show = $data->main_grade == 0 ? TRUE : FALSE ;
                                @endphp 
                                <div class=" font-extrabold {{$show ? 'text-red-500' : 'text-gray-500'}}">{{$show ? " " : $data->main_grade}}</div>
                                <div class="font-bold">{{$data->transmission_type}}</div>
                                <div class="font-extrabold font-mono">{{$data->state}}</div>
                            </a>
                        </div>
                    </div>
                    <div class="border-t-1 flex justify-around min-h-[2.75rem]">
                        <a href="" class="text-gray-darkest text-xs font-medium pt-3 flex-grow ">
                            <div class="inline-block text-lg align-top pl-3 pr-3 border-r-2 mt-0.5 border-display relative ">
                                <i class="fa-solid fa-house i-color" ></i>
                            </div>
                            <div class="inline-block align-top ml-2 ">
                                <div class="font-bold">Shipping Available</div>
                                <div>Mingalar Car Sale Center </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
        
    </section>
</div>