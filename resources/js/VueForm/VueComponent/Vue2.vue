<template>
    <div class="container">
        <div class="row">
            <div class="fw-bold mb-3 h-3 text-header"> Define Body Style !</div>
            <div class="col-md-4 col-lg-3 mb-3" v-for="(divertrim  , index ) in datas['divertrims']" :key="divertrim.id">
                <label :for="divertrim.id + 'tr'" class="d-flex justify-content-center align-items-center main-color p-10 rounded" 
                    :class="(divertrim.id === stepProgess.step2.divertrim) ? 'bg-dark text-white' : ' ' "
                >
                    <input type="radio" v-model="stepProgess.step2.divertrim"  :value="divertrim.id" :id="divertrim.id + 'tr'" class="d-none">
                    <div class="fw-bold text-sm-auto">
                        {{ divertrim.divertrim }}
                    </div>
                </label>
            </div>
            <hr>
        </div>
        <div class="row">
            <div class="fw-bold mb-3 h-3 text-header">Define Key !</div>
            <div class="col-md-4 col-md-3 mb-3" v-for="(key  , index ) in datas['keys']" :key="key.id">
                <label :for="key.id + 'key'" class="d-flex justify-content-center align-items-center main-color p-10 rounded" 
                    :class="(key.id === stepProgess.step2.key) ? 'bg-dark text-white' : ' ' "
                >
                    <input type="radio" v-model="stepProgess.step2.key" :value="key.id" :id="key.id + 'key'" class="d-none">
                    <div class="fw-bold text-sm-12">
                        {{ key.key }}
                    </div>
                </label>
            </div>
            <hr>
        </div>
        <div class="row">
            <div class="fw-bold mb-3 h-3 text-header">Define SunRoof !</div>
            <div class="col-md-4 col-md-3 col-lg-3 mb-3" v-for="(SunRoof  , index ) in datas['sun_roofs']" :key="SunRoof.id">
                <label :for="SunRoof.id + 'sn'" class="d-flex justify-content-center align-items-center main-color p-10 rounded" 
                    :class="(SunRoof.id === stepProgess.step2.sun_roof) ? 'bg-dark text-white' : ' ' "
                >
                    <input type="radio" v-model="stepProgess.step2.sun_roof" :value="SunRoof.id" :id="SunRoof.id + 'sn'" class="d-none">
                    <div class="fw-bold text-sm-12">
                        {{ SunRoof.sun_roof }}
                    </div>
                </label>
            </div>
            <hr>
        </div>
        <div class="row">
            <div class="fw-bold mb-3 h-3 text-header">Define Truck Motor !</div>
            <div class="col-md-4 col-md-3 mb-3" v-for="(motor  , index ) in datas['motors']" :key="motor.id">
                <label :for="motor.id + 'motor'" class="d-flex justify-content-center align-items-center main-color p-10 rounded" 
                    :class="(motor.id === stepProgess.step2.motor) ? 'bg-dark text-white' : ' ' "
                >
                    <input type="radio" v-model="stepProgess.step2.motor"  :value="motor.id" :id="motor.id + 'motor'" class="d-none">
                    <div class="fw-bold text-sm-12">
                        {{ motor.motor }}
                    </div>
                </label>
            </div>
            <hr>
        </div>
        <div class="row">
            <div class="fw-bold mb-3 h-3 text-header">Define Air Con Condition !</div>
            <div class="col-md-4 col-md-3 mb-3" v-for="(aircon  , index ) in datas['aircons']" :key="aircon.id">
                <label :for="aircon.id + 'aircon'" class="d-flex justify-content-center align-items-center main-color p-10 rounded" 
                    :class="(aircon.id === stepProgess.step2.aircon) ? 'bg-dark text-white' : ' ' "
                >
                    <input type="radio" v-model="stepProgess.step2.aircon"  :value="aircon.id" :id="aircon.id + 'aircon'" class="d-none">
                    <div class="fw-bold text-sm-12">
                        {{ aircon.aircon }}
                    </div>
                </label>
            </div>
            <hr>
        </div>
        <div class="row">
            <div class="fw-bold mb-3 h-3 text-header">Define Seat Condition !</div>
            <div class="col-md-4 col-md-3 mb-3" v-for="(seat  , index ) in datas['seats']" :key="seat.id">
                <label :for="seat.id + 'seat'" class="d-flex justify-content-center align-items-center main-color p-10 rounded" 
                    :class="(seat.id === stepProgess.step2.seat) ? 'bg-dark text-white' : ' ' "
                >
                    <input type="radio" v-model="stepProgess.step2.seat"  :value="seat.id" :id="seat.id + 'seat'" class="d-none">
                    <div class="fw-bold text-sm-12">
                        {{ seat.seat }}
                    </div>
                </label>
            </div>
            <hr>
        </div>
        <div class="row">
            <div class="fw-bold mb-3 h-3 text-header">Define Sonors Condition !</div>
            <div class="col-md-4 col-md-3 mb-3" v-for="(sonor  , index ) in datas['sonars']" :key="sonor.id">
                <label :for="sonor.id + 'sonor'" class="d-flex justify-content-center align-items-center main-color p-10 rounded" 
                    :class="(sonor.id === stepProgess.step2.sonor) ? 'bg-dark text-white' : ' ' "
                >
                    <input type="radio" v-model="stepProgess.step2.sonor"  :value="sonor.id" :id="sonor.id + 'sonor'" class="d-none">
                    <div class="fw-bold text-sm-12">
                        {{ sonor.sonar }}
                    </div>
                </label>
            </div>
            <hr>
        </div>
        <div class="row">
            <div class="fw-bold mb-3 h-3 text-header">Define Camera Condition !</div>
            <div class="col-md-4 col-md-3 mb-3" v-for="(camera  , index ) in datas['cameras']" :key="camera.id">
                <label :for="camera.id + 'camera'" class="d-flex justify-content-center align-items-center main-color p-10 rounded" 
                    :class="(camera.id === stepProgess.step2.camera) ? 'bg-dark text-white' : ' ' "
                >
                    <input type="radio" v-model="stepProgess.step2.camera"  :value="camera.id" :id="camera.id + 'camera'" class="d-none">
                    <div class="fw-bold text-sm-12">
                        {{ camera.camera }}
                    </div>
                </label>
            </div>
            <hr>
        </div>
    </div>

