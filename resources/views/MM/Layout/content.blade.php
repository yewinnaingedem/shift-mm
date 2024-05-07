<div id="item_search">
    <section class="grid grid-cols-4 auto-rows-fr gap-4 mb-8 mt-5 m-full px-4" id="fader">
        <!-- cart1 -->
        @foreach ($datas as $data)
            <div class="rounded-xl shadow-md hover:shadow-xl bg-white flex flex-col" >
                <!-- header -->
                <div class="for-cars-slide">
                    <div class="w-full overflow-hidden  rounded-xl  " >
                        <!-- Img Slide-->
                        <div id="indicators-carousel" class="relative w-full" data-carousel="static">
                            <!-- Carousel wrapper -->
                            <a href="{{url('mm_cars/car/'.$data->brand_name.'_'.$data->model_name.'_'.$data->year.'_'.'id'.'_'.$data->sale_id)}}">
                                <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                                    <!-- Item 1 -->
                                    <div class="flex items-center justify-center h-56 mb-4 bg-gray-300 rounded dark:bg-gray-700">
                                        <svg class="w-10 h-10 text-gray-200 dark:text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
                                            <path d="M14.066 0H7v5a2 2 0 0 1-2 2H0v11a1.97 1.97 0 0 0 1.934 2h12.132A1.97 1.97 0 0 0 16 18V2a1.97 1.97 0 0 0-1.934-2ZM10.5 6a1.5 1.5 0 1 1 0 2.999A1.5 1.5 0 0 1 10.5 6Zm2.221 10.515a1 1 0 0 1-.858.485h-8a1 1 0 0 1-.9-1.43L5.6 10.039a.978.978 0 0 1 .936-.57 1 1 0 0 1 .9.632l1.181 2.981.541-1a.945.945 0 0 1 .883-.522 1 1 0 0 1 .879.529l1.832 3.438a1 1 0 0 1-.031.988Z"/>
                                            <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.98 2.98 0 0 0 .13 5H5Z"/>
                                        </svg>
                                    </div>
                                    @php
                                        $imageCount = 8; 
                                    @endphp
                                    @foreach(range(1, $imageCount) as $i)
                                        @if(isset($data->{'img'.$i}))
                                            <div class="hidden duration-700 ease-in-out" data-carousel-item="{{ $i == 1 ? 'active' : '' }}">
                                                <img src="{{ asset('storage/' . $data->{'img'.$i}) }}" class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </a>
                            @if($data->bestSeller)
                                <button class="absolute flex rounded-lg main-btn items-center bg-primary text-neutral-100 border-primary top-3 left-3 text-xs  outline-none  tracking-wider py-[4px] px-[8px] capitalize border " >best seller </button>
                            @endif
                            <!-- Slider indicators -->
                            <!-- ml-2   border   p-2 outline-none   capitalize  -->
                            <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
                                @foreach(range( 0 , 7) as $i) 
                                    <button type="button" class="w-3 h-3 rounded-full" aria-current="{{$i == 1 ? 'true' : 'false' }}" aria-label="Slide {{ $i + 1}}" data-carousel-slide-to="{{$i}}"></button>
                                @endforeach
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
                
                <!-- bodyFade  -->
                <div class="grow flex flex-col content-between justify-between font-normal overflow-hidden pt-3 px-3 pb-4 body-fade ">
                    <div class="flex h-[110px] pb-1 justify-between align-baseline font-serif gap-x-4  border-b-2 border-neutral-300">
                        <a href="">
                            <div class="capitalize font-sans text-gray-dark text-[14px] font-bold">
                                <div class="h-4 animate-pulse  bg-gray-200 rounded-full dark:bg-gray-700 w-[270px] mb-2 "></div>
                            </div>
                            <div class="text-gray-light text-[13px] grid grid-cols-2 gap-x-2" style="color:rgb(101 , 96 , 96 , )" >
                                <div class="h-4 animate-pulse bg-gray-200 rounded-full dark:bg-gray-700 w-full mb-2"></div>
                                <div class="h-4 animate-pulse bg-gray-200 rounded-full dark:bg-gray-700 w-full mb-2"></div>
                            </div>
                            <div class='chat-notification-message grid grid-cols-2 gap-x-2 mb-2' > 
                                <h3 class="h-4 animate-pulse bg-gray-200 rounded-full dark:bg-gray-700" style="width: 100%;"></h3>
                                <h3 class="h-4 animate-pulse bg-gray-200 rounded-full dark:bg-gray-700" style="width: 100%;"></h3>
                            </div>
                            <div class="text-gray-light text-[13px] grid grid-cols-2 gap-x-2 mb-2"> 
                                <h3 class="h-4 animate-pulse bg-gray-200 rounded-full dark:bg-gray-700" style="width: 100%;"></h3>
                                <h3 class="h-4 animate-pulse bg-gray-200 rounded-full dark:bg-gray-700" style="width: 100%;"></h3>
                            </div>
                        </a>
                        <div>
                            <div class="text-right shrink-0 font-sans">
                                <div class="text-gray-darkest font-dispaly font-bold font-sans text-xl "> 
                                    <div class="h-2 animate-pulse bg-gray-200 rounded-full dark:bg-gray-700 mb-2.5"></div>
                                </div>
                                <div class="h-2 animate-pulse bg-gray-200 rounded-full dark:bg-gray-700 mb-2.5"></div>
                                <div class="h-2 animate-pulse bg-gray-200 rounded-full dark:bg-gray-700 mb-2.5"></div>
                            </div>
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
                <!-- body content  -->
                <div class="loader-content hidden" >
                    <div class="grow flex flex-col content-between justify-between  font-normal pt-3 px-3 pb-4 ">
                        <div class="flex h-[110px] pb-1 justify-between align-baseline font-serif gap-x-4  border-b-2 border-neutral-300">
                            <a href="">
                                <div class="capitalize font-sans text-gray-dark text-[12px] font-bold"><span>{{$data->year}}</span> <span class="font-semibold">{{$data->brand_name}}</span> {{$data->model_name}} for Sale</div>
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
                                        $show = $data->main_grade == 0 ? true : false ;
                                    @endphp 
                                    <div class=" font-extrabold "> 
                                    @if (!$show)
                                        <span class="font-extrabold ">
                                            {{ $data->main_grade}}
                                        </span>
                                        <span class="font-semibold">Grade</span>
                                    @endif 
                                    </div>
                                    <div class="font-bold">{{$data->transmission_type}}</div>
                                    <div class="font-extrabold font-mono">
                                        <span class="font-bold">{{$data->state}} </span>
                                        <span class="font-semibold">State</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="border-t-1 flex justify-around min-h-[2.75rem]">
                            <a href="" class="text-gray-darkest text-xs font-medium pt-3 flex-grow ">
                                <div class="inline-block text-lg align-top pl-3 pr-3 border-r-2 mt-0.5 main-color relative ">
                                    <i class="fa-solid fa-house i-color" ></i>
                                </div>
                                <div class="inline-block align-top ml-2 ">
                                    <div class="font-bold">Shipping Available</div>
                                    <div>{{$data->company_name}} </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </section>
    <!--  -->
</div>