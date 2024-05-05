<template>
    <div class="container">
        <div class=" text-center fw-bold text-truncate text-capitalize">
                Adding the grade for <span class="fw-bold text-primary">{{ datas.brand_name }}</span> <span class="text-danger">{{ datas.model_name }}</span>
                <span class="ml-3 text-capitalize" v-if="datas.grade !== 'none'">{{ datas.grade }}</span>
        </div>
        <div class="row">
            <div class="fw-bold mb-3 h-3 text-header">Transmission</div>
            <div class="col-lg-2 col-md-3 col-sm-4 mb-3" v-for="(transmission  , index ) in datas['transmissions']" :key="transmission.id">
                <label :for="transmission.id + 'tr'" class="d-flex justify-content-center align-items-center main-color p-10 rounded" 
                    :class="(transmission.id === stepProgess.step1.transmission) ? 'bg-dark text-white' : '' "
                >
                    <input type="radio"
                    v-model="stepProgess.step1.transmission" :value="transmission.id" :id="transmission.id + 'tr'" class="d-none">
                    <div class="fw-bold">
                        {{ transmission.transmission }}
                    </div>
                </label>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <div class="text-header mb-3 text-muted">Enigne</div>
            </div>
            <div class="form-check col-md-6 form-switch mb-3 d-flex justify-content-end align-items-center ">
                <label class="d-block mr-50" for="checked">Use defualt build in engine setup ?</label>
                <input class="form-check-input" type="checkbox" name="Turbo"  v-model="engineDefaultSetup" id="checked">
            </div>
        </div>
        <!-- use build in set up -->
        <div class="setup" v-if="engineDefaultSetup">
            <table class="table table-striped">
                <thead class="table-header">
                    <tr>
                        <th >Engine Power</th>
                        <th >Cylinder</th>
                        <th >Fule Type</th>
                        <th>Turbo</th>
                        <th>Your Action Plan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="engine_setup in datas['engines_setup']">
                        <th class="engine" >
                                <img :src="stepProgess.storage + '/Icons/engine_icon.svg'" alt="engine"  class="me-2">
                                <span>{{ engine_setup.engine_power }}</span>
                                <span class="ms-2">CC</span>
                        </th>
                        <th >{{ engine_setup.cylinder }}</th>
                        <th >{{ engine_setup.type }}</th>
                        <th >
                            <span v-if="engine_setup.Turbo" class="icon-color">
                                <i class="fa-solid fa-circle-check"></i>
                            </span>
                            <span v-else class="text-danger">
                                <i class="fa-solid fa-circle-xmark"></i>
                            </span>
                        </th>
                        <th class="text-center " >
                            <label :for="engine_setup.engine_id + 'setup'" class="useage " 
                            :class="(stepProgess.step1.engineSetup == engine_setup.engine_id) ? 'bg-warning text-black' : ''"
                            >
                                <input type="radio"
                                    v-model="stepProgess.step1.engineSetup" :value="engine_setup.engine_id" :id="engine_setup.engine_id + 'setup'" class="d-none">
                                <div class="fw-semibold">
                                    Use this 
                                </div>
                            </label>
                        </th>
                    </tr>
                </tbody>
            </table>
            <pre>{{  stepProgess.step1.engineSetup }}</pre>
        </div>
        <!-- engine set up step by step  -->
        <div class="engine-wrapper" v-else>
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="cylinder" class="form-label fw-bold">Cylinder</label>
                    <select name="cylinder" id="" class="form-select" v-model="stepProgess.step1.engine.cylinder">
                        <option v-for="cylinder in datas.cylinders" :key="cylinder.id" :value="cylinder.id"> {{ cylinder.cylinder }}</option>
                    </select>
                </div>     
            </div>
            <div class="mb-3">
                <div class="row">
                    <div class="col-md-6">
                        <label for="fuel" class="fw-bold form-label">Fuel </label>
                    </div>
                    <div class="form-check col-md-6 form-switch mb-3 d-flex justify-content-end align-items-center ">
                        <label class="d-block  mr-50" for="gradeValide">Does it have Trubo ?</label>
                        <input class="form-check-input" type="checkbox" name="Turbo" role="switch" v-model="stepProgess.step1.engine.turbo" value="exist" id="gradeValide">
                    </div>
                </div>
                <div class="mb-3">
                    <select name="" id="" class="form-select" v-model="stepProgess.step1.engine.fuel_type">
                        <option :value="fuel.id" v-for="fuel in datas.fuels" :key="fuel.id" >{{ fuel.type }}</option>
                    </select>
                </div>
            </div>
            <!-- this for engine power  -->
            <div class="mb-1">
                <div class="row">
                    <div class="col-md-6">
                        <div class="fw-bold mb-2">Engine Power</div>
                    </div>
                    <div class="form-check col-md-6 form-switch mb-3 d-flex justify-content-end align-items-center ">
                        <label class="d-block mr-50" for="checked">Create my own engine power?</label>
                        <input class="form-check-input" type="checkbox" name="Turbo"  v-model="checked" id="checked">
                    </div>
                </div>
                <div v-if="checked">
                    <label class="form-label">Add Engine Power</label>
                    <input type="number" class="form-control" v-model="stepProgess.step1.engine.engine_power" >
                </div>
                <div class="row" v-else>
                    <div class="col-lg-2 col-md-3 col-sm-4 mb-3" v-for="(engine_power  , index ) in datas['engine_powers']" :key="engine_power.id">
                        <label :for="engine_power.id + 'en'" class="d-flex justify-content-center align-items-center main-color p-10 rounded" 
                            :class="(engine_power.id === stepProgess.step1.engine.engine_power) ? 'bg-dark text-white' : '' "
                        >
                            <input type="radio"
                            v-model="stepProgess.step1.engine.engine_power" :value="engine_power.id" :id="engine_power.id + 'en'" class="d-none">
                            <div class="fw-bold">
                                {{ engine_power.engine_power + "CC"}}
                            </div>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { stepProgess } from "./stepProgess.js";
    export default {
        setup () {
            return {stepProgess } ;
        },
        name : "Vue1" ,
        props : {
            datas : {
                type : Object , 
                required : true ,
            },
            
        },
        data () {
            return {
                body_style :null ,
                checked : false ,
                engineDefaultSetup : false ,
            }
        },
        method : {
            useage (id) {
                console.log(id);
            }, 
        }, 
        computed : {
            defaultTransmission () {
                return this.datas.transmissions.length  > 0 ? this.datas.transmissions[0].id : null ;
            },
            
            defaultBodyStyle () {
                return this.datas.body_styles.length  > 0 ? this.datas.body_styles[0].id : null ;
            },
            defaultCylinder () {
                return this.datas.cylinders.length  > 0 ? this.datas.cylinders[1].id : null ;
            },
            defaultFuel () {
                return this.datas.fuels.length  > 0 ? this.datas.fuels[0].id : null ;
            },
            defaultEnginePower () {
                return this.datas.engine_powers.length > 0 ? this.datas.engine_powers[0].id  : null ;
            },
            defaultSetup () {
                stepProgess.step1.brand = this.datas.brand_name ;
                stepProgess.step1.model_name = this.datas.model_name ;
                stepProgess.step1.grade = this.datas.grade ;
            }
        },
        mounted () {
            if(this.stepProgess.step1.transmission == null ) {
                this.stepProgess.step1.transmission = this.defaultTransmission ;
            }
            if(this.stepProgess.step1.body_style == null ) {
                this.stepProgess.step1.body_style = this.defaultBodyStyle ;
            }
            if(this.stepProgess.step1.engine.cylinder == null) {
                this.stepProgess.step1.engine.cylinder = this.defaultCylinder ;
            }
            if(this.stepProgess.step1.engine.fuel_type == null) {
                this.stepProgess.step1.engine.fuel_type = this.defaultFuel ;
            }
            if (this.stepProgess.step1.engine.engine_power == null ) {
                this.stepProgess.step1.engine.engine_power = this.defaultEnginePower ;
            }
        }
    }
</script>

<style >
.mr-50 {
    margin-right: 50px;
}
.engine img {
    width : 25px ;
    height : 25px ;
    overflow:  hidden;
}
.text-header {
    font-size: 17px;
    letter-spacing: 1px;
    font-family: Arial, Helvetica, sans-serif;
}
.table-header {
    background-color : #d4931a ;
}
.p-10 {
    padding: 10px;
    letter-spacing: 0.8px;
}
.useage {
    background-color : #f6f6f6 ;
    border-radius:   5px ;
    outline : none ;
    padding : 5px ;
    box-shadow:  1px 2px 5px #06CBA3 ;
    color : #d4931a ;
    border : 1px solid #f6f6f6 ;
}
    .icon-color {
        color : #06CBA3 ;
    }
    .main-color {
        background: #06CBA3;
        color : black ;
    }
    .ml-3 {
        margin-left:  5px;
    }
</style>