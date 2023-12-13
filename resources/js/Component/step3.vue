<template>
    <div class="mb-3 mt-3">
        <label for="interior" class="form-label"> Interior Color </label>
        <input type="text" class="form-control" v-model="data.interior_color" placeholder="Enter Color " id="interior">
    </div>
    <div class="mb-3 mt-3">
        <label for="vin" class="form-label"> VIN </label>
        <input type="text" class="form-control" v-model="data.VIN" placeholder="Enter VIN " id="vin">
    </div>
    <div class="mb-3">
        <label for="engine_exception" class="form-label">Engine Exception</label>
        <textarea class="form-control" placeholder="Enter Engine Exception" v-model="data.engine_exception" id="engine_exception" rows="1"></textarea>
    </div>
    <div class="mb-3">
        <label for="license_exception" class="form-label">License Exception</label>
        <textarea class="form-control" placeholder="Enter License Exception" v-model="data.license_exception" id="license_exception" rows="1"></textarea>
    </div>
    <div class="mb-3">
        <label for="exception" class="form-label">Exception</label>
        <textarea class="form-control" v-model="data.exception" placeholder="Enter Exception" id="exception" rows="1"></textarea>
    </div>
</template>

<script >
    export default {
        props : {
            arrayData : {
                type : Array ,
                required : true ,
            } ,
            data : {
                type : Object ,
                required  : true ,
            }
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