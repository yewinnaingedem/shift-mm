<template>
    <div class="container">
        <div class="row">
            <div class="fw-bold mb-3 h-3 text-header d-flex justify-content-center align-items-center  row">
                <div class="col-md-6">
                    Define Functions Here !
                </div>
                <div class="col-md-6  row text-end">
                    <div class="col-md-6">
                        <button class="btn btn-success text-wrap w-10" ref="countData">{{ stepsProgess.functions.length > 0 ? stepsProgess.functions.length : 0 }}</button>
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-danger fw-bold w-10" @click="reduce()">
                            <i class="fa-solid fa-minus"></i>
                        </button>
                    </div>
                    <div class="col-md-3 fw-bold">
                        <button class="btn btn-info w-10" @click="increase()">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </div>
                </div>
      
            </div>

            <div class="col-md-4 col-lg-3 mb-3" v-for="car_fun in datas['functions']" :key="car_fun.id">
                <label  class="d-flex justify-content-center align-items-center main-color p-10 rounded" 
                    :for="car_fun.function"  
                    :class="{ 'bg-dark text-white': stepsProgess.functions.includes(car_fun.id) }"
                >
                    <input type="checkbox"  v-model="stepsProgess.functions" :id="car_fun.function" :value="car_fun.id" class="d-none">
                    <div class="fw-bold text-15px ">
                        {{ car_fun.function }}
                    </div>
                </label>
            </div>
            <hr>
        </div>
        <div class="row mb-3">
            <div class="col-md-6 text-end">
                <div class="d-inline-block">
                    <label for="df-id-no" @click="defaultClick" class="btn btn-primary d-flex justify-content-center align-items-center"
                    :class="(function_name == false  ) ? 'bg-dark' : ' '">
                        <div class="fw-bold">
                            Default Function
                        </div>
                        <input type="radio" class="d-none"  v-model="function_name" :value="false" id="df-id-no">
                    </label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-inline-block">
                    <label for="df-id-yes" @click="nextClick" class="btn btn-primary d-flex justify-content-center align-items-center" 
                    :class="(function_name == true  ) ? 'bg-dark' : ' '">
                        <div class="fw-bold">
                            Set Default Function
                        </div>
                        <input type="radio" class="d-none"  v-model="function_name" :value="true" id="df-id-yes">
                    </label>
                </div>
            </div>
        </div>
        <div>
            <DefaultFunction v-if="function_name == false" :defaultFun="datas['defaultFunctions']"></DefaultFunction>
            <AdvanceFunction v-else :stepFun="advancedf"></AdvanceFunction>
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
                
                function_name  : false ,
                advancedf : {
                    air_conditioning : null , 
                    power_steering : null ,
                    power_windows : null,
                    abs_brakes : null ,
                    airbags : null ,
                    navigation_system : null ,
                    bluetooth_connectivity : null ,
                },
                countData : 0 ,
                testing : [] ,
            }
        },
        methods : {
            nextClick ( ) {
                return this.functionEvent  = 1
            },
            defaultClick () {
                return this.functionEvent = 0 ;
            },
            reduce () {
                if(this.stepsProgess.functions.length > 0) {
                    return this.stepsProgess.functions.length -- ;
                }
            },
            increase () {
                this.countData++;
                const arrayTest = [];
                let test1 = this.$refs.countData.innerText;
                if(test1 < this.datas.functions.length  ) {
                    Object.keys(this.datas.functions).forEach(key => {
                        arrayTest.push(this.datas.functions[key].id);
                    });
                    const newValue = arrayTest[test1 % arrayTest.length];
                    this.stepsProgess.functions.push(newValue);
                }else {
                    alert('Exceeded');
                }
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
        components : { DefaultFunction , AdvanceFunction} ,
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
    .w-10 {
        width: 50px;
    }
    .two {
        border-radius: 0px 10px 10px 0px;   
    }
</style>