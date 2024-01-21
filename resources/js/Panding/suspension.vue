<template>
    <div class="mb-1">
        <div class="row">
            <div class="col-md-8">
                <label class="form-label">Suspension Manipulation </label>
            </div>
            <div class="col-md-4 text-end ">
                <div class="lead font-mono font-size-sm me-1" v-if="setTime">{{ setTime }}</div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <textarea class="form-control"  rows="1" v-model="suspensionInner"></textarea>
            </div>
            <div class="col-md-4">
                <select class="form-select w-100" aria-label="Default select example">
                    <option v-for="fixer in fixers" :key="fixer.id">
                        {{ fixer.name }}
                    </option>
                </select>
            </div>
            <div class="col-md-4">
                <div v-if="demageStore.state.suspension.state">
                    <button class="btn btn-success w-100">
                        Already Done 
                    </button>
                </div>
                <div class="row" v-else >
                    <div class="col-md-6"  :class="{ 'disable' : disable}">
                        <button class="btn btn-primary w-100" @click="demageStore.dispatch('getSuspensionDemage')"  :disabled="disable">
                            <span class="me-1">{{ demageStore.state.suspension.paintLoading ? "Panding" : "Send" }}</span>
                            <span class="position-relative loader" v-if="demageStore.state.suspension.paintLoading">....</span>
                        </button>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-danger w-100" @click="demageStore.dispatch('haveDoneSupension')">Have Done</button>
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
                suspensionInner : null ,
            }
        },
        props : {
            fixers : {
                type : Object ,
                required : true ,
            } ,
            supsensionDemage : {
                type : String ,
                required : true ,
            }
        } ,
        computed : {
            suspension () {
                if(this.supsensionDemage == "none") {
                    this.suspensionInner = demageStore.state.dot ;
                    this.disable = true ;
                    demageStore.state.suspension.suspensionDemageState = false ;
                }else {
                    this.suspensionInner = this.supsensionDemage ;
                }
            },
            fixerId () {
                return this.fixers.length > 0 ? this.fixers[0].id : null ;
            },
        },
        mounted () {
            this.suspension ;
            this.fixer = 1 ;
            setInterval(() => {
                if(demageStore.state.suspension.suspensionDemageState) {
                    this.getIdCode(this.fixer);
                }
            }, 60000);
        },
        methods : {
            getIdCode (fixer) {
                axios.post('http://localhost:8000/api/suspensionDemage/codeApi' , {
                    codeId : fixer + demageStore.state.car_id + demageStore.state.suspension.suspensionDemage + demageStore.state.licensePlate ,
                })
                .then((response) => {
                    this.setTime = null ;
                    if(response.data.success == true ) {
                        this.demageStore.state.suspension.paintLoading = true ;
                        this.setTime = response.data.timeSinceCreated ;
                        demageStore.state.suspension.suspensionDemageState = true ;
                        if(response.data.state !== 0) {
                            demageStore.state.suspension.state = true ;
                        }else {
                            demageStore.state.suspension.state = false ;   
                        }
                    }else {
                        this.demageStore.state.suspension.paintLoading = false ;
                        demageStore.state.suspension.state = false ;
                        demageStore.state.suspension.suspensionDemageState = false ;
                    }
                    console.log(demageStore.state.suspension.suspensionDemageState);
                })
                .catch((error) => {
                    console.log(error);
                }) ;
            }  
        },
        watch : {
            fixer(newValue) {
                if(demageStore.state.suspension.suspensionDemageState ) {
                    this.getIdCode(newValue) ;
                }
                demageStore.state.suspension.fixer_id = newValue ;
            },
            suspensionInner (newVal) {
                if(!newVal.includes('-') && newVal !== "")  {
                    this.demageStore.state.suspension.suspensionDemage = this.suspensionInner ;
                    this.disable = false ;
                }else {
                    this.disable = true  ;
                }
            }
        },
    }
</script>