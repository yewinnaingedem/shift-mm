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
                    <div>{{ centeraStore.state.tvAndWiring.about }}</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="w-full">
                    <div class= "">
                        <div class="w-100 btn btn-success" v-if="centeraStore.state.tvAndWiring.success">
                            <span class="me-2">Verified</span>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <div class="w-100  btn btn-primary" v-else>
                            <span v-if="centeraStore.state.tvAndWiring.state">Panding</span>
                            <span v-else @click="sendForm">Send</span>
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
        name : "TvAndWiring",
        data () {
            return {
                name : "TvAndWiring" ,
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
            tvAndWiringes : {
                type : Object ,
                default : null ,
            },
            origin : {
                type : String ,
                required : true ,
            }
        },
        watch : {
            mechines (newVal) {
                centeraStore.state.tvAndWiring.mechineName  = newVal ;
                this.fixers.forEach( fixer  => {
                    if(newVal == fixer.id)  {
                        centeraStore.state.tvAndWiring.about = fixer.description ;
                    }
                });
            }  ,
            fixpoint (newVal ) {
                if(newVal !== "" || newVal !== null ) {
                    centeraStore.state.tvAndWiring.fixpoint = newVal ;    
                }
            }
        }, 
        methods : {
            sendForm () {
               centeraStore.dispatch('sendTvAndWiring', this.mechines );
            }
        },
        computed  : {
            forEngineAndSuspension () {
                if(this.tvAndWiringes){
                    if(this.tvAndWiringes.about == centeraStore.state.tvAndWiring.description) {
                        const numericString = this.tvAndWiringes.code_id.replace(/\D/g, '');
                        const finalChar = numericString.charAt(numericString.length - 1);
                        this.mechines = finalChar;
                        this.fixpoint  = this.tvAndWiringes.fxingPoint;
                        centeraStore.state.tvAndWiring.state = true ;
                    }
                }else {
                    this.fixpoint = this.origin == null ? centeraStore.state.defaultString : this.origin ;
                    this.mechines = this.fixers.length > 0 ? this.fixers[0].id : null ;
                    centeraStore.state.tvAndWiring.about = this.fixers.length > 0  ? this.fixers[0].description : null ;
                }
                centeraStore.state.tvAndWiring.fixpoint = this.fixpoint ;
                if(this.mechines !== null ) {
                    centeraStore.state.tvAndWiring.mechineName = this.mechines ;
                }
            },
        },
        mounted () {
            this.forEngineAndSuspension ;          
        },
    }
</script>