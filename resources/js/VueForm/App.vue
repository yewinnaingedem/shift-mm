<template >
    <div class="container pt-3">
        <div class="step-container">
            <div class='min-height-350 pt-3'>
                <component :is="steps[currentSteps]" :datas="datas" @send-data="dataHandleFromChild" :stepsProgess="stepProgess[currentSteps]"></component>
            </div>
            <div class="container mb-3">
                <div class="row">
                    <div class="col-md-6" v-if="submitCheck">
                        <button class="btn btn-primary" v-on:click="submit">Submit</button>
                    </div>
                    <div class="col-md-6" v-else>
                        <button class="btn btn-primary" v-on:click.prevent="nextStep">Next</button>
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
                        sonor  :null ,
                        camera : null ,
                    },{
                        functions : [],
                        default_functions : [] ,
                        advance : {
                            exist : false ,
                        } ,
                    }
                ],
                removeBar : false ,
                checkSumbit : false ,
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
                swal({
                    title: "Are you sure?",
                    text: "You will not be able to recover this imaginary file!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel plx!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                    },
                    function(isConfirm){
                        if (isConfirm) {
                            $.ajax({
                                type : "POST" ,
                                url  : "/api/end-point" ,
                                data : {
                                    gread : this.datas.inputField ,
                                    modelX : this.datas.modelX ,
                                    vue1 : this.stepProgess[0] ,
                                    vue2 : this.stepProgess[1] ,
                                    vue3 : this.stepProgess[2],
                                },
                                success : (res)  => {
                                    window.location.href = res.redirect ;
                                },
                                error : (error) => {
                                    console.log(error);
                                }
                            });
                                swal("Deleted!", "Your imaginary file has been deleted.", "success");
                        } else {
                            swal("Cancelled", "Your imaginary file is safe :)", "error");
                        }
                    });
                $.ajax({
                    type : "POST" ,
                    url  : "/api/end-point" ,
                    data : {
                        gread : this.datas.inputField ,
                        modelX : this.datas.modelX ,
                        vue1 : this.stepProgess[0] ,
                        vue2 : this.stepProgess[1] ,
                        vue3 : this.stepProgess[2],
                    },
                    success : (res)  => {
                        window.location.href = res.redirect ;
                    },
                    error : (error) => {
                        console.log(error);
                    }
                });
            },
            dataHandleFromChild (data) {
                console.log(data);
                this.stepProgess[2].advance = data ;
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
            },
            submitCheck () {
                if(this.currentSteps == this.stepProgess.length -1) {
                    return this.checkSumbit = true ;   
                }
                return this.checkSumbit = false ;
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
        max-height:  540px;
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
    
    
</style>