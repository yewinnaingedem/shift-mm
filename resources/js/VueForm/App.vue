<template >
    <div class="container pt-3">
        <div class="step-container">
            <ul class="step-list">
                <li class="step" v-for="(step , index ) in steps" :key="step" :class="( index  == currentSteps ) ? 'step-active' : ' ' , (index < currentSteps) ? 'step-done' : ' ' ">
                    <div class="step-bubble"> {{ index }}</div>
                    <div class="step-line">
                        <div class="line-fill"></div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    
    <component :is="currentStepComponent"></component>
    <button class="btn btn-primary" v-on:click="nextStep">Next</button>
</template>

<script>
    import Vue1 from "./VueComponent/Vue1.vue";
    import Vue2 from "./VueComponent/Vue2.vue";
    import Vue3 from "./VueComponent/Vue3.vue";

    export default {
        data () {
            return {
                currentSteps : 1 ,
                steps : ['Vue1', 'Vue2' , 'Vue3']
            }
        },
        components : {
            Vue1 ,
            Vue2, 
            Vue3
        },  
        computed : {
            currentStepComponent () {
                return this.steps[this.currentSteps -- ]
            }
        },
        mounted : {
            
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
        }
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
    .step {
        display: flex;
        flex-grow: 1; 
        max-width: 100%;
        align-items: center;
        position: relative;
        height : 60px ;
    }
    .step-bubble {
        width: 35px;
        height: 35px;
        border-radius: 50%;
        background: tomato;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .step-line {
        width: 100%;
        height: 5px;
        background-color: black;
        left: 0;
        position: absolute;
        transform: translateY(-50%);
        top: 50%;
    }
    .step:last-child {
        width: 60px;
    }
    .step-active .step-bubble ,
    .step-done .step-bubble {
        width: 60px;
        height: 60px;
    }
    .step:last-child .step-line {
        display: none;
    }
</style>