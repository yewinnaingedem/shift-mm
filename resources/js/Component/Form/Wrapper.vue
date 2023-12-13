<template>
    <div class="row w-100 m-0">
        <div class="col-md-4 bg-main position-sticky top-0 bottom-0 main-color w-full vh-100">
            <div class="header   ">
                <div class="d-flex justify-content-center w-full  align-items-start ">
                    <h3 class="mt-3"> Mingalar Car Sale Center</h3>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="sticky-top z-100 bg-white w-100">
                <div class="header  d-flex justify-content-between border-bottom p-3">
                    <div class="d-flex justify-content-center align-items-center font-normal">
                        <div class="mr-2 fw-semibold">
                            {{data['main'].year }}/
                        </div>
                        <div class="fw-bold mr-2 capitalize">
                            {{ data['main'].make }} /
                        </div>
                        <div class="fw-semibold capitalize">
                            {{data['main'].model }}
                        </div>
                    </div>
                    <div class="color-primary">
                        <a href="/admin/add-cars" class="text-decoration-none">Exit</a>
                    </div>
                </div>
            </div>
            <div class="main w-75 m-auto pt-20">
                <component v-bind:is="steps[currentStep]" :forSpecific="field" :data="field[currentStep]"  :arrayData="data" ></component>
                <div class="row mb-5 mt-3">
                    <div class="d-flex justify-content-start align-items-center col-md-6"
                     >
                        <button class="btn btn-primary" v-show="currentStep < steps.length-1" @click="nextStep">Next Step</button>
                        <div
                            :class="{'not-allowed': notAllowed }"
                        >
                            <button  v-show="currentStep == (steps.length -1)" class="btn btn-primary"
                             :disabled="notAllowed"
                           @click="submit">Sumbit</button>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end align-items-center col-md-6"  >
                        <button class="btn btn-primary"  v-show="toggleVisitable"  @click="previousStep">Preivous Step</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
    .flex-col {
        flex-direction: column ;
    }
    .list-none {
        list-style: none;
    }
    .m-0 {
        margin: 0 !important;
    }
    .mr-10 {
        margin-right: 10px;
    }
    .bg-main {
       background: #71747D;
    }
    .mr-2 {
        margin-right: 5px;
    }
    .not-allowed {
        cursor: not-allowed;
    }
</style>

<script >
    import step1 from '../step1.vue';
    import step2 from '../step2.vue';
    import step3 from '../step3.vue';
    import axios from 'axios';
    import Swal from 'sweetalert2' ;
    export default {
        data () {
            return {
                steps : [
                    step1 ,
                    step2 ,
                    step3 
                ],
                notAllowed : true ,
                invalid : false ,
                toggleVisitable : false ,
                nextVisibality : false ,
                currentStep : 0 ,
                field : [
                    {
                        license : null ,
                        millage : null ,
                        preDefindedColor :  false ,
                        ownColor : null ,
                        grade : this.data['grades'][0].grade,
                        exterior_color: null ,
                        transmission : null ,
                    }, 
                    {
                        license_state : null ,
                        steering : null ,
                        warranty  : null ,
                        pass_owner : null ,
                        madeIn : null ,
                        num_seat : null ,
                        font_break : null ,
                        back_break : null ,
                    },
                    {
                        interior_color : null ,
                        VIN : null ,
                        engine_exception : 'none' ,
                        license_exception : 'none',
                        exception : 'none' ,
                    }
        
                ]
            }
        },
        components : {
            step1 ,
            step2 
        },
        methods : {
            nextStep() {
                if(this.currentStep < this.steps.length -1) {
                    this.currentStep ++ ;
                    this.toggleVisitable = true ;
                    return ;
                }
                this.nextVisibality = true ;
                return ;
            },
            previousStep () {
                if(this.currentStep > 0) {
                    this.currentStep-- ;
                    if(this.currentStep == 0) {
                        this.toggleVisitable = false ;
                    }
                    return ;
                }
            },
            checkNull () {
                const hasNullObject = this.field.some((object) => {
                    return Object.values(object).some((value) => value == null );
                });
                if(hasNullObject) {
                    this.notAllowed = true ;
                }else {
                    this.notAllowed = false ;
                }
            },
            submit () {
                axios.post('/admin/setup', { field : this.field , model_Id : this.data['id'].id , year : this.data['main'].year}) 
                .then((response) => {
                    window.location.href = response.data.redirect;
                    console.log(response.data.redirect);
                }).catch((error )=> {
                    console.log(error);
                });
            }
        },
        computed : {
            zipChecked () {
                return this.field
            }
        },  
        watch : {
            field() {
                this.checkNull() ;
            },
            field : {
                deep : true ,
                handler ( ) {
                    this.checkNull();
                }
            } ,
        },
        props : {
            data : {
                type : Object ,
                required : true ,
            } ,
        },
        mounted () {
            console.log(this.data['id'].id);
        }
    }
    
</script>