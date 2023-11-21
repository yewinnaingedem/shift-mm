<template>
    <div class="container">
        <div class="row">
            <div class="fw-bold mb-3 h-3 text-header">Transmission</div>
            <div class="col-md-3 mb-3" v-for="(transmission  , index ) in datas['transmissions']" :key="transmission.id">
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
            <select name="" id="" class="form-select">
                <option :value="body_style.id" v-for="body_style in datas['body_styles']" :key="body_style.id">{{ body_style.body_style }}</option>
            </select>
        </div>
        <hr>
        <div class="row">
            <div class="row">
                <div class="col-md-6">
                    <div class="fw-bold mb-3 h-3 text-header">Engine</div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-check form-switch">
                                <label class="form-check-label" for="flexSwitchCheckDefault">Disel Type ?</label>
                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check form-switch">
                                <label class="form-check-label" for="flexSwitchCheckDefault">Turbo ?</label>
                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3" v-for="(engine  , index ) in datas['engines']" :key="engine.id">
                <label :for="engine.id" class="d-flex justify-content-center align-items-center main-color p-10 rounded" 
                    :class="(engine.id === stepsProgess.engine) ? 'bg-dark text-white' : ' ' "
                >
                    <input type="radio" v-model="stepsProgess.engine" :value="engine.id" :id="engine.id" class="d-none">
                    <div class="fw-bold">
                        {{ engine.Engine_power+"CC" + "/" + engine.cylinder }}
                    </div>
                </label>
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
        mounted () {
            console.log(this.datas);
        }
    }
</script>

<style >
.text-header {
    font-size: 19px;
    letter-spacing: 1px;
    font-family: Arial, Helvetica, sans-serif;
}
.p-10 {
    padding: 10px;
}
    .main-color {
        background: #06CBA3;
    }
</style>