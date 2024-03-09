<template>
    <form action="" method="post">
        <div>
            <i class="fa-solid fa-magnifying-glass absolute top-[15px] left-[28px]"></i>
            <input type="text" v-model="inputSearch" autocomplete="off"  id="input_search" class="reg-input rounded-t-md rounded-tr-md w-input  w-full pl-10 pr-2 outline-none border-none focus:ring-0 focus:ring-transparent h-10 bg-neutral-50" placeholder="Search Keyword , Modals , Type ... ">
        </div>
        <div class="result w-full relative borer-radious-customize bg-neutral-50  2 text-black" v-if="inputSearch">
            <ul class="pb-3 pt-1  w-full bg-neutral-50">
                <li class="rounded-sm mb-[1px] w-full pl-10  bg-neutral-100 py-1" >
                    <div class="relative border-l-4 border-green-400">
                        <span class="pl-2 font-medium tracking-wide mr-1">Mingalar Search</span><span class="font-light "> 
                            <span class="font-semibold">&#8220;</span>
                            <span class="italic font-light">{{   inputSearch  }} </span>
                            <span class="font-semibold">&#8220;</span>
                        </span>
                    </div>
                </li>
                <li @click="clickAble(data)"  class=" mb-[1px] w-full pl-10 hover:bg-neutral-100 hover:font-semibold
                  bg-neutral-50 py-1" v-if="results" v-for="data in results" :key="data.id">
                    <div class="relative hover:border-l-4 hover:border-green-400">
                        <span class="pl-2 font-medium tracking-wide mr-1">
                            <span class="me-1 font-semibold">  {{ data.carName }}</span>    
                            <span class="me-1 font-light">{{ data.type }}</span>    
                            <span class="me-1 font-light">{{ data.fuleType }}</span>    
                            <span class="me-1 font-light">{{ data.brand }}</span>    
                            <span class="me-1 font-light">{{ data.year }}</span>    
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
            }
        },
        watch : {
            inputSearch (input) {
                var value = input.toLowerCase() ;
                if(value !== "") {
                    return this.results = this.data.filter(item => 
                        item.brand.toLowerCase().includes(value.toLowerCase()) || 
                        item.data.toString().includes(value) ||
                        item.fuleType.toString().includes(value) ||
                        item.carName.toLowerCase().includes(value) ||
                        item.type.toLowerCase().includes(value) ||
                        item.year.includes(value) ||
                        item.licenseState.toString().includes(value) || 
                        item.type.toString().includes(value) 
                    );
                }
                return this.results = [] ;
            }
        },
        methods : {
            clickAble (data ) {
                this.inputSearch = data.carName + " " + data.type + " " + data.fuleType + " " + data.year ;
            }
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
</style>