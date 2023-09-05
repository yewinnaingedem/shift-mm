<div class="header ">
    <div class="fixed z-[9999] w-full top-0 bg-white shadow">
        <div class="flex py-5 px-8 justify-between cursor-pointer font-semibold  align-baseline h-[60px] border-b-1 border-neutral-100">
            <div>
                <a href="{{url('mm_cars')}}" class="header_logo text-lg">
                    <h1 class="font-bold main-color">Shift MM</h1>
                </a>
            </div>
            <div class="flex ">
                <div class="inline-block align-baseline ">
                    <button class="flex h-[36px] mr-[12px]  gap-x-1.5 ">
                        <i class="fa-solid fa-location-dot mt-[3px]"></i>
                        <div>1500</div>
                    </button>
                </div>
                <div class="inline-block align-middle ">
                    <a href="">
                        <i class="fa-solid fa-heart"></i>
                    </a>
                </div>
                <ul class="list-none text-sm   2xl:block ">
                    <li class="inline-block px-3 "><a href="">Shop Cars</a></li>
                    <li class="inline-block px-3 "><a href="">Sell & Trade </a></li>
                    <li class="inline-block px-3 "><a href="">Financing</a></li>
                    <li class="inline-block px-3 "><a href="">How Shop MM Work?</a></li>
                    <li class="inline-block px-3 relative" id="register">
                        <div class="flex align-baseline ml-1">
                            <div >More</div>
                            <div class="self-center ml-1 ">
                                <i class="fa-solid fa-caret-down main-color" ></i>
                            </div>
                        </div>
                        <div id="register_down" class="absolute  top-[43px] left-[-80px] border border-gray-700  w-32 font-medium text-gray-900 bg-white rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                            @if(Auth::user())
                            <a href="{{url('mm_cars/log-out')}}" aria-current="true" class="block text-center w-full px-4 py-2   border-b border-gray-200 rounded-t-lg cursor-pointer dark:bg-gray-800 dark:border-gray-600">
                                Logout 
                            </a>
                            <a href="{{url('mm_cars/profile/'.Auth::user()->id)}}" class="font-semibold text-center block p-3">
                                Setting 
                            </a>
                            @else 
                            <a href="{{url('mm_cars/log-in')}}" aria-current="true" class="block text-center w-full px-4 py-2   border-b border-gray-200 rounded-t-lg cursor-pointer dark:bg-gray-800 dark:border-gray-600">
                                Log In  
                            </a>
                            <a href="{{url('mm_cars/register')}}" class="block text-center p-3 font-semibold">
                                Register
                            </a>
                            @endif 
                        </div>
                    </li>
                    @if(Auth::user())
                    <li class="inline-block align-baseline ">
                        <a href="{{url('mm_cars/profile/'.Auth::user()->id)}}" class="border border-neutral-400 box-content text-xs rounded py-3 px-5">{{Auth::user()->name}}</a>
                    </li>
                    @else 
                    <li class="inline-block align-baseline ">
                        <a href="{{url('mm_cars/log-in')}}" class="border border-neutral-400 box-content text-xs rounded py-3 px-5">Sing In</a>
                    </li>
                    @endif 
                </ul>
            </div>
        </div>
    </div>
</div>