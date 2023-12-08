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
                                <div class="relative p-2 bg-gray-500" id="search_result"  v-if="results.lenght > 0 ">
                                    <ul v-for="(query , index ) in results" :key="index">
                                        <li>@{{query.brand_name}}</li>
                                    </ul>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="flex md:space-x-2 w-full justify-between border-b-2 border-neutral-100 pb-3">
                        <div class="md:pt-0 md:py-0 md:flex md:flex-1  flex">
                            <button class="flex  bg-white px-2 rounded font-sans  text-sm min-w-[9rem] md:min-w-[9rem] w-full item-center md:jsutify-between h-[42px] items-center justify-between border border-gray-200 focus:ring-0 focus:ring-transparent ml-0 h-42 text-center ">
                                <div>Quick Search </div>
                                <div class="">
                                    <i class="fa-solid fa-chevron-down main-color"></i>
                                </div>
                            </button>
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



<!-- Modal toggle -->


<!-- Main modal -->


<!-- Main modal -->
<div class="w-[50%]">
    <div id="static-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Static modal
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="static-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                        With less than a month to go before the European Union enacts new consumer privacy laws for its citizens, companies around the world are updating their terms of service agreements to comply.
                    </p>
                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                        The European Union’s General Data Protection Regulation (G.D.P.R.) goes into effect on May 25 and is meant to ensure a common set of data rights in the European Union. It requires organizations to notify users as soon as possible of high-risk data breaches that could personally affect them.
                    </p>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button data-modal-hide="static-modal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button>
                    <button data-modal-hide="static-modal" type="button" class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
                </div>
            </div>
        </div>
    </div>
</div>

