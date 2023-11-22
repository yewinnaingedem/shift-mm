<template>
    <div class="container">
        <div class="row">
            <div class="fw-bold mb-3 h-3 text-header"> Define Body Style !</div>
            <div class="col-md-3 col-lg-4 mb-3" v-for="(divertrim  , index ) in datas['divertrims']" :key="divertrim.id">
                <label :for="divertrim.id + 'tr'" class="d-flex justify-content-center align-items-center main-color p-10 rounded" 
                    :class="(divertrim.id === stepsProgess.divertrim) ? 'bg-dark text-white' : ' ' "
                >
                    <input type="radio" v-model="stepsProgess.divertrim" :value="divertrim.id" :id="divertrim.id + 'tr'" class="d-none">
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
                    :class="(key.id === stepsProgess.key) ? 'bg-dark text-white' : ' ' "
                >
                    <input type="radio" v-model="stepsProgess.key" :value="key.id" :id="key.id + 'key'" class="d-none">
                    <div class="fw-bold text-sm-12">
                        {{ key.key }}
                    </div>
                </label>
            </div>
            <hr>
        </div>
        <div class="row">
            <div class="fw-bold mb-3 h-3 text-header">Define SunRoof !</div>
            <div class="col-md-4 col-md-3 mb-3" v-for="(SunRoof  , index ) in datas['sun_roofs']" :key="SunRoof.id">
                <label :for="SunRoof.id + 'sn'" class="d-flex justify-content-center align-items-center main-color p-10 rounded" 
                    :class="(SunRoof.id === stepsProgess.key) ? 'bg-dark text-white' : ' ' "
                >
                    <input type="radio" v-model="stepsProgess.key" :value="SunRoof.id" :id="SunRoof.id + 'sn'" class="d-none">
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
                    :class="(motor.id === stepsProgess.motor) ? 'bg-dark text-white' : ' ' "
                >
                    <input type="radio" v-model="stepsProgess.motor"  :value="motor.id" :id="motor.id + 'motor'" class="d-none">
                    <div class="fw-bold text-sm-12">
                        {{ motor.motor }}
                    </div>
                </label>
            </div>
            <hr>
        </div>
        <div class="row">
            <div class="fw-bold mb-3 h-3 text-header">Define Truck Motor !</div>
            <div class="col-md-4 col-md-3 mb-3" v-for="(aircon  , index ) in datas['aircons']" :key="aircon.id">
                <label :for="aircon.id + 'aircon'" class="d-flex justify-content-center align-items-center main-color p-10 rounded" 
                    :class="(aircon.id === stepsProgess.aircon) ? 'bg-dark text-white' : ' ' "
                >
                    <input type="radio" v-model="stepsProgess.aircon"  :value="aircon.id" :id="aircon.id + 'aircon'" class="d-none">
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
                    :class="(seat.id === stepsProgess.seat) ? 'bg-dark text-white' : ' ' "
                >
                    <input type="radio" v-model="stepsProgess.seat"  :value="seat.id" :id="seat.id + 'seat'" class="d-none">
                    <div class="fw-bold text-sm-12">
                        {{ seat.seat }}
                    </div>
                </label>
            </div>
            <hr>
        </div>
    </div>

</template>

<script>
    export default {
        name : "Vue2" ,
        props : {
            datas : {
                type : Object ,
                required : true 
            },
            stepsProgess : {
                type : Object ,
                required :true ,
            }
        },
        mounted () {
            console.log(this.datas.sun_roofs);
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