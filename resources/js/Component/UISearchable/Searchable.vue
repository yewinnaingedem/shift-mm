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
                <li class=" mb-[1px] w-full pl-10 hover:bg-neutral-100 hover:font-semibold  bg-neutral-50 py-1" v-for="data in results" :key="data.id">
                    <div class="relative ">
                        <span class="pl-2  tracking-wide ">{{ data.carName }}</span>
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
            inputSearch (value) {
                if(value !== "") {
                    return this.results = this.data.filter(item => 
                        item.brand.toLowerCase().includes(value.toLowerCase()) || 
                        item.data.toString().includes(value)
                    );
                }
                return this.results = [] ;

            }
        },
        methods : {
            hightLightMatchedWorlds (text) {
                if (!this.inputSearch) return text;
                const words = this.inputSearch.trim().split(/\s+/);
                if(words.length > 0) {
                    const suggestions = []; 
                    for(const word of words) {
                        const wordSuggestions = this.data.filter(item =>
                        item.brand.toLowerCase().includes(word.toLowerCase())
                        ).map(item => item.brand);
                        suggestions.push(...wordSuggestions);
                    }
                    console.log(suggestions);
                }
                
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