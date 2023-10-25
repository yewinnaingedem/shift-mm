<template>
    <div class="mb-3 mt-3">
        <h3 class="text-center fw-semibold mb-3"> Add Functions </h3>
        <div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="blind_sport" class="d-flex justify-content-center bg-main align-items-center p-10 rounded-sm "
                        :class="{activeColor : data.blind_sport}"
                    >
                        <input type="checkbox" v-model="data.blind_sport" class="input-check" id="blind_sport">
                        <div class="fw-bold">
                            Blind Sport 
                        </div>
                    </label>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="lane_keep_assit" class="d-flex justify-content-center bg-main align-items-center p-10 rounded-sm "
                        :class="{activeColor : data.lane_keep_assit}"
                    >
                        <input type="checkbox" v-model="data.lane_keep_assit" class="input-check" id="lane_keep_assit">
                        <div class="fw-bold">
                            Lane Keep Assit 
                        </div>
                    </label>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="streeing_volume" class="d-flex justify-content-center bg-main align-items-center p-10 rounded-sm "
                        :class="{activeColor : data.streeing_volume}"
                    >
                        <input type="checkbox" v-model="data.streeing_volume" class="input-check" id="streeing_volume">
                        <div class="fw-bold">
                            Streeing Volume  
                        </div>
                    </label>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="rounded_ac" class="d-flex justify-content-center bg-main align-items-center p-10 rounded-sm "
                        :class="{activeColor : data.rounded_ac}"
                    >
                        <input type="checkbox" v-model="data.rounded_ac" class="input-check" id="rounded_ac">
                        <div class="fw-bold">
                            Surroned Air Con 
                        </div>
                    </label>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="auto_headlight" class="d-flex justify-content-center bg-main align-items-center p-10 rounded-sm "
                        :class="{activeColor : data.auto_headlight}"
                    >
                        <input type="checkbox" v-model="data.auto_headlight" class="input-check" id="auto_headlight">
                        <div class="fw-bold">
                            Auto Headlight 
                        </div>
                    </label>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="rain_sensor" class="d-flex justify-content-center bg-main align-items-center p-10 rounded-sm "
                        :class="{activeColor : data.rain_sensor}"
                    >
                        <input type="checkbox" v-model="data.rain_sensor" class="input-check" id="rain_sensor">
                        <div class="fw-bold">
                            Rain Sensor 
                        </div>
                    </label>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="auto_em_b" class="d-flex justify-content-center bg-main align-items-center p-10 rounded-sm "
                        :class="{activeColor : data.auto_em_b}"
                    >
                        <input type="checkbox" v-model="data.auto_em_b" class="input-check" id="auto_em_b">
                        <div class="fw-bold">
                            Auto Emergency Brake
                        </div>
                    </label>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="abs" class="d-flex justify-content-center bg-main align-items-center p-10 rounded-sm "
                        :class="{activeColor : data.abs}"
                    >
                        <input type="checkbox" v-model="data.abs" class="input-check" id="abs">
                        <div class="fw-bold">
                            A B S 
                        </div>
                    </label>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="auto_hold" class="d-flex justify-content-center bg-main align-items-center p-10 rounded-sm "
                        :class="{activeColor : data.auto_hold}"
                    >
                        <input type="checkbox" v-model="data.auto_hold" class="input-check" id="auto_hold">
                        <div class="fw-bold">
                            Auto Hold
                        </div>
                    </label>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="tire_pressure" class="d-flex justify-content-center bg-main align-items-center p-10 rounded-sm "
                        :class="{activeColor : data.tire_pressure}"
                    >
                        <input type="checkbox" v-model="data.tire_pressure" class="input-check" id="tire_pressure">
                        <div class="fw-bold">
                            Tire Pressure 
                        </div>
                    </label>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="truck_motor" class="d-flex justify-content-center bg-main align-items-center p-10 rounded-sm "
                        :class="{activeColor : data.truck_motor}"
                    >
                        <input type="checkbox" v-model="data.truck_motor" class="input-check" id="truck_motor">
                        <div class="fw-bold">
                            Truck Motor 
                        </div>
                    </label>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="kick_sensor" class="d-flex justify-content-center bg-main align-items-center p-10 rounded-sm "
                        :class="{activeColor : data.kick_sensor}"
                    >
                        <input type="checkbox" v-model="data.kick_sensor" class="input-check" id="kick_sensor">
                        <div class="fw-bold">
                            Kick Sensor 
                        </div>
                    </label>
                </div>
                <div class="col-md-12 mb-3" @click="allFucture" >
                    <input type="checkbox"  v-model="checkAll" id="allFucture">
                    <label class="form-label" for="allFucture">Check All Fucture</label>
                </div>
            </div>
        </div>
    </div>
</template>

<script >
    export default {
        props : {
            data : {
                type : Object ,
                required : true ,
            } ,
            arrayData : {
                type : Array ,
                required : true ,
            } ,
        },
        data() {
            return {
                checkAll : false ,
            }
        },
        watch  : {
            
        },
        methods : {
            allFucture () {
                this.checkAll = true ;
                if(this.checkAll) {
                    this.data.blind_sport = true ;
                    this.data.lane_keep_assit = true ;
                    this.data.streeing_volume = true ;
                    this.data.auto_headlight  = true ;
                    this.data.auto_em_b = true ;
                    this.data.abs = true ;
                    this.data.rain_sensor = true ;
                    this.data.auto_hold = true ;
                    this.data.tire_pressure  = true ;
                    this.data.truck_motor = true ;
                    this.data.kick_sensor  = true ;
                    return ;
                }
                return this.checkAll = false ;
            }
        },
    };
</script>

<style scoped>
    .input-check {
        appearance: none;
        display: none;
    }
    .p-10 {
        padding: 10px;
    }
    .rounded-sm {
        border-radius: 4px;
    }
    .bg-main {
        background: #71747D;
    }
    .activeColor {
        background: #06CBA3;
    }
</style>