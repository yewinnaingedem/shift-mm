<template>
    <div class="progress-bar-container" v-if="this.progressBarWidth">
        <div class="progress-bar progess" :style="{ width: this.progressBarWidth + '%' }"></div>
    </div>
    <form @submit.prevent="methodCall" method="post" >
        <div class="">
            <i class="fa-solid fa-magnifying-glass absolute top-[15px] left-[28px]"></i>
            <input 
                v-model="inputSearch"
                autocomplete="off"  
                ref="cusorPos"
                class="reg-input  rounded-t-md rounded-tr-md w-input w-full pl-10 pr-2 outline-none border-none focus:ring-0 focus:ring-transparent h-10 bg-neutral-50 " 
                placeholder="Search Keyword, Modals, Type..."
                @keydown.up.prevent="hightPervious"
                @keydown.down.prevent="hightNext(results.length)"
                @keydown.enter.prevent="goDoc(results)"
                @keydown.tab.prevent="moveFocusToNextInput()"
            >
        </div>
        <div class="result w-full relative borer-radious-customize bg-neutral-50  fade-enter-active 2 text-black" v-if="inputSearch">
            <ul class="pb-3 pt-1  w-full bg-neutral-50">
                <li class="rounded-sm mb-[1px] w-full pl-10  bg-neutral-100 py-1" v-if="results.length == 0" >
                    <div class="relative border-l-4 border-green-400">
                        <span class="pl-2 font-medium tracking-wide mr-1">Mingalar Search</span><span class="font-light "> 
                            <span class="font-semibold">&#8220;</span>
                            <span class="italic font-light">{{   inputSearch  }} </span>
                            <span class="font-semibold">&#8220;</span>
                        </span>
                    </div>
                </li>
                <li 
                class=" mb-[1px] w-full pl-10  hover:font-semibold hover:bg-neutral-100
                    py-1" v-if="results" v-for="(data , index) in results" :key="index"
                    :class="(iscurrent(index) ? 'bg-neutral-100 ' : 'bg-neutral-50' )"
                    @mouseover="higthLightIndex = index"
                    @click="check(index)"
                  >
                  <div class="relative hover:border-l-4 hover:border-green-400" @mousover="higthLightIndex = index "
                        :class="{'border-l-4 border-green-400' : iscurrent(index)}"
                    >
                        <span class="pl-2 font-medium tracking-wide mr-1">
                            <span class="me-1 font-semibold" v-if="data">  {{ data.toLocaleLowerCase()}}</span>    
                        </span>
                    </div>
                </li>
            </ul>
        </div>
    </form>
</template>

