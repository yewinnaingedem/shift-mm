<template>
    <div class="mb-1">
        <div class="row">
            <div class="col-md-8">
                <label class="form-label">TV Demage</label>
            </div>
            <div class="col-md-4 text-end ">
                <div class="lead font-mono font-size-sm me-1" v-if="setTime">{{ setTime }}</div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <textarea class="form-control"  rows="1" v-model="tvInner"></textarea>
            </div>
            <div class="col-md-4">
                <select class="form-select w-100" aria-label="Default select example">
                    <option v-for="fixer in fixers" :key="fixer.id">
                        {{ fixer.name }}
                    </option>
                </select>
            </div>
            <div class="col-md-4">
                <div v-if="demageStore.state.tv.state">
                    <button class="btn btn-success w-100">
                        Already Done 
                    </button>
                </div>
                <div class="row" v-else >
                    <div class="col-md-6" :class="{ 'disable' : disable}">
                        <button class="btn btn-primary w-100"  @click="demageStore.dispatch('getTVDemage')" :disabled="disable">
                            <span class="me-1">{{ demageStore.state.tv.paintLoading ? "Panding" : "Send" }}</span>
                            <span class="position-relative loader" v-if="demageStore.state.tv.paintLoading">....</span>
                        </button>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-danger w-100" @click="demageStore.dispatch('haveDoneTV')">Have Done</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from "axios";
    import demageStore from "./DemageStore";
    export default {
        setup () {
            return {
                demageStore ,
            }
        },
        name : "TVDemage" ,
        data () {
            return {
                disable : false ,
                setTime : null ,
                tvInner : null ,
                fixer : null ,
            }
        },
        props : {
            tvDemage : {
                type : String ,
                required : true ,
            },
            fixers : {
                type : Array ,
                required : true ,
            }
        },
        watch : {
            fixer(newValue) {
                if(demageStore.state.tv.tvDemageState) {
                    this.getIdCode(newValue) ;
                }
               demageStore.state.tv.fixer_id = newValue ;
            } ,
            tvInner (newVal)      {
                if(!newVal.includes('-') && newVal !== "")  {
                    this.demageStore.state.tv.tvDemage = this.tvInner ;
                    this.disable = false ;
                }else {
                    this.disable = true  ;
                }
                if(newVal == " ") {
                    this.tvInner = demageStore.state.dot ;
                }
            }
 
        } ,
        mounted () {
            this.tv ;
            this.fixer = 1 ;
            setInterval(() => {
                if(demageStore.state.tv.tvDemageState) {
                    this.getIdCode(this.fixer);
                }
            }, 60000);
        },
        computed : {
            tv () {
                if(this.tvDemage == "none") {
                    this.tvInner = demageStore.state.dot ;
                    this.disable = true ;
                    this.demageStore.state.tv.tvDemageState = false ;
                }else {
                    this.tvInner = this.tvDemage ;
                }
            }
        },
        methods : {
            getIdCode (fixer) {
                axios.post('http://localhost:8000/api/tv/codeApi' , {
                    codeId : fixer + demageStore.state.car_id + demageStore.state.tv.tvDemage + demageStore.state.licensePlate ,
                })
                .then((response) => {
                    this.setTime = null ;
                    if(response.data.success == true ) {
                        this.demageStore.state.tv.paintLoading = true ;
                        this.setTime = response.data.timeSinceCreated ;
                        this.demageStore.state.tv.tvDemageState = true ;
                        if(response.data.state !== 0) {
                            demageStore.state.tv.state = true ;
                            demageStore.state.tv.tvDemageState = false ;
                        }else {
                            demageStore.state.tv.state = false ;   
                            demageStore.state.tv.tvDemageState = true ;
                        }
                    }else {
                        this.demageStore.state.tv.paintLoading = false ;
                        demageStore.state.tv.state = false ;
                        this.demageStore.state.tv.tvDemageState = false ;
                    }
                })
                .catch((error) => {
                    console.log(error);
                }) ;
            }  
        }
    }
</script>