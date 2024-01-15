<template>
    <div class="mb-1">
        <div class="row">
            <div class="col-md-8">
                <label class="form-label">Paint Demage</label>
            </div>
            <div class="col-md-4 text-end ">
                <div class="lead font-mono font-size-sm me-1" v-if="setTime">{{ setTime }}</div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <textarea class="form-control"  rows="1" v-model="demageStore.state.bodyAndPaint"></textarea>
            </div>
            <div class="col-md-4">
                <select class="form-select w-100" v-model="fixer" aria-label="Default select example">
                    <option v-for="fixer in fixers" :key="fixer.id" :value="fixer.id">
                        {{ fixer.name }}
                    </option>
                </select>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-6">
                        <button class="btn btn-primary w-100" :class="{ 'disable' : disable}" @click="demageStore.dispatch('getBodyAndPaint')" >
                            <span class="me-1">{{ loading ? "Panding" : "Send" }}</span>
                            <span class="position-relative loader" v-if="loading">....</span>
                        </button>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-danger w-100">Have Done</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import demageStore from "./DemageStore.js";
    import axios from "axios";

    export default {
        setup () {
            return {
                demageStore ,
            }
        },
        name : "PaintDemage" ,
        data () {
            return {
                fixer : null ,
                disable : false ,
                loading : false ,
                setTime : null ,
            }
        },
        props : {
            paint : {
                type : String ,
                required : true ,
            },
            fixers : {
                type : Object ,
                required : true ,
            }
        },
        computed : {
            bodyAndPaint () {
                if(this.paint == "none") {
                    demageStore.state.bodyAndPaint = demageStore.state.dot ;
                    this.disable = true ;
                    
                }else {
                    demageStore.state.bodyAndPaint = this.paint ;
                }
            },
            fixerId () {
                if(this.fixers.length > 0) {
                    return  this.fixers[0].id ;
                }
                return  null ;
            },
            
        },
        mounted () {
            this.bodyAndPaint ;
            this.fixer = 1 ;
            setInterval(() => {
                this.getIdCode(this.fixer);
            }, 60000);
        },
        watch : {
            fixer(newValue) {
               this.getIdCode(newValue) ;
               demageStore.state.fixer_id = newValue ;
            }
        } ,
        methods : {
            getIdCode (fixer) {
                axios.post('http://localhost:8000/api/codeApi' , {
                    codeId : fixer + demageStore.state.car_id + demageStore.state.bodyAndPaint ,
                })
                .then((response) => {
                    console.log();
                    if(response.data.success == true ) {
                        this.loading = true ;
                        this.setTime = response.data.timeSinceCreated ;
                    }else {
                        this.loading = false ;
                    }
                })
                .catch((error) => {
                    console.log(error);
                }) ;
            }  
        }
    }
</script>

<style>
    .disable {
        opacity: 0.7;
        cursor: not-allowed !important;
    }
    .loader:before {
        position: absolute;
        content: '';
        right: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background: #0d6efd;
        animation: loading 1s ease-in-out infinite;
    }
    .loader:before:hover {
        background: #0b5ed7;
    }
    .font-size-sm {
        font-size: 15px;
    }
    @keyframes loading {
            0% {
                width : 100% ;
            }
            50% {
                width: 50%;
            }
            100% {
                width: 0%;
            }
        }
</style>