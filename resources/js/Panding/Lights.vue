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
                <textarea class="form-control"  rows="1" v-model="demageStore.state.lights.lightDemage"></textarea>
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
                    <div class="col-md-6">
                        <button class="btn btn-primary w-100" :class="{ 'disable' : disable}" @click="demageStore.dispatch('getBodyAndPaint')" >
                            <span class="me-1">{{ demageStore.state.lights.paintLoading ? "Panding" : "Send" }}</span>
                            <span class="position-relative loader" v-if="demageStore.state.lights.paintLoading">....</span>
                        </button>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-danger w-100" @click="demageStore.dispatch('haveDoneBodyAndPaint')">Have Done</button>
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
                    demageStore.state.lights.lightDemage = demageStore.state.dot ;
                    this.disable = true ;
                }else {
                    demageStore.state.lights.lightDemage = this.lightDemage ;
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
            this.ligths ;
            this.fixer = 1 ;
            setInterval(() => {
                this.getIdCode(this.fixer);
            }, 60000);
        },
        methods : {
            getIdCode (fixer) {
                axios.post('http://localhost:8000/api/lightsDemage/codeApi' , {
                    codeId : fixer + demageStore.state.car_id + demageStore.state.lights.lightDemage ,
                })
                .then((response) => {
                    this.setTime = null ;
                    if(response.data.success == true ) {
                        this.demageStore.state.lights.paintLoading = true ;
                        this.setTime = response.data.timeSinceCreated ;
                        if(response.data.state !== 0) {
                            demageStore.state.lights.state = true ;
                        }else {
                            demageStore.state.lights.state = false ;   
                        }
                    }else {
                        this.demageStore.state.lights.paintLoading = false ;
                        demageStore.state.lights.state = false ;
                    }
                })
                .catch((error) => {
                    console.log(error);
                }) ;
            }  
        },
        watch : {
            fixer(newValue) {
               this.getIdCode(newValue) ;
               demageStore.state.lights.fixer_id = newValue ;
            }
        }
    }
</script>