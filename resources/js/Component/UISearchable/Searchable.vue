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
                @keydown.enter.prevent="goDoc()"
                @keydown.tab.prevent="moveFocusToNextInput()"
            >
            <div
                :class="(inputSearch) ? 'rotate-animation' : 'fade-out' "
                class="absolute top-2 right-[30px] cursor-pointer rotate-180 transition-all duration-300 ease-in-out transform rotate-360" 
                
                @click="clearSearch"  >
                <i class="fa-solid fa-xmark"  ></i>
            </div>
        </div>
        <div class="result w-full relative borer-radious-customize bg-neutral-50  fade-enter-active 2 text-black" v-if="inputSearch">
            <ul class="pb-3 pt-1 max-h-[200px] overflow-x-auto  w-full bg-neutral-50">
                <li class="rounded-sm mb-[1px] w-full pl-10  bg-neutral-100 py-1" v-if="results.length == 0" >
                    <div class="relative border-l-4 border-green-400">
                        <span class="pl-2 font-medium tracking-wide mr-1">Mingalar Search</span><span class="font-light "> 
                            <span class="font-semibold">&#8220;</span>
                            <span class="italic font-light">
                                <span>{{   inputSearch  }} </span>
                            </span>
                            <span class="font-semibold">&#8220;</span>
                        </span>
                    </div>
                </li>
                <li 
                class=" mb-[1px] w-full pl-10  hover:font-semibold hover:bg-neutral-100
                    py-1" v-if="results" v-for="(data , index) in results" :key="index"
                    :class="(iscurrent(index) ? 'bg-neutral-100 ' : 'bg-neutral-50' )"
                    @mouseover="higthLightIndex = index"
                    @click="check(data)"
                  >
                  <div class="relative hover:border-l-4 hover:border-green-400" @mousover="higthLightIndex = index "
                        :class="{'border-l-4 border-green-400' : iscurrent(index)}"
                    >
                        <span class="pl-2 font-medium tracking-wide mr-1">
                            <span class="me-1 font-semibold" v-if="data"> 
                                <span v-if="dotConcept" class="me-[2px]">...</span> 
                                <span>{{ data.toLocaleLowerCase()}}</span>
                            </span>    
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
                finalBodyStyle : true ,
                finalModel : true , 
                filteredBrand : true ,
                filteredYear : true ,
                finalBrand : true ,
                finalYear : true ,
                filteredModel : true ,
                passCode : null ,
                finalResult : [],
            }
        },
        props : {
            asset : {
                required : true ,
            } ,
            route : {
                required : true ,
            }
        },
        watch : {
            inputSearch (input) {
                var inputTextSplited = input.split(" ");
                var inputText = inputTextSplited[inputTextSplited.length - 1].toLowerCase();
                this.results = [] ;
                if (input !== "" && inputText !== null) {
                    if (this.finalBrand) {
                         if (inputText !== "") {
                            this.data.brands.some(value => {
                                if (value.brand.toLocaleLowerCase().includes(inputText)) {
                                    if (value.brand.toLocaleLowerCase() == inputText) {
                                        this.finalBrand  = false ;
                                        this.finalModel = true ;
                                        this.finalResult.push({ 'brand': value.brand.toLocaleLowerCase() });
                                    }else {
                                        this.finalBrand = true ;
                                        this.finalModel = false ;
                                    }
                                    this.results.push(value.brand);
                                }
                            });
                         }
                    }
                    // add brand and some data to it 
                    if (this.finalYear ) {
                        if (inputText !== "" && !isNaN(inputText)) {
                            this.results = [] ;
                            this.data.years.some(value => {
                                if (value.year.toString().includes(inputText)) {
                                    if (value.year.toString() == inputText) {
                                        this.finalYear = false ;
                                        this.finalResult.push({ 'year': value.year });
                                    }else {
                                        this.finalYear = true ;
                                    }
                                    this.results.push(value.year);
                                }
                            });
                        }
                    }

                    // add model and somedata to it 
                    if (this.finalModel) {
                        if (inputText !== "") {
                            this.data.models.some(value => {
                                if (value.model.toLocaleLowerCase().includes(inputText)) {
                                        if (value.model.toLocaleLowerCase() === inputText ) {
                                            this.finalModel = false ;
                                            this.finalBrand = true ;
                                            this.finalResult.push({ 'model': value.model.toLocaleLowerCase() });
                                        }
                                        this.results.push(value.model);
                                    }
                                });
                        }
                    }

                    // add body style 
                    if (this.finalBodyStyle) {
                        if (inputText !== "") {
                            this.data.bodyStyles.some(value => {
                                if (value.bodyStyle.toLocaleLowerCase().includes(inputText)) {
                                    if (value.bodyStyle.toLocaleLowerCase() == inputText) {
                                        this.finalBodyStyle = false ;
                                    }
                                    // this.results.push(value.bodyStyle);
                                }
                            });
                        }
                    }
                }else {
                    this.finalBrand = true ;
                    this.finalYear = true ;
                    this.results = [] ;
                    this.finalResult = [ ];
                }   

            }
        },
        methods : {
            clearSearch () {
                this.inputSearch = "" ;
            } ,
            check (data) {
                var splitedText = this.inputSearch.split(' ');
                splitedText[splitedText.length -1] = data.toLocaleLowerCase();
                this.inputSearch = splitedText.join(" ");
            } ,

            hightPervious() {
                if(this.higthLightIndex > 0) {
                    this.higthLightIndex -= 1 ;
                }
            },
            moveFocusToNextInput () {
                var splitedText = this.inputSearch.split(' ');
                if (this.passCode && this.results.length > 0 ) {
                    splitedText[splitedText.length -1] = this.passCode.toLocaleLowerCase();
                    this.inputSearch = splitedText.join(" ");
                }
            },  

            hightNext(resultCount) {
                if(this.higthLightIndex < resultCount - 1) {
                    this.higthLightIndex += 1 ;
                }
            },
            isObjectArrayValueExists(value, objectArray) {
                // Iterate over each object in the object array
                for (let i = 0; i < objectArray.length; i++) {
                    // Check if the object's values array contains the value
                    const valuesArray = Object.values(objectArray[i]);
                    if (valuesArray.includes(value)) {
                        return true; // Value exists in the object array
                    }
                }
                return false; // Value does not exist in the object array
            } ,

            iscurrent (index) {
                if(index === this.higthLightIndex && this.results.length !== 0 ) {
                    this.passCode = this.results[index] ;
                    return true ;
                }else {
                    index = null ;
                    return false ;
                }

            },
            ui_response (response) {
                let inserts = response.getData ;
                let searchContianer = $('#fader');
                let dataContent = "" ;
                var routeUrl = this.route  ;
                var baseUrl = this.asset ;
                if (inserts.length >= 1  ) {
                        $.each(inserts , function (index , data)
                        {   
                        dataContent += `<div class="rounded-xl shadow-md hover:shadow-xl bg-white flex flex-col" >
                                        <!-- header ${index} -->
                                        <div class="for-cars-slide">
                                            <div class="w-full overflow-hidden  rounded-xl  " >
                                                <!-- Img Slide-->
                                                <div id="indicators-carousel" class="relative w-full" data-carousel="static">
                                                    <!-- Carousel wrapper -->
                                                    <a href="${routeUrl + '/' + data.brand_name + '_' + data.model_name + '_' + data.year  + '_'+ 'id'+ '_' + data.sale_id}">
                                                        <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                                                            <!-- Item 1 -->
                                                        ${(() => {
                                                            const imageCount = 8; 
                                                            let html = '';
                                                            for (let i = 1; i <= imageCount; i++) {
                                                                const imageUrl = data['img' + i]; // Assuming data is an object containing image URLs
                                                                if (imageUrl) {
                                                                    html += `
                                                                        <div class="duration-700 ease-in-out" data-carousel-item="${i === 1 ? 'active' : ''}">
                                                                            <img src="${baseUrl}/${imageUrl}" class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="carImage">
                                                                        </div>`;
                                                                }
                                                            }
                                                            return html;
                                                        })()}
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
                                        <div class="grow flex flex-col content-between justify-between font-normal overflow-hidden pt-3 px-3 pb-4 body-fade ">
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
                                        <div class="loader-content hidden" >
                                            <div class="grow flex flex-col content-between justify-between  font-normal pt-3 px-3 pb-4 ">
                                                <div class="flex h-[110px] pb-1 justify-between align-baseline font-serif gap-x-4  border-b-2 border-neutral-300">
                                                    <a href="">
                                                        <div class="capitalize font-sans text-gray-dark text-[14px] font-bold"><span>${data.year}</span> <span class="font-semibold">${data.brand_name}</span> ${data.model_name} for Sale </div>
                                                        <div class="text-gray-light text-[13px] flex justify-between items-center" style="color:rgb(101 , 96 , 96 , )" >
                                                            <div class="">Kilo:</div>
                                                            <div id="kilo">${data.kilo_meter}</div>
                                                        </div>
                                                        <div class='chat-notification-message flex justify-between items-center ' > 
                                                            <div class="">Num : </div>
                                                            <div>${data.license_plate}</div>
                                                        </div>
                                                        <div class="text-gray-light text-[13px] flex justify-between items-center "> 
                                                            <div>Vin:</div>
                                                            <div>${data.vin}</div>
                                                        </div>
                                                    </a>
                                                    <div>
                                                        <a href="" class="text-right shrink-0 font-sans">
                                                            <div class="text-gray-darkest font-dispaly font-bold font-sans text-xl price"> ${data.price}</div>
                                                            <div class=" font-extrabold ">${data.main_grade} <span>Grade</span> </div>
                                                            <div class="font-bold">${data.transmission_type}</div>
                                                            <div class="font-extrabold font-mono">${data.state} <span>State</span></div>
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
                                </div>`;
                        }) ;
                        searchContianer.empty().append(dataContent);
                        let x = setInterval(() => {
                            $('.body-fade').remove();
                            $('.loader-content').removeClass('hidden');
                            clearInterval(x);
                        }, 500);
                }else {
                    const warningAlert = 
                    `
                        <div id="alert-1" class="flex alert-container items-center mx-auto fixed top-0 left-0 right-0  p-4 mb-4 text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
                            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                            </svg>
                            <span class="sr-only">Info</span>
                            <div class="ms-3 text-sm font-medium">
                                Sorry ! We couldn't find any match car from <a href="#" class="font-semibold underline hover:no-underline">Mingalar Car Showroom</a>. Give it a click if you wannat reflesh.
                            </div>
                            <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-blue-50 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-blue-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-1" aria-label="Close">
                                <span class="sr-only">Close</span>
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                            </button>
                        </div>
                    `;
                    initFlowbite(); 
                    $('body').prepend(warningAlert);
                    setTimeout(() => {
                        $('#alert-1').remove() ;
                    }, 20000);
                }
                let numberOfElement = $('.for-cars-slide').length ;
                $('#showResult').html(numberOfElement);
                initFlowbite(); 
            }, 
            updateObjectArrayWithIndexArray(indexArray, objectArray) {
                indexArray.forEach(value => {
                        // Check if the value exists in the object array
                        const key = this.isObjectArrayValueExists(value, objectArray);
                        if (key !== null) {
                            console.log(`Value ${value} found in object array at key ${key}`);
                        } 
                    });
            },
            goDoc () {
                if (this.inputSearch !== "" ) {
                    var arr1 = this.inputSearch.split(" ");
                    var count = 0 ;
                    if (arr1[arr1.length -1] == null || arr1[arr1.length -1] == "") {
                        arr1.pop() ;
                    }
                    this.updateObjectArrayWithIndexArray(arr1 , this.finalResult) ;
                    arr1.forEach(value => {
                    // Check if the value exists in the object array
                        if (!this.isObjectArrayValueExists(value, this.finalResult)) {
                            // If the value doesn't exist, add it to the object array
                            const newObj = {};
                            newObj["id" + ++count] = value;
                            this.finalResult.push(newObj);
                        }
                    });
                    this.fetchData() ;
                }
            },
            fetchData() {
                this.progressBarWidth = 0;
                var formData = this.finalResult ;
                $.ajax({
                    url : "/api/uiserach/list"  ,
                    method : "POST" ,
                    data : {
                        dataSearch  : formData ,
                    }, 
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
                    success :  (response) => {
                        this.ui_response(response);
                    },
                    error : function (error) {
                        console.log(error);
                    }
                })  ;
            },
        },
        computed : {
            dotConcept(){
                var splitedText = this.inputSearch.split(" ");
                return splitedText.length > 1 ? true : false ;
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
    
    .see {
        position: absolute; /* Ensure proper positioning */
        left: 0; /* Adjust positioning according to your layout */
        top: 0;
        width: 100%;
        height: 100%;
        /* Other CSS properties */
    }
    .rotate-animation {
       animation: rotate 0.3s ease-in-out forwards;
    }

    @keyframes rotate {
        from {
            transform: rotate(0deg);
        }
        to {
            transform: rotate(180deg);
        }
    }
    .fade-out {
        animation: fadeOut 0.3s ease-in-out forwards;
    }

    @keyframes fadeOut {
        from {
            opacity: 1;
            transform: rotate(360deg);
        }
        to {
            opacity: 0;
            transform: rotate(0deg);
        }
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
<style>
    @keyframes fall {
        0% {
            transform: translateY(-100%);
        }
        15% {
            transform: translateY(-75%);
        }
        30% {
            transform: translateY(-50%);
        }
        45% {
            transform: translateY(-30%);
        }
        60% {
            transform: translateY(-10%);
        }
        75% {
            transform: translateY(-5%);
        }
        100% {
            transform: translateY(0);
        }
    }

    .alert-container {
        animation: fall 0.5s cubic-bezier(0.1, 0.7, 1.0, 0.1) forwards;
    }
</style>