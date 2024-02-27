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
                    <div class="mb-2">
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="1">There is no data </textarea>
                    </div>
                </div>
                <div class="col-md-3">
                    <select class="form-select" v-model="mechines" aria-label="Default select example">
                        <option v-for="fixer in fixers" :key="fixer.id" :value="fixer.id" >
                            {{ fixer.name }}
                        </option>
                    </select>
                </div>
                <div class="col-md-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1"  v-model="description" rows="1"></textarea>
                </div>
                <div class="col-md-3">
                    <div class="w-full d-flex ">
                        <div class= " w-half d-flex  justify-content-center ">
                            <div class="w-75   btn btn-primary">
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
        <!-- this is for Engine And Suspension and body  -->
        <div class="content-1 mt-1">
            <div class="header text-muted mb-1 fw-bold">
                Engine And Suspension
            </div>
            <div class="row mb-1">
                <div class="col-md-3">
                    <div class="mb-2">
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="1">There is no data </textarea>
                    </div>
                </div>
                <div class="col-md-3">
                    <select class="form-select" v-model="mechines" aria-label="Default select example">
                        <option v-for="fixer in fixers" :key="fixer.id" :value="fixer.id" >
                            {{ fixer.name }}
                        </option>
                    </select>
                </div>
                <div class="col-md-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1"  v-model="description" rows="1"></textarea>
                </div>
                <div class="col-md-3">
                    <div class="w-full d-flex ">
                        <div class= " w-half d-flex  justify-content-center ">
                            <div class="w-75   btn btn-primary">
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
        <!-- this is for Wiring And Suspension and body  -->
        <div class="content-1 mt-1">
            <div class="header text-muted mb-1 fw-bold">
                Wiring And TV 
            </div>
            <div class="row mb-1">
                <div class="col-md-3">
                    <div class="mb-2">
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="1">There is no data </textarea>
                    </div>
                </div>
                <div class="col-md-3">
                    <select class="form-select" v-model="mechines" aria-label="Default select example">
                        <option v-for="fixer in fixers" :key="fixer.id" :value="fixer.id" >
                            {{ fixer.name }}
                        </option>
                    </select>
                </div>
                <div class="col-md-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1"  v-model="description" rows="1"></textarea>
                </div>
                <div class="col-md-3">
                    <div class="w-full d-flex ">
                        <div class= " w-half d-flex  justify-content-center ">
                            <div class="w-75   btn btn-primary">
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
    </div>    
</template>

<script>
    export default {
        name : "PandingState" ,
        data : function () {
            return  {
                fixers : [] ,
                mechines : null ,
                description : null ,
            }
        },
        props : {
            panding : {
                type : Object , 
                require : true ,
            }
        },
        methods: {
        
        },
        watch : {
            mechines (newVal) {
                console.log(newVal);
                this.fixers.forEach( fixer  => {
                    if(newVal == fixer.id)  {
                        this.description = fixer.description ;
                    }
                });
            }    
        },
        mounted () {
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
</style>