<template>
    <div class="container my-3">
        <div class="container-header text-center">
            
            <figure class="text-center">
                <blockquote class="blockquote">
                    <p>This is panding State For Accent ( 2L / 4890 ).</p>
                </blockquote>
            </figure>
        </div>
        <div class="contaner-descripton tracking-wide row text-white fw-bold text-center mb-3 bg-secondary h-35px rounded align-items-center">
            <div class="col-md-3 ">
                <div >Fixing Point</div>
            </div>
            <div class="col-md-3">
                <div>Mechinses Name</div>
            </div>
            <div class="col-md-3">
                <div>Speciliaze </div>
            </div>
            <div class="col-md-3">
                <div>State</div>
            </div>
        </div>
        <!-- this is for painting and body  -->
        <div class="content-1">
            <div class="header text-muted mb-1 fw-bold">
                Paint And Body
            </div>
            <div class="row mb-1">
                <div class="col-md-3">
                    <div class="mb-2" >
                        <textarea class="form-control text-capitalize" v-model="fixpoint"  rows="1"></textarea>
                    </div>
                </div>
                <div class="col-md-3">
                    <select class="form-select"  v-model="paintAndBody">
                        <option v-for="fixer in fixers" :key="fixer.id" :value="fixer.id" >
                            {{ fixer.name }}
                        </option>
                    </select>
                </div>
                <div class="col-md-3  ">
                    <div class=" rounded  w-full h-30  border d-flex justify-content-center align-items-center">
                        <div>{{ centeraStore.state.paintAndBody.about }}</div>
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="w-full d-flex ">
                        <div class= " w-half d-flex  justify-content-center ">
                            <div class="w-75   btn btn-primary" @click="centeraStore.dispatch('sendFormData')">
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
        
        <div class="my-3">
            <div class="progress">
                <div class="progress-bar" role="progressbar" :style="{ width: progress + '%' }" aria-valuenow="progress" aria-valuemin="0" aria-valuemax="100">10%</div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-3">
                <button class="btn btn-primary">Showroom</button>
            </div>
            <div class="col-md-3">
                <button class="btn btn-primary">NVMRS</button>
            </div>
            <div class="col-md-3">
                <button class="btn btn-primary">Finish</button>
            </div>
            <div class="col-md-3">
                <button class="btn btn-primary">Showroom</button>
            </div>
        </div>
    </div>    
</template>

<script>
    import centeraStore from "./centeralStore" ;
    export default {
        name : "PandingState" ,
        setup () {
            return {
                centeraStore ,
            }
        }, 
        data : function () {
            return  {
                fixers : [] ,
                paintAndBody : null  ,
                fixpoint : null ,
                progress : 50 ,
            }
        },
        props : {
            panding : {
                type : Object , 
                require : true ,
            }
        },
        watch : {
            paintAndBody (newVal) {
                centeraStore.state.paintAndBody.mechineName  = newVal ;
                this.fixers.forEach( fixer  => {
                    if(newVal == fixer.id)  {
                        centeraStore.state.paintAndBody.about = fixer.description ;
                    }
                });
            }  ,
            fixpoint (newVal ) {
                if(newVal !== "" || newVal !== null ) {
                    centeraStore.state.paintAndBody.fixpoint = newVal ;    
                }
            }
        }, 
        computed  : {
            forPaintAndBody () {
                
                if(this.panding.paintAndBody['about'] == centeraStore.state.paintAndBody.description) {
                    const numericString = this.panding.paintAndBody['code_id'].replace(/\D/g, '');
                    const finalChar = numericString.charAt(numericString.length - 1);
                    this.paintAndBody = finalChar;
                    this.fixpoint  = this.panding.paintAndBody['fxingPoint'] ;
                }else {
                    this.fixpoint = this.panding.demage.bodyAndPaint ;
                    this.paintAndBody = this.panding.fixers.length > 0  ? this.panding.fixers[0].id : null ;
                    centeraStore.state.paintAndBody.about = this.panding.fixers.length > 0  ? this.panding.fixers[0].description : null ;
                }
                centeraStore.state.paintAndBody.fixpoint = this.fixpoint ;
                if(this.paintAndBody !== null ) {
                    centeraStore.state.paintAndBody.mechineName = this.paintAndBody ;
                }
            },
            carCode () {
                centeraStore.state.carCode = this.panding.demage.license_plate ;
            }
        },
        mounted () {
            this.forPaintAndBody;
            this.carCode ;
            this.fixers = this.panding.fixers ;
            
        },
    }
</script>

<style>
    .tracking-wide {
        letter-spacing: 1px;
    }
    .footer-content {
        height: 2px;
        background-color: gray;
    }
    .w-75{
        width  : 75px ;
    }
    .w-half {
        width: 50%;
    }
    .h-30 {
        height : 40px ;
    }
    .container-description {
            cursor: pointer;
        }
    .container-description .col-md-3:hover {
        background-color: #ffc107 !important;
        transition: background-color 0.3s;
    }
    .container-description .col-md-3:hover div {
        color: #000;
    }
    .h-35px {
        height: 35px;
    }
    .skeleton {
        width: 100%;
        height: 40px;
        animation: skeleton-animation 1s linear infinite alternate ;
    }
    @keyframes skeleton-animation {
        0% {
            background-color : hsl(200, 20%, 70%);
        }
        25% {
            background-color : hsl(200, 20%, 70%);
        }
        50% {
            background-color : hsl(200, 20%, 80%);
        }
        75% {
            background-color : hsl(200 , 20 , 90%)
        }
        100% {
            background-color : hsl(200, 20%, 95%);
        }
    }
</style>