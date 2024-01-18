<template>
    <div class="mb-1">
        <div class="row">
            <div class="col-md-8">
                <label class="form-label">Engine Manipulation</label>
            </div>
            <div class="col-md-4 text-end ">
                <div class="lead font-mono font-size-sm me-1" v-if="setTime">{{ setTime }}</div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <textarea class="form-control"  rows="1" v-model="demageStore.state.engine.engineDemage"></textarea>
            </div>
            <div class="col-md-4">
                <select class="form-select w-100" >
                    <option v-for="fixer in fixers" :key="fixer.id">
                        {{ fixer.name }}
                    </option>
                </select>
            </div>
            <div class="col-md-4">
                <div v-if="demageStore.state.engine.state">
                    <button class="btn btn-success w-100">
                        Already Done 
                    </button>
                </div>
                <div class="row" v-else >
                    <div class="col-md-6">
                        <button class="btn btn-primary w-100" :class="{ 'disable' : disable}" @click="demageStore.dispatch('getEngineDemage')" >
                            <span class="me-1">{{ demageStore.state.engine.paintLoading ? "Panding" : "Send" }}</span>
                            <span class="position-relative loader" v-if="demageStore.state.engine.paintLoading">....</span>
                        </button>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-danger w-100" @click="demageStore.dispatch('haveDoneEngine')">Have Done</button>
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
            engineDemage : {
                type : String ,
                required : true ,
            }
        } ,
        computed : {
            engine () {
                if(this.engineDemage == "none") {
                    demageStore.state.engine.engineDemage = demageStore.state.dot ;
                    this.disable = true ;
                }else {
                    demageStore.state.engine.engineDemage = this.engineDemage ;
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
            this.engine ;
            this.fixer = 1 ;
            setInterval(() => {
                this.getIdCode(this.fixer);
            }, 60000);
        },
        watch : {
            fixer(newValue) {
               this.getIdCode(newValue) ;
               demageStore.state.engine.fixer_id = newValue ;
            }
        },
        methods : {
            getIdCode (fixer) {
                axios.post('http://localhost:8000/api/engineDemage/codeApi' , {
                    codeId : fixer + demageStore.state.car_id + demageStore.state.engine.engineDemage ,
                })
                .then((response) => {
                    this.setTime = null ;
                    if(response.data.success == true ) {
                        this.demageStore.state.engine.paintLoading = true ;
                        this.setTime = response.data.timeSinceCreated ;
                        if(response.data.state !== 0) {
                            demageStore.state.engine.state = true ;
                        }else {
                            demageStore.state.engine.state = false ;   
                        }
                    }else {
                        this.demageStore.state.engine.paintLoading = false ;
                        demageStore.state.engine.state = false ;
                    }
                })
                .catch((error) => {
                    console.log(error);
                }) ;
            }  
        }
    }
</script>