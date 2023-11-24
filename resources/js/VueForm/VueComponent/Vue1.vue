<template>
    <div class="container">
        <div class="row">
            <div class="fw-bold mb-3 h-3 text-header">Transmission</div>
            <div class="col-lg-2 col-md-3 col-sm-4 mb-3" v-for="(transmission  , index ) in datas['transmissions']" :key="transmission.id">
                <label :for="transmission.id + 'tr'" class="d-flex justify-content-center align-items-center main-color p-10 rounded" 
                    :class="(transmission.id === stepsProgess.transmission) ? 'bg-dark text-white' : ' ' "
                >
                    <input type="radio" v-model="stepsProgess.transmission" :value="transmission.id" :id="transmission.id + 'tr'" class="d-none">
                    <div class="fw-bold">
                        {{ transmission.transmission }}
                    </div>
                </label>
            </div>
        </div>
        <hr>
        <div class="mb-3">
            <label class="text-header mb-2" for="">Body Style</label>
            <select name="" id="" class="form-select" v-model="stepsProgess.body_style">
                <option :value="body_style.id" v-for="body_style in datas['body_styles']" :key="body_style.id">{{ body_style.body_style }}</option>
            </select>
        </div>
        <hr>
        <div class="row">
            <div class="text-header text-center mb-3 fw-bold">Enigne</div>
            <div class="col-md-6 mb-3">
                <label for="engine_power" class="form-label">Add Engine Power</label>
                <select name="engine_power" id="engine_power" class="form-select" v-model="stepsProgess.engine.engine_power">
                    <option v-for="engine_power in datas.engine_powers" :key="engine_power.id" :value="engine_power.id"> {{ engine_power.engine_power + " " + "CC" }}</option>
                </select>
            </div>  
            <div class="col-md-6 mb-3">
                <label for="cylinder" class="form-label">Cylinder</label>
                <select name="cylinder" id="" class="form-select" v-model="stepsProgess.engine.cylinder">
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
                    <input class="form-check-input" type="checkbox" name="Turbo" role="switch" v-model="stepsProgess.engine.turbo" value="exist" id="gradeValide">
                </div>
            </div>
            <div class="mb-3">
                <select name="" id="" class="form-select" v-model="stepsProgess.engine.fuel_type">
                    <option :value="fuel.id" v-for="fuel in datas.fuels" :key="fuel.id" >{{ fuel.type }}</option>
                </select>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name : "Vue1" ,
        props : {
            datas : {
                type : Object , 
                required : true ,
            },
            stepsProgess : {
                type : Object ,
                required : true ,
            }
        },
        computed : {
            defaultBodyStyle () {
                if(this.datas['body_styles'].length > 0) 
                {
                    return this.datas['body_styles'][0].id ;
                }
                return null ;
            },
            defaultEnginePower () {
                if(this.datas['engine_powers'].length > 0) 
                {
                    return this.datas['engine_powers'][0].id ;
                }
                return null ;
            },
            defaultFuel () {
                if(this.datas['fuels'].length > 0) 
                {
                    return this.datas['fuels'][0].id ;
                }
                return null ;
            },
            defaultCylinder () {
                if(this.datas['cylinders'].length > 0) {
                    return this.datas['cylinders'][0].id ;
                }
                return null ;
            },
            defaultTransmission () {
                if(this.datas['transmissions'].length > 0) {
                    return this.datas['transmissions'][0].id ;
                }
                return null ;
            }
        },
        mounted () {
            this.stepsProgess.body_style = this.defaultBodyStyle ;
            this.stepsProgess.engine.engine_power = this.defaultEnginePower ;
            this.stepsProgess.engine.fuel_type = this.defaultFuel ;
            this.stepsProgess.transmission = this.defaultTransmission ;
            this.stepsProgess.engine.cylinder = this.defaultCylinder ;
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