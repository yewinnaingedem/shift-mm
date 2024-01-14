<template>
    <div class="mb-1">
        <label class="form-label">Suspension Manipulation </label>
        <div class="row">
            <div class="col-md-5">
                <textarea class="form-control"  rows="1" v-model="demageStore.state.lights"></textarea>
            </div>
            <div class="col-md-5">
                <select class="form-select w-100" aria-label="Default select example">
                    <option v-for="fixer in fixers" :key="fixer.id">
                        {{ fixer.name }}
                    </option>
                </select>
            </div>
            <div class="col-md-2">
                <button class="btn btn-primary w-100"  :class="{'disable' : disable}" >Send</button>
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
            lightDemage : {
                type : String ,
                required : true ,
            }
        } ,
        computed : {
            ligths () {
                if(this.lightDemage == "none") {
                    demageStore.state.lights = demageStore.state.dot ;
                    this.disable = true ;
                }else {
                    demageStore.state.lights = this.lightDemage ;
                }
            }
        },
        mounted () {
            this.ligths ;
        }
    }
</script>