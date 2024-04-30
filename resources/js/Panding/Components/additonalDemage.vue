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
                    <div>{{ centeraStore.state.additional.about }}</div>
                </div>
            </div>
            <!-- This is the send Form ; -->
            <div class="col-md-3">
                <div class="w-full">
                    <div class="">
                        <div class="w-100 btn btn-success" v-if="centeraStore.state.additional.success">
                            <span class="me-2">Verified</span>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <div class="w-100  btn btn-primary" v-else>
                            <span v-if="centeraStore.state.additional.state">Panding</span>
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
        name : "AdditionalException",
        data () {
            return {
                name : "Additional " ,
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
            additionales : {
                type : Object ,
                default : null ,
            },
            origin : {
                type : String ,
                default : null ,
            }
        },
        watch : {
            mechines (newVal) {
                centeraStore.state.additional.mechineName  = newVal ;
                this.fixers.forEach( fixer  => {
                    if(newVal == fixer.id)  {
                        centeraStore.state.additional.about = fixer.description ;
                    }
                });
            }  ,
            fixpoint (newVal ) {
                if(newVal !== "" || newVal !== null ) {
                    centeraStore.state.additional.fixpoint = newVal ;    
                }
            }
        }, 
        methods : {
            sendForm () {
               centeraStore.dispatch('sendAdditional', this.mechines );
            }
        },
        computed  : {
            forAdditonal () {
                if( this.additionales) {
                    if(this.additionales.about == centeraStore.state.additional.description) {
                        const numericString = this.additionales.code_id.replace(/\D/g, '');
                        const finalChar = numericString.charAt(numericString.length - 1);
                        this.mechines = finalChar;
                        this.fixpoint  = this.additionales.fxingPoint;
                        centeraStore.state.additional.state = true ;
                        if(this.additionales.pandingState) {
                            centeraStore.state.additional.success = true ;
                        }
                    }
                }else {
                    this.fixpoint = this.origin == null ? centeraStore.state.defaultString : this.origin ;
                    if (this.origin == null ) {
                        this.fixpoint = centeraStore.state.defaultString ;
                        centeraStore.state.additional.success = true ;
                    }else {
                        this.fixpoint = this.origin ;
                    }
                    this.mechines = this.fixers.length > 0 ? this.fixers[0].id : null ;
                    centeraStore.state.additional.about = this.fixers.length > 0  ? this.fixers[0].description : null ;
                }
                centeraStore.state.additional.fixpoint = this.fixpoint ;
                if(this.mechines !== null ) {
                    centeraStore.state.additional.mechineName = this.mechines ;
                }
            },
            
        },
        mounted () {
            this.forAdditonal ;
            
        },
    }
</script>