<template>
    <div class="mb-1">
        <div class="row">
            <div class="col-md-8">
                <label class="form-label">Lights Demage </label>
            </div>
            <div class="col-md-4 text-end ">
                <div class="lead font-mono font-size-sm me-1" v-if="setTime">{{ setTime }}</div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <textarea class="form-control"  rows="1" v-model="lightsInner"></textarea>
            </div>
            <div class="col-md-4">
                <select class="form-select w-100" aria-label="Default select example">
                    <option v-for="fixer in fixers" :key="fixer.id">
                        {{ fixer.name }}
                    </option>
                </select>
            </div>
            <div class="col-md-4">
                <div v-if="demageStore.state.lights.state">
                    <button class="btn btn-success w-100">
                        Already Done 
                    </button>
                </div>
                <div class="row" v-else >
                    <div class="col-md-6" :class="{ 'disable' : disable}">
                        <button class="btn btn-primary w-100"  @click="demageStore.dispatch('getLightDemage')" :disabled="disable">
                            <span class="me-1">{{ demageStore.state.lights.paintLoading ? "Panding" : "Send" }}</span>
                            <span class="position-relative loader" v-if="demageStore.state.lights.paintLoading">....</span>
                        </button>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-danger w-100" @click="demageStore.dispatch('haveDoneLight')">Have Done</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    import demageStore  from './DemageStore';
    export default {
        setup () {
            return {
                demageStore ,
            }
        } ,
        name : "EngineVue" ,
        data () {
            return {
                fixer : null ,
                disable : false ,
                lightsInner : null ,
                setTime : null ,
            }
        },
        props : {
            fixers : {
                type : Object ,
                required : true ,
            } ,
            lightDemage : {
                type : String ,
                required : true ,
            }
        } ,
        computed : {
            ligths () {
                if(this.lightDemage == "none") {
                    this.lightsInner = demageStore.state.dot ;
                    this.disable = true ;
                    demageStore.state.lights.lightDemageState = false ;
                }else {
                    this.lightsInner = this.lightDemage ;
                }
            },
            fixerId () {
                return this.fixers.length > 0 ? this.fixers[0].id : null ;
            },
        },
        mounted () {
            this.ligths ;
            this.fixer = 1 ;
            setInterval(() => {
                if(demageStore.state.lights.lightDemageState) {
                    this.getIdCode(this.fixer);
                }
            }, 60000);
        },
        methods : {
            getIdCode (fixer) {
                axios.post('http://localhost:8000/api/lightsDemage/codeApi' , {
                    codeId : fixer + demageStore.state.car_id + demageStore.state.lights.lightDemage + demageStore.state.licensePlate ,
                })
                .then((response) => {
                    this.setTime = null ;
                    if(response.data.success == true ) {
                        this.demageStore.state.lights.paintLoading = true ;
                        this.setTime = response.data.timeSinceCreated ;
                        demageStore.state.lights.lightDemageState = true ;
                        if(response.data.state !== 0) {
                            demageStore.state.lights.state = true ;
                            
                        }else {
                            demageStore.state.lights.state = false ;   
                            
                        }
                    }else {
                        this.demageStore.state.lights.paintLoading = false ;
                        demageStore.state.lights.state = false ;
                        demageStore.state.lights.lightDemageState = false ;
                    }
                })
                .catch((error) => {
                    console.log(error);
                }) ;
            }  
        },
        watch : {
            fixer(newValue) {
                if(demageStore.state.lights.lightDemageState) {
                    this.getIdCode(newValue) ;
                }
               demageStore.state.lights.fixer_id = newValue ;
            }, 
            lightsInner ( newValue ) {
                if(!newValue.includes('-') && newValue !== "" )  {
                    demageStore.state.lights.lightDemage = this.lightsInner ;
                    this.disable = false ;
                }else {
                    this.disable = true ;
                }
                if(newValue == " ") {
                    this.lightsInner = demageStore.state.dot ;
                }
            }
        }
    }
</script>