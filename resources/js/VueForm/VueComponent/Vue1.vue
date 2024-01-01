<template>
    <div class="container">
        <div class="h3 text-center fw-bold">
                Adding the grade for <span class="fw-bold text-primary">{{ datas.brand_name }}</span> <span class="text-danger">({{ datas.model_name }})</span>
        </div>
        <div class="row">
            <div class="fw-bold mb-3 h-3 text-header">Transmission</div>
            <div class="col-lg-2 col-md-3 col-sm-4 mb-3" v-for="(transmission  , index ) in datas['transmissions']" :key="transmission.id">
                <label :for="transmission.id + 'tr'" class="d-flex justify-content-center align-items-center main-color p-10 rounded" 
                    :class="(transmission.id === stepProgess.step1.transmission) ? 'bg-dark text-white' : ' ' "
                >
                    <input type="radio"
                    @input="definedTransmisson"
                    v-model="stepProgess.step1.transmission" :value="transmission.id" :id="transmission.id + 'tr'" class="d-none">
                    <div class="fw-bold">
                        {{ transmission.transmission }}
                    </div>
                </label>
            </div>
        </div>
        <hr>
        <div class="mb-3">
            <label class="text-header mb-2" for="">Body Style</label>
            <select name="" id="" class="form-select" v-model="stepProgess.step1.body_style">
                <option :value="body_style.id" v-for="body_style in datas['body_styles']" :key="body_style.id">{{ body_style.body_style }}</option>
            </select>
        </div>
        <hr>
        <div class="row">
            <div class="text-header text-center mb-3 fw-bold">Enigne</div>
            <div class="col-md-12 mb-3">
                <label for="cylinder" class="form-label">Cylinder</label>
                <select name="cylinder" id="" class="form-select" v-model="stepProgess.step1.engine.cylinder">
                    <option v-for="cylinder in datas.cylinders" :key="cylinder.id" :value="cylinder.id"> {{ cylinder.cylinder }}</option>
                </select>
            </div>     
        </div>
        <div class=" mb-3">
            <div class="row">
                <div class="col-md-6">
                    <label for="fuel" class="form-label">Fuel </label>
                </div>
                <div class="form-check col-md-6 form-switch mb-3 d-flex justify-content-end align-items-center ">
                    <label class="d-block mr-50" for="gradeValide">Does it have Trubo ?</label>
                    <input class="form-check-input" type="checkbox" name="Turbo" role="switch" v-model="stepProgess.step1.engine.turbo" value="exist" id="gradeValide">
                </div>
            </div>
            <div class="mb-3">
                <select name="" id="" class="form-select" v-model="stepProgess.step1.engine.fuel_type">
                    <option :value="fuel.id" v-for="fuel in datas.fuels" :key="fuel.id" >{{ fuel.type }}</option>
                </select>
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
                
            }
        },
        computed : {
            definedTransmisson () {
                const turbo = this.stepProgess.step1.engine.engine_power ;
                if(turbo) {
                    turbo.scrollIntoView({behavior : 'smooth' , block :'center' ,
                    })
                }
            },
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
        }
    }
</script>

<style >
.mr-50 {
    margin-right: 50px;
}
.text-header {
    font-size: 17px;
    letter-spacing: 1px;
    font-family: Arial, Helvetica, sans-serif;
}
.p-10 {
    padding: 10px;
    letter-spacing: 0.8px;
}
    .main-color {
        background: #06CBA3;
    }
</style>