<script>
import Data from "./Data.json";
    export default {
        name : 'searchableUi'    ,
        data : () => {
            return {
                inputSearch : null ,
                results : [] ,
                data : Data ,
                higthLightIndex : -1 ,
                progressBarWidth : 0 , 
                filteredBrand : true ,
                filteredYear : true ,
                finalBrand : true ,
                finalYear : true ,
                filteredModel : true ,
                passCode : null ,
            }
        },
        watch : {
            inputSearch (input) {
                var inputTextSplited = input.split(" ");
                var inputText = inputTextSplited[inputTextSplited.length - 1].toLowerCase();
                this.results = [] ;
                if (inputText !== "") {
                    if (this.filteredBrand && this.finalBrand) {
                           this.data.brands.some(value => {
                            if (value.brand.toLocaleLowerCase().includes(inputText)) {
                                this.filteredYear = false  ;
                                if (value.brand.toLocaleLowerCase() == inputText) {
                                    this.finalBrand  = false ;
                                    this.filteredYear = true  ;
                                }
                                this.results.push(value.brand);
                            }else {
                                this.filteredYear = true  ;
                            }
                        });
                    }
                    // add brand and some data to it 
                    if (this.filteredYear && this.finalYear ) {
                        var numbersArray = inputText.match(/\b\d+\b/g);
                        if (numbersArray !== null) {
                            this.results = [] ;
                            this.data.years.some(value => {
                                if (value.year.toString().includes(numbersArray[0])) {
                                    if (value.year == numbersArray[0]) {
                                        this.finalYear = false ;
                                    }
                                    this.results.push(value.year);
                                }
                            });
                        }
                    }
                }else {
                    this.finalBrand = true ;
                    this.finalYear = true ;
                    this.results = [] ;
                }
            }
        },
        methods : {

            hightPervious() {
                if(this.higthLightIndex > 0) {
                    this.higthLightIndex -= 1 ;
                }
            },

            moveFocusToNextInput () {
                var splitedText = this.inputSearch.split(' ');
                splitedText[splitedText.length -1] = this.passCode.toLocaleLowerCase();
                this.inputSearch = splitedText.join(" ");
            },  

            hightNext(resultCount) {
                if(this.higthLightIndex < resultCount - 1) {
                    this.higthLightIndex += 1 ;
                }
            },

            iscurrent (index) {
                if(index === this.higthLightIndex && this.results.length !== 0 ) {
                    this.passCode = this.results[index] ;
                    return true ;
                }else {
                    index = null ;
                    return false ;
                }

            },
            goDoc (results) {
                if(this.higthLightIndex > -1 ) {
                    this.fetchData(results[this.higthLightIndex].id)
                }
            },
            fetchData(id) {
                this.progressBarWidth = 0;
                $.ajax({
                    url : "/api/uiserach/"+ id  ,
                    method : "GET" ,
                    dataType : "json",
                    xhr : function () {
                        var xhr =  new window.XMLHttpRequest();
                        xhr.onreadystatechange = function () {
                            var progess = xhr.readyState;
                            if(progess < XMLHttpRequest.DONE ) {
                                this.progressBarWidth =  25 * progess ; 
                            }else {
                                this.progressBarWidth = 100 ;
                                setTimeout(() => {
                                    this.progressBarWidth = 0 ;
                                    this.inputSearch = '';
                                }, 500);
                            }
                            
                        }.bind(this);
                        return xhr ;
                    }.bind(this), 
                    success : function (response) {
                        let searchContianer = $('#fader');
                        let imgUrls = response.imgUrls ;
                        let insert = response.getData ;
                        let data = `
                                    <div class="rounded-xl shadow-md hover:shadow-xl bg-white flex flex-col" >
                                        <div class="for-cars-slide">
                                            <div class="w-full overflow-hidden  rounded-xl " >
                                                <!-- Img Slide-->
                                                <div id="indicators-carousel" class="relative w-full" data-carousel="static">
                                                    <!-- Carousel wrapper -->
                                                    <a href="{{url('mm_cars/car/'. ${insert.brand}.'_'. ${insert.carName}.'_'.${insert.year}.'_'.'id'.'_'.${insert.id})}}">
                                                        <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                                                            ${Object.keys(imgUrls).map((key, index) => `
                                                                <div class="hidden duration-700 ease-in-out" data-carousel-item${index === 0 ? '="active"' : ''}>
                                                                    <img src="${imgUrls[key]}" class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                                                                </div>
                                                            `).join('')}
                                                            <!-- Item 2 -->
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
                                        
                                        <!-- bodyFade  -->
                                        <div class="grow hidden flex flex-col content-between justify-between font-normal overflow-hidden pt-3 px-3 pb-4 body-fade ">
                                            <div class="flex h-[110px] pb-1 justify-between align-baseline font-serif gap-x-4  border-b-2 border-neutral-300">
                                                <a href="">
                                                    <div class="capitalize font-sans text-gray-dark text-[14px] font-bold">
                                                        <div class="h-4 bg-gray-200 rounded-full dark:bg-gray-700 w-[270px] mb-2 "></div>
                                                    </div>
                                                    <div class="text-gray-light text-[13px] grid grid-cols-2 gap-x-2" style="color:rgb(101 , 96 , 96 , )" >
                                                        <div class="h-4 bg-gray-200 rounded-full dark:bg-gray-700 w-full mb-2"></div>
                                                        <div class="h-4 bg-gray-200 rounded-full dark:bg-gray-700 w-full mb-2"></div>
                                                    </div>
                                                    <div class='chat-notification-message grid grid-cols-2 gap-x-2 mb-2' > 
                                                        <h3 class="h-4 bg-gray-200 rounded-full dark:bg-gray-700" style="width: 100%;"></h3>
                                                        <h3 class="h-4 bg-gray-200 rounded-full dark:bg-gray-700" style="width: 100%;"></h3>
                                                    </div>
                                                    <div class="text-gray-light text-[13px] grid grid-cols-2 gap-x-2 mb-2"> 
                                                        <h3 class="h-4 bg-gray-200 rounded-full dark:bg-gray-700" style="width: 100%;"></h3>
                                                        <h3 class="h-4 bg-gray-200 rounded-full dark:bg-gray-700" style="width: 100%;"></h3>
                                                    </div>
                                                </a>
                                                <div>
                                                    <div class="text-right shrink-0 font-sans">
                                                        <div class="text-gray-darkest font-dispaly font-bold font-sans text-xl "> 
                                                            <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-700 mb-2.5"></div>
                                                        </div>
                                                        <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-700 mb-2.5"></div>
                                                        <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-700 mb-2.5"></div>
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
                                        <div class="loader-content" >
                                            <div class="grow flex flex-col content-between justify-between  font-normal pt-3 px-3 pb-4 ">
                                                <div class="flex h-[110px] pb-1 justify-between align-baseline font-serif gap-x-4  border-b-2 border-neutral-300">
                                                    <a href="">
                                                        <div class="capitalize font-sans text-gray-dark text-[14px] font-bold"><span>${insert.year}</span> ${insert.carName} for Sale </div>
                                                        <div class="text-gray-light text-[13px] flex justify-between items-center" style="color:rgb(101 , 96 , 96 , )" >
                                                            <div class="">Kilo:</div>
                                                            <div id="kilo">${insert.kilo_meter}</div>
                                                        </div>
                                                        <div class='chat-notification-message flex justify-between items-center ' > 
                                                            <div class="">Num : </div>
                                                            <div>${insert.license_plate}</div>
                                                        </div>
                                                        <div class="text-gray-light text-[13px] flex justify-between items-center "> 
                                                            <div>Vin:</div>
                                                            <div>${insert.vin}</div>
                                                        </div>
                                                    </a>
                                                    <div>
                                                        <a href="" class="text-right shrink-0 font-sans">
                                                            <div class="text-gray-darkest font-dispaly font-bold font-sans text-xl "> ${insert.price.toLocaleString()}</div>
                                                            <div class=" font-extrabold {{$show ? 'text-red-500' : 'text-gray-500'}}">${insert.grade}</div>
                                                            <div class="font-bold">${insert.type}</div>
                                                            <div class="font-extrabold font-mono">${insert.licenseState}</div>
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
                                    </div>
                                `;
                        searchContianer.empty().append(data);
                        initFlowbite(); 
                    },
                    error : function (error) {
                        console.log(error);
                    }
                })  ;
            },
        },
        beforeDestroy () {
            window.removeEventListener('keydown', this.handleKeyDown); 
        },
        mounted ( ) {
            window.addEventListener('keydown', this.handleKeyDown);
        }
    }
</script>
<style scoped>
    .borer-radious-customize {
        border-radius: 0 0 5px 5px ;
    }
    .bg-suggest-color{
        background : #dfdfdf ;
    }
    .fade-enter-active {
        transition: opacity 0.5s ease;
    }
    .see {
        position: absolute; /* Ensure proper positioning */
        left: 0; /* Adjust positioning according to your layout */
        top: 0;
        width: 100%;
        height: 100%;
        /* Other CSS properties */
    }

    .progress-bar-container {
            width: 100%;
            height: 5px;
            background-color: #f0f0f0;
            position: fixed;
            top: 0; /* Position at the top */
            left: 0;
            z-index: 1000; /* Ensure it's above other content */
            margin-top: 60px; /* 1000; /* Ensure it's above other content */
    }

    .progress-bar {
        height: 100%;
        background-color: #007bff; /* Color of the progress bar */
        transition: width 0.3s ease;
    }

    .progress-label {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: #fff; /* Color of the progress label */
    }
</style>