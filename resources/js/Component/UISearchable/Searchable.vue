<template>
    <form action="" method="post">
        <div>
            <i class="fa-solid fa-magnifying-glass absolute top-[15px] left-[28px]"></i>
            <input type="text" v-model="inputSearch" autocomplete="off"  id="input_search" class="reg-input w-input rounded w-full pl-10 pr-2 outline-none border-none focus:ring-0 focus:ring-transparent h-10 bg-neutral-50 " placeholder="Search Keyword , Modals , Type ... ">
        </div>
        <div class="result w-full absolute bg-gray-400 px-3 py-2 text-black" v-show="results.length > 0">
            <ul>
                <li v-for="result in results" :key="result.id">
                    {{ result.name }} - {{ result.model }}
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
                        item.name.toLowerCase().includes(value.toLowerCase()) || 
                        item.model.toString().includes(value)
                    );
                }
                return this.results = [] ;

            }
        },
        
    }
</script>
