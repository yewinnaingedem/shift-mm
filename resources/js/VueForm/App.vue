<template >
    <div class="container pt-3">
        <div class="step-container">
            <ul class="step-list mb-4 mb-botton">
                <li class="step" v-for="(step , index ) in steps" :key="step" :class="( index  == currentSteps ) ? 'step-active' : ' ' , (index < currentSteps) ? 'step-done' : ' ' "
                >
                    <div class="step-bubble"> {{ index + 1}}</div>
                    <div class="step-line">
                        <div class="line-fill">
                            
                        </div>
                    </div>
                    <div class="step-label">
                        {{ step }}
                    </div>
                </li>
            </ul>
            <div class='min-height-350'>
                <component :is="steps[currentSteps]" :datas="datas" :stepsProgess="stepProgess[currentSteps]"></component>
            </div>
            <div class="container pt-2">
                <div class="row">
                    <div class="col-md-6">
                        <button class="btn btn-primary" v-on:click="nextStep">Next</button>
                    </div>
                    <div class="col-md-6 text-end"  v-if="currentSteps > 0">
                        <button class="btn btn-primary " v-on:click="previousStep">Perivous Steps</button>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    
    
</template>

<script>
    import Vue1 from "./VueComponent/Vue1.vue";
    import Vue2 from "./VueComponent/Vue2.vue";
    import Vue3 from "./VueComponent/Vue3.vue";

    export default {
        data () {
            return {
                
                currentSteps : 0,
                steps : ['Vue1', 'Vue2' , 'Vue3'] ,
                stepProgess : [
                    {
                        transmission : null ,
                        body_style : null ,
                        engine : {
                            engine_power : null ,
                            cylinder : null ,
                            fuel_type : null ,
                            turbo : false ,
                        }
                    },
                    {
                        divertrim : null ,
                        key: null ,
                        sun_roof : null ,
                        motor : null ,
                        aircon : null  ,
                        seat : null ,
                    },{
                        functions : [],
                        
                    }
                ],
                removeBar : false ,
            }
            
        },
        components : {
            Vue1 ,
            Vue2, 
            Vue3
        },  
        methods : {
            nextStep () {
                if(this.currentSteps < this.steps.length -1) {
                    this.currentSteps ++ ;
                }
            },
            previousStep () {
                if(this.currentSteps > 0) {
                    this.currentSteps -- ;
                }
            }
        },
        props : {
            datas : {
                type : Object ,
                required : true ,
            }
        },
        mounted ( ) {
            this.removeBar ;
        } , 
        computed : {
            removeBarTe () {
                this.removeBar = this.steps.length > 0 ? true : false ;
            }
        }
    }

</script>

<style scoped>
    .step-label {
        font-size: 18px;
        font-weight: 500;
        position: absolute;
        bottom: -20px;
    }
    .mb-botton {
        margin-bottom: 1px solid black;
    }
.step-container {
        width: 95%;
        margin : 0 auto ;
    }
    .step-list {
        display: flex;
        list-style: none;
    }
     .step-done .line-fill {
        width : 100% ;
     }
     .h-96 {
        height: 300px;
     }
     .step-bubble {
        color : #fff ;
        font-weight: 500;
        font-size: 20px;
     }
    .step {
        display: flex;
        flex-grow: 1; 
        max-width: 100%;
        align-items: center;
        position: relative;
        height : 60px ;
    }
    .min-height-350 {
        min-height   : 350px ;
        max-height:  440px;
        overflow-x: auto;
        background: #d7dce2;
        border-radius: 10px;
        padding-top: 5px;
    }
    .step-bubble {
        width: 35px;
        height: 35px;
        z-index: 100;
        border-radius: 50%;
        background: #4ade80;
        transition: all 0.3s ease;
        display: flex;
        overflow: hidden;
        align-items: center;
        justify-content: center;
    }
    .step-in-advance .line-fill {
        width: 50%;
    }
    .step-label {
        opacity: 0.7;
    }
    .step-line {
        width: 100%;
        height: 5px;
        background-color: #86efac;
        left: 0;
        position: absolute;
        transform: translateY(-50%);
        top: 50%;
    }
    .step:nth-child(2) {
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .min-height-350::-webkit-scrollbar-track{
        background: tomato;
    }
    .min-height-350::-webkit-scrollbar-thumb {
        width: 10px;
        border-radius: 10px
    }
    .step:last-child {
        width: 50px;
        display: flex;
        justify-content: end;
        align-items: center;
    }
    .step-active .step-bubble ,
    .step-done .step-bubble {
        width: 50px;
        height: 50px;
    }
    .step-active .step-label ,
    .step-done .step-label  {
        opacity: 1;
    }
    
    
</style>