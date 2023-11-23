<template>
    <div class="container">
        <div class="row">
            <div class="fw-bold mb-3 h-3 text-header text-center"> Define Functions Here !</div>
            <div class="col-md-4 col-lg-3 mb-3" v-for="car_fun in datas['functions']" :key="car_fun.id">
                <label  class="d-flex justify-content-center align-items-center main-color p-10 rounded" 
                    
                >
                    <input type="checkbox"  v-model="stepsProgess.function" :value="car_fun.id" class="d-none">
                    <div class="fw-bold text-15px ">
                        {{ car_fun.function }}
                    </div>
                </label>
            </div>
            <hr>
        </div>
        <div class="row mb-3">
            <div class="col-md-6 text-end">
                <button class="btn btn-primary" @click="defaultClick">Default Functions</button>
            </div>
            <div class="col-md-6">
                <button class="btn btn-primary" @click="nextClick">Add For Default</button>
            </div>
        </div>
        <div>
            <component :is="functions[functionEvent]"  :stepFun="advancedf" :defaultFun="datas['defaultFunctions']"></component>
        </div>
    </div>
</template>

<script>
    import defaultFunction from "./GenerateFunction/DefaultFunction.vue";
    import AdvanceFunction from './GenerateFunction/AdvanceFunction.vue';
    export default {
        name : "Vue3" ,
        data () {
            return {
                functionEvent : 0 ,
                functions : [
                    'defaultFunction' ,
                    'AdvanceFunction' ,
                ],
                advancedf : {
                    air_conditioning : null , 
                    power_steering : null ,
                    power_windows : null,
                    abs_brakes : null ,
                    airbags : null ,
                    navigation_system : null ,
                    bluetooth_connectivity : null ,
                }
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
        components : { defaultFunction , AdvanceFunction} ,
        mounted () {
            
        }
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
    .text-15px {
        font-size: 15px;
    }
    .two {
        border-radius: 0px 10px 10px 0px;   
    }
</style>