</template>

<script>
    import { stepProgess } from './stepProgess.js';
    export default {
        name : "Vue2" ,
        setup () {
            return { stepProgess} ;
        },
        props : {
            datas : {
                type : Object ,
                required : true 
            },
        },
        computed : {
            defaultDivertrim  () {
                return this.datas.divertrims.length  > 0 ? this.datas.divertrims[1].id : null ;
            },
            defaultKey () {
                return this.datas.keys.length  > 0 ? this.datas.keys[0].id : null ;
            } ,
            defaultSunRoof () {
                return this.datas.sun_roofs.length  > 0 ? this.datas.sun_roofs[2].id : null ;
            },
            defaultTruckMotor () {
                return this.datas.motors.length  > 0 ? this.datas.motors[0].id : null ;
            },
            defaultAirCon () {
                return this.datas.aircons.length  > 0 ? this.datas.aircons[0].id : null ;
            }, 
            defaultSeat () {
                return this.datas.seats.length  > 0 ? this.datas.seats[0].id : null ;
            },
            defaultSonor () {
                return this.datas.sonars.length  > 0 ? this.datas.sonars[1].id : null ;
            },
            defaultCamera () {
                return this.datas.cameras.length  > 0 ? this.datas.cameras[0].id : null ;
            },
        },
        mounted () {
            if(this.stepProgess.step2.divertrim == null) {
                this.stepProgess.step2.divertrim = this.defaultDivertrim ;
            }
            if(this.stepProgess.step2.sun_roof == null) {
                this.stepProgess.step2.sun_roof = this.defaultSunRoof ;
            }
            if(this.stepProgess.step2.key == null) {
                this.stepProgess.step2.key = this.defaultKey ;
            }
            if(this.stepProgess.step2.motor == null) {
                this.stepProgess.step2.motor = this.defaultTruckMotor ;
            }
            if(this.stepProgess.step2.aircon == null) {
                this.stepProgess.step2.aircon = this.defaultAirCon ;
            }
            if(this.stepProgess.step2.seat == null) {
                this.stepProgess.step2.seat = this.defaultSeat ;
            }
            if(this.stepProgess.step2.sonor == null) {
                this.stepProgess.step2.sonor = this.defaultSonor ;
            }
            if(this.stepProgess.step2.camera == null) {
                this.stepProgess.step2.camera = this.defaultCamera ;
            }
        }
    }
</script>

<style scoped>
    .p-50 {
        padding: 10px 5px;
        letter-spacing: 1px;
    }
    .text-sm-auto {
        font-size: 10px;
    }
    .text-sm-12 {
        font-size: 12px;
    }
</style>