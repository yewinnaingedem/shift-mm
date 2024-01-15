<script setup>
    import demageStore from "./DemageStore.js";
</script>
<template>
    <div class="mb-1">
        <label class="form-label">TV Demage</label>
        <div class="row">
            <div class="col-md-4">
                <textarea class="form-control"  rows="1" v-model="demageStore.state.tv "></textarea>
            </div>
            <div class="col-md-4">
                <select class="form-select w-100" aria-label="Default select example">
                    <option v-for="fixer in fixers" :key="fixer.id">
                        {{ fixer.name }}
                    </option>
                </select>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-6">
                        <button class="btn btn-primary w-100" :class="{ 'disable' : disable}" >Send 
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
    export default {
        name : "TVDemage" ,
        data () {
            return {
                disable : false ,
                loading : true ,
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
        mounted () {
            this.tv ;
        },
        computed : {
            tv () {
                if(this.tvDemage == "none") {
                    demageStore.state.tv = demageStore.state.dot ;
                    this.disable = true ;
                }else {
                    demageStore.state.tv = this.tvDemage ;
                }
            }
        }
    }
</script>