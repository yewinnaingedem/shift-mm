<template>
    <div class="content-1">
        <div class="header text-muted mb-1 fw-bold">
            {{ name }}
        </div>
        <div class="row mb-1">
            <div class="col-md-3">
                <div class="mb-2" >
                    <textarea class="form-control text-capitalize" v-model="fixpoint"  rows="1"></textarea>
                </div>
            </div>
            <div class="col-md-3">
                <select class="form-select"  v-model="mechines">
                    <option v-for="fixer in fixers" :key="fixer.id" :value="fixer.id" >
                        {{ fixer.name }}
                    </option>
                </select>
            </div>
            <div class="col-md-3  ">
                <div class=" rounded  w-full h-30  border d-flex justify-content-center align-items-center">
                    <div>{{ centeraStore.state.engineAdnSuspension.about }}</div>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="w-full d-flex ">
                    <div class= " w-half d-flex  justify-content-center ">
                        <div class="w-75   btn btn-primary" @click="sendForm">
                            <span>Send</span>
                        </div>
                    </div>
                    <div class= " w-half d-flex justify-content-center ">
                        <div class="w-75 bg-danger btn btn-danger">
                            <span> Done</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import centeraStore from "../centeralStore.js";
    export default {
        name : "EngineAndSuspension",
        data () {
            return {
                name : "EngineAndSuspension" ,
                data : null ,
                mechines : null  ,
                fixpoint : null ,
            }
        },
        setup () {
            return {
                centeraStore ,
            }
        },
        props : {
            fixers : {
                type : Object ,
                required : true ,
            },
            engineAndSuspensiones : {
                type : Object ,
                required : true ,
            },
            origin : {
                type : String ,
                required : true ,
            }
        },
        watch : {
            mechines (newVal) {
                centeraStore.state.engineAdnSuspension.mechineName  = newVal ;
                this.fixers.forEach( fixer  => {
                    if(newVal == fixer.id)  {
                        centeraStore.state.engineAdnSuspension.about = fixer.description ;
                    }
                });
            }  ,
            fixpoint (newVal ) {
                if(newVal !== "" || newVal !== null ) {
                    centeraStore.state.engineAdnSuspension.fixpoint = newVal ;    
                }
            }
        }, 
        computed  : {
            forEngineAndSuspension () {
                if(this.engineAndSuspensiones.about == centeraStore.state.engineAdnSuspension.description) {
                    const numericString = this.engineAndSuspensiones.code_id.replace(/\D/g, '');
                    const finalChar = numericString.charAt(numericString.length - 1);
                    this.mechines = finalChar;
                    this.fixpoint  = this.engineAndSuspensiones.fxingPoint;
                }else {
                    this.fixpoint = this.origin == null ? centeraStore.state.defaultString : this.origin ;
                    this.mechines = this.fixers.length > 0 ? this.fixers[0].id : null ;
                    centeraStore.state.engineAdnSuspension.about = this.fixers.length > 0  ? this.fixers[0].description : null ;
                }
                centeraStore.state.engineAdnSuspension.fixpoint = this.fixpoint ;
                if(this.mechines !== null ) {
                    centeraStore.state.engineAdnSuspension.mechineName = this.mechines ;
                }
            },
        },
        methods : {
            sendForm () {
               centeraStore.dispatch('sendEngineAndSuspension', this.mechines );
            }
        },
        mounted () {
            this.forEngineAndSuspension ;          
        },
    }
</script>