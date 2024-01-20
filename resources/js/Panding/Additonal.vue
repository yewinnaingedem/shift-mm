<template>
    <div class="mb-1">
        <div class="row">
            <div class="col-md-8">
                <label class="form-label">Additional Exceptions </label>
            </div>
            <div class="col-md-4 text-end ">
                <div class="lead font-mono font-size-sm me-1" v-if="setTime">{{ setTime }}</div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <textarea class="form-control"  rows="1" v-model="demageStore.state.exceptions.exceptionsDemage"></textarea>
            </div>
            <div class="col-md-4">
                <select class="form-select w-100" aria-label="Default select example">
                    <option v-for="fixer in fixers" :key="fixer.id">
                        {{ fixer.name }}
                    </option>
                </select>
            </div>
            <div class="col-md-4">
                <div v-if="demageStore.state.exceptions.state">
                    <button class="btn btn-success w-100">
                        Already Done 
                    </button>
                </div>
                <div class="row" v-else >
                    <div class="col-md-6">
                        <button class="btn btn-primary w-100" :class="{ 'disable' : disable}" @click="demageStore.dispatch('getAdditionalDemage')" >
                            <span class="me-1">{{ demageStore.state.exceptions.paintLoading ? "Panding" : "Send" }}</span>
                            <span class="position-relative loader" v-if="demageStore.state.exceptions.paintLoading">....</span>
                        </button>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-danger w-100" @click="demageStore.dispatch('haveDoneAdditionalDemage')">Have Done</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from "axios" ;
    import demageStore  from './DemageStore';
    export default {
        setup () {
            return {
                demageStore ,
            }
        } ,
        name : "additonalComponent" ,
        data () {
            return {
                fixer : null ,
                disable : false ,
                setTime : null ,
            }
        },
        props : {
            fixers : {
                type : Object ,
                required : true ,
            } ,
            additionalDemage : {
                type : String ,
                required : true ,
            }
        } ,
        computed : {
            additionalException () {
                if(this.additionalDemage == "none") {
                    demageStore.state.exceptions.exceptionsDemage = demageStore.state.dot ;
                    this.disable = true ;
                    demageStore.state.exceptions.exceptionsDemageState = false ;
                }else {
                    demageStore.state.exceptions.exceptionsDemage = this.additionalDemage ;
                }
            },
            fixerId () {
                return this.fixers.length > 0 ? this.fixers[0].id : null ;
            },
        },
        mounted () {
            this.additionalException ;
            this.fixer = 1 ;
            setInterval(() => {
                if(demageStore.state.exceptions.exceptionsDemageState ) {
                    this.getIdCode(this.fixer);
                }
            }, 60000);
        },
        methods : {
            getIdCode (fixer) {
                axios.post('http://localhost:8000/api/additionalDemage/codeApi' , {
                    codeId : fixer + demageStore.state.car_id + demageStore.state.exceptions.exceptionsDemage + demageStore.state.licensePlate,
                })
                .then((response) => {
                    this.setTime = null ;
                    if(response.data.success == true ) {
                        this.demageStore.state.exceptions.paintLoading = true ;
                        this.setTime = response.data.timeSinceCreated ;
                        demageStore.state.exceptions.exceptionsDemageState  = true ; 
                        if(response.data.state !== 0) {
                            
                            demageStore.state.exceptions.state = true ;
                        }else {
                            demageStore.state.exceptions.state = false ;  
                        }
                    }else {
                        this.demageStore.state.exceptions.paintLoading = false ;
                        demageStore.state.exceptions.state = false ;
                        demageStore.state.exceptions.exceptionsDemageState  = false ; 
                    }
                })
                .catch((error) => {
                    console.log(error);
                }) ;
            }  
        },
        watch : {
            fixer(newValue) {
               if(demageStore.state.exceptions.exceptionsDemageState) {
                    this.getIdCode(newValue) ;
               }
               demageStore.state.exceptions.fixer_id = newValue ;
            }
        },
    }
</script>