<template>
    <div class="mb-1">
        <label class="form-label">Engine Manipulation </label>
        <div class="row">
            <div class="col-md-5">
                <textarea class="form-control"  rows="1" v-model="demageStore.state.engine"></textarea>
            </div>
            <div class="col-md-5">
                <select class="form-select w-100" aria-label="Default select example">
                    <option v-for="fixer in fixers" :key="fixer.id">
                        {{ fixer.name }}
                    </option>
                </select>
            </div>
            <div class="col-md-2">
                <button class="btn btn-primary w-100"  :class="{'disable' : disable }" >Send</button>
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
            engineDemage : {
                type : String ,
                required : true ,
            }
        } ,
        computed : {
            engine () {
                if(this.engineDemage == "none") {
                    demageStore.state.engine = demageStore.state.dot ;
                    this.disable = true ;
                }else {
                    demageStore.state.engine = this.engineDemage ;
                }
            }
        },
        mounted () {
            this.engine ;
            
        }
    }
</script>