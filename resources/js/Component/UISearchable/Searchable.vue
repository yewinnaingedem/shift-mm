<template>
    <form action="" method="post">
        <div>
            <i class="fa-solid fa-magnifying-glass absolute top-[15px] left-[28px]"></i>
            <input type="text" v-model="inputSearch" autocomplete="off"  id="input_search" class="reg-input w-input rounded w-full pl-10 pr-2 outline-none border-none focus:ring-0 focus:ring-transparent h-10 bg-neutral-50 " placeholder="Search Keyword , Modals , Type ... ">
        </div>
        <div class="result w-full relative borer-radious-customize bg-gray-50 px-3 py-2 text-black" v-show="results.length > 0">
            <ul>
                <li class="px-[25px] py-[5px] mb-[1px] bg-suggest-color rounded" v-for="result in results" :key="result.id">
                    <span v-html="hightLightMatchedWorlds(result.data)"></span>
                     <span>{{ result.carName }}{{ result.year }} {{ result.type }} {{ result.grade }} </span>
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