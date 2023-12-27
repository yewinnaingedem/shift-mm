<div class="relative bg-neutral-10 bg-neutral-100  ">
    <mian class="w-full ">
        <div class="sticky bg-white top-[54px]">
            <div class="border-b-1 border-neutral-50 focus-within:border-neutral-50 ">
                <div class="px-4 md:px-8 flex flex-row flex-wrap content-center gap-y-3 ">
                    <div class="order-first h-10 w-full md:order-none md:mr-1 justify-between ">
                        <div id="app">
                            <form action="" method="post">
                                @csrf 
                                <i class="fa-solid fa-magnifying-glass absolute top-[15px] left-[28px]"></i>
                                <input type="text" v-model="searchQuery" id="input_search" class="reg-input w-input rounded w-full pl-10 pr-2 outline-none border-none focus:ring-0 focus:ring-transparent h-10 bg-neutral-50 " placeholder="Search Keyword , Modals , Type ... ">
                            </form>
                        </div>
                    </div>
                    <div class="flex md:space-x-2 w-full justify-between border-b-2 border-neutral-100 pb-3">
                        <div class="md:pt-0 md:py-0 md:flex md:flex-1  flex">
                            <div id="clickAble">
                                <button type="button" id="clickAble" data-modal-target="crypto-modal" data-modal-toggle="crypto-modal" class="text-gray-900 bg-white hover:bg-gray-100 border border-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-gray-600 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:bg-gray-700">
                                    <div class='mr-2'>
                                        Quick Search 
                                    </div>
                                    <i class="fa-solid fa-chevron-down main-color"></i>
                                </button>
                            </div>
                        </div>
                        <div class="md:pt-0 md:py-0 md:flex md:flex-1  flex">
                            <button data-modal-target="static-modal" data-modal-toggle="static-modal" class="flex   bg-white px-2 rounded font-sans  text-sm min-w-[9rem] md:min-w-[9rem] w-full item-center md:jsutify-between h-[42px] items-center justify-between border border-gray-200 focus:ring-0 focus:ring-transparent ml-0 h-42 text-center ">
                                <div>Make & Model </div>
                                <div class="">
                                    <i class="fa-solid fa-chevron-down main-color"></i>
                                </div>
                            </button>
                        </div>
                        <div class="md:pt-0 md:py-0 md:flex md:flex-1  flex">
                            <button class="flex  bg-white px-2 rounded font-sans  text-sm min-w-[9rem] md:min-w-[9rem] w-full item-center md:jsutify-between h-[42px] items-center justify-between border border-gray-200 focus:ring-0 focus:ring-transparent ml-0 h-42 text-center ">
                                <div>Body Style  </div>
                                <div class="">
                                    <i class="fa-solid fa-chevron-down main-color"></i>
                                </div>
                            </button>
                        </div>
                        <div class="md:pt-0 md:py-0 md:flex md:flex-1  flex">
                            <button class="flex  bg-white px-2 rounded font-sans  text-sm min-w-[9rem] md:min-w-[9rem] w-full item-center md:jsutify-between h-[42px] items-center justify-between border border-gray-200 focus:ring-0 focus:ring-transparent ml-0 h-42 text-center ">
                                <div>Years </div>
                                <div class="">
                                    <i class="fa-solid fa-chevron-down main-color"></i>
                                </div>
                            </button>
                        </div>
                        <div class="md:pt-0 md:py-0 md:flex md:flex-1  flex">
                            <button class="flex  bg-white px-2 rounded font-sans  text-sm min-w-[9rem] md:min-w-[9rem] w-full item-center md:jsutify-between h-[42px] items-center justify-between border border-gray-200 focus:ring-0 focus:ring-transparent ml-0 h-42 text-center ">
                                <div>Prices </div>
                                <div class="">
                                    <i class="fa-solid fa-chevron-down main-color"></i>
                                </div>
                            </button>
                        </div>
                        <div class="md:pt-0 md:py-0 md:flex md:flex-1  flex">
                            <button class="flex  bg-white px-2 rounded font-sans  text-sm min-w-[9rem] md:min-w-[9rem] w-full item-center md:jsutify-between h-[42px] items-center justify-between border border-gray-200 focus:ring-0 focus:ring-transparent ml-0 h-42 text-center ">
                                <div>More Filter </div>
                                <div class="">
                                    <i class="fa-solid fa-chevron-down main-color"></i>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<!-- Main modal -->
<div id="crypto-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow ">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Connect wallet
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm h-8 w-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crypto-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5">
                <ul class="my-4 space-y-3 max-h-[300px] overflow-x-auto" id="modelAble" >
                    
                </ul>
                <div>
                    <a href="#" class="inline-flex items-center text-xs font-normal text-gray-500 hover:underline dark:text-gray-400">
                        <svg class="w-3 h-3 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7.529 7.988a2.502 2.502 0 0 1 5 .191A2.441 2.441 0 0 1 10 10.582V12m-.01 3.008H10M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                        </svg>
                        Why do I need to buy a car wiht Mingalar Show Room</a>
                </div>
            </div>
        </div>
    </div>
</div>


