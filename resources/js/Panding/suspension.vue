<template>
    <div class="mb-1">
        <label class="form-label">Suspension Manipulation </label>
        <div class="row">
            <div class="col-md-4">
                <textarea class="form-control"  rows="1" v-model="demageStore.state.suspension"></textarea>
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
                disable : false ,
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
                    demageStore.state.suspension = demageStore.state.dot ;
                    this.disable = true ;
                }else {
                    demageStore.state.suspension = this.supsensionDemage ;
                }
            }
        },
        mounted () {
            this.suspension ;
        }
    }
</script>