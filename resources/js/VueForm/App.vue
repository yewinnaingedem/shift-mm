<template >
    <div class="container pt-3">
        <div class="step-container">
            <ul class="step-list">
                <li class="step" v-for="(step , index ) in steps" :key="step" :class="( index  == currentSteps ) ? 'step-active' : ' ' , (index < currentSteps) ? 'step-done' : ' ' ">
                    <div class="step-bubble"> {{ index }}</div>
                    <div class="step-line">
                        <div class="line-fill">
                            
                        </div>
                    </div>
                </li>
            </ul>
            <div class='min-height-350'>
                <component :is="steps[1]" :datas="datas" :stepsProgess="stepProgess[1]"></component>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <button class="btn btn-primary" v-on:click="nextStep">Next</button>
                    </div>
                    <div class="col-md-6 text-end">
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
                currentSteps : 1,
                currentComponent : 0 ,
                steps : ['Vue1', 'Vue2' , 'Vue3'] ,
                stepProgess : [
                    {
                        transmission : null ,
                        body_style : null ,
                    },
                    {
                        divertrim : null ,
                    }
                ],
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
    }

</script>

<style scoped>
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
    
</style>