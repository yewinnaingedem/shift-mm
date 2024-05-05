<template >
    <div class="container pt-3">
        <div class="step-container">
            <div class='min-height-350 pt-3'>
                <component :is="steps[currentSteps]" :datas="datas"  ></component>
            </div>
            <div class="container mt-3">
                <div class="row">
                    <div class="col-md-6" v-if="submitGet">
                        <button class="btn btn-primary" v-on:click="submit">
                            <span>Submit</span>
                            <div class="spinner-border text-white w-15 h-15" role="status" v-if="loadState">
                            </div>
                        </button>
                    </div>
                    <div class="col-md-6" v-else>
                        <button class="btn btn-primary" v-on:click.prevent="nextStep">Next</button>
                    </div>
                    <div class="col-md-6 text-end"  v-if="currentSteps > 0">
                        <button class="btn btn-primary " v-on:click="previousStep">Perivous Steps</button>
                    </div>
                    <data class="col-md-6 text-end" v-else>
                        <a :href="backRoute" class="btn btn-danger">
                            <i class="fa-solid fa-backward"></i>
                            <span class="ml-2">Back</span>
                        </a>
                    </data>
                </div>
            </div>
        </div>
    </div>
    
    
</template>

<script>
    import Vue1 from "./VueComponent/Vue1.vue";
    import Vue2 from "./VueComponent/Vue2.vue";
    import Vue3 from "./VueComponent/Vue3.vue";
    import { stepProgess } from "./VueComponent/stepProgess";
    export default {
        setup () {
            return { stepProgess }
        }, 
        data () {
            return {
                backRoute : "http://localhost:8000/admin/grade/create" ,
                currentSteps : 0,
                steps : ['Vue1', 'Vue2' , 'Vue3'] ,
                removeBar : false ,
                checkSumbit : false ,
                loadState : false ,
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
            },
            submit () {
                this.loadState = true ;
                $.ajax({
                        type : "POST" ,
                        url  : "/api/end-point" ,
                        data : {
                            gread : this.datas.inputField ,
                            validation : this.validation ,
                            vue1 : stepProgess.step1 ,
                            vue2 : stepProgess.step2 ,
                            vue3 : stepProgess.step3,
                        },
                        success : (res)  => {
                            window.location.href = res.redirect ;
                        },
                        error : (error) => {
                            console.log(error);
                        }
                    });
                
            },
        },
        props : {
            datas : {
                type : Object ,
                required : true ,
            },
            asset : {
                required : true  ,
            }
        },
        mounted ( ) {
            this.removeBar ;
            stepProgess.storage  = this.asset ;
        } , 
        computed : {
            removeBarTe () {
               this.removeBar = this.steps.length > 0 ? true : false ;
            },
            submitGet () {
                if(this.currentSteps === this.steps.length -1 ) {
                    return true ;
                }
            },
            validation () {
                return this.datas.validation == null ? false : this.datas.validation ;
            }
        },

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
    .w-15 {
        width: 15px;
        margin-left: 5px;
    }
    .h-15 {
        height: 15px;
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
        max-height:  520px;
        height: 540px;
        overflow-x: auto;
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
        background: whitesmoke;   
    }
    .min-height-350::-webkit-scrollbar-thumb {
        width: 1px;
        border-radius: 10px
    }
    ::-webkit-scrollbar  {
        width: 10px ;
        height: 5px;
    }
    ::-webkit-scrollbar:hover {
        width: 10px;
        border-radius: 10px;
    }
    ::-webkit-scrollbar-thumb {
        background: black;
        color : #fff ;
        border-radius: 4px;
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
    .ml-2 {
        margin-left: 3px;
    }
    
</style>