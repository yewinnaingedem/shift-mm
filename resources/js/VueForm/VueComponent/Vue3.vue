<template>
    <div class="container">
        <div class="row">
            <div class="fw-bold mb-3 h-3 text-header text-center"> Define Functions Here !</div>
            <div class="col-md-4 col-lg-4 mb-3" v-for="car_fun in datas['functions']" :key="car_fun.id">
                <label  class="d-flex justify-content-center align-items-center main-color p-10 rounded" 
                    
                >
                    <input type="checkbox"  v-model="stepsProgess.function" :value="car_fun.id" class="d-none">
                    <div class="fw-bold ">
                        {{ car_fun.function }}
                    </div>
                </label>
            </div>
            <hr>
        </div>
        <div class='default-function d-flex w-50 m-auto fw-bold cursor-pointer pe-auto mb-3' >
            <div class="function one main-color mr-2" @click="defaultClick">Default Funcions</div>
            <div class="function two main-color" @click="nextClick">Add For Default</div>
        </div>
        <div>
            <component :is="functions[functionEvent]" :defaultFunction="datas['defaultFunctions']"></component>
        </div>
    </div>
</template>

<script>

    import DefaultFunction from './GenerateFunction/DefaultFunction.vue';
    import AdvanceFunction from './GenerateFunction/AdvanceFunction.vue';
    export default {
        name : "Vue3" ,
        data () {
            return {
                functionEvent : 0 ,
                functions : [
                    'DefaultFunction' ,
                    'AdvanceFunction' ,
                ]
            }
        },
        methods : {
            nextClick ( ) {
                return this.functionEvent  = 1
            },
            defaultClick () {
                return this.functionEvent = 0 ;
            }
        },  
        props : {
            datas : {
                type : Object ,
                required : true ,
            },
            stepsProgess : {
                type : Object ,
                required : true ,
            }
        },
        components : {DefaultFunction , AdvanceFunction}
    }
</script>
<style> 
    .mr-2 {
        margin-right: 2px;
    }
    .function {
        padding: 10px;
        cursor: pointer;
    }
    .one  {
        border-radius: 10px 0 0px 10px;
    }
    .two {
        border-radius: 0px 10px 10px 0px;   
    }
</style>