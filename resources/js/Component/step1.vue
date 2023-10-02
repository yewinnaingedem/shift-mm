<template>
    <div>
        <h3 class="fw-bolder">Basic Details </h3>
        <div class="row">
            <div class="col-md-6 ">
                <div class="mb-3">
                    <div class="d-flex flex-column justify-content-center align-items-start ">
                        <label for="zip" class="form-label">license Plate </label>
                        <input type="text" 
                            v-model="data.license"
                            name="" id="zip" class="w-100 form-control mb-1"
                            placeholder="Enter License Plate Number">
                        <p v-show="data.zip" class="fs-8 text-danger">invaild zip code</p>
                    </div>
                </div>
            </div>
            <div class="mb-3 col-md-6">
                <div class="d-flex flex-column justify-content-center align-items-start ">
                    <label for="millage" class="form-label">Millage Or KiloMeter</label>
                    <input type="text"  name="" id="millage" class="w-100 form-control mb-1"
                        v-model="data.millage"
                        placeholder="Enter Millage Or Kilo Meter">
                </div>
            </div>
        </div>
        <div class="mb-3">
            <div class="d-flex justify-content-between align-items-center mb-2 ">
                <h5 class="fw-bold">Trim</h5>
                <i class="fa-solid fa-question"></i>
            </div>
            <input type="text" v-model="data.trim"  id="" placeholder="Enter Trim" class="form-control mb-3">
        </div>
        <div class="mb-3">
            <h5 class="fw-bold cap-5">Exterior color</h5>
            <div class=" row ">
                <div class="col-md-3 mb-3">
                    <label for="red" class="d-flex justify-content-center align-items-center p-10 rounded-sm  text-white"
                        :class="[data.exterior_color == 'red' ? activeClass : mainClass]"
                    >
                        <input type="radio" v-model="data.exterior_color" class="check-input" id="red" value="red">
                        <div>
                            Red 
                        </div>
                    </label>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="white" class="d-flex justify-content-center align-items-center p-10 rounded-sm  text-white"
                        :class="[data.exterior_color == 'white' ? activeClass : mainClass]"
                    >
                        <input type="radio" v-model="data.exterior_color" class="check-input" id="white" value="white">
                        <div>
                            White
                        </div>
                    </label>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="pear_white" class="d-flex justify-content-center align-items-center p-10 rounded-sm  text-white"
                        :class="[data.exterior_color == 'pear_white' ? activeClass : mainClass]"
                    >
                        <input type="radio" v-model="data.exterior_color" class="check-input" id="pear_white" value="pear_white">
                        <div>
                            Pear White
                        </div>
                    </label>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="gray" class="d-flex justify-content-center align-items-center p-10 rounded-sm  text-white"
                        :class="[data.exterior_color == 'gray' ? activeClass : mainClass]"
                    >
                        <input type="radio" v-model="data.exterior_color" class="check-input" id="gray" value="gray">
                        <div>
                            Gray
                        </div>
                    </label>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="ivory_gold" class="d-flex justify-content-center align-items-center p-10 rounded-sm  text-white"
                        :class="[data.exterior_color == 'ivory_gold' ? activeClass : mainClass]"
                    >
                        <input type="radio" v-model="data.exterior_color" class="check-input" id="ivory_gold" value="ivory_gold">
                        <div>
                            Ivory Gold
                        </div>
                    </label>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="blue" class="d-flex justify-content-center align-items-center p-10 rounded-sm  text-white"
                        :class="[data.exterior_color == 'blue' ? activeClass : mainClass]"
                    >
                        <input type="radio" v-model="data.exterior_color" class="check-input" id="blue" value="blue">
                        <div>
                            Blue 
                        </div>
                    </label>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <h5 class="fw-bold cap-5"> Body Style</h5>
            <div class="mb-3">
                <div class="row">
                    <div class="col-md-3 mb-3 ">
                        <label for="4_door_suv" class="d-flex justify-content-center align-items-center rounded-sm p-10 text-white"
                            :class="[data.body_style == '4_door_suv' ? activeClass : mainClass ]"
                        >
                            <input type="radio" value="4_door_suv" class="check-input" id="4_door_suv" v-model="data.body_style">
                            <div>
                                4 Door SUV 
                            </div>
                        </label>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="sedon" class="d-flex justify-content-center align-items-center rounded-sm p-10 text-white"
                            :class="[data.body_style == 'sedon' ? activeClass : mainClass ]"
                        >
                            <input type="radio" value="sedon" class="check-input" id="sedon" v-model="data.body_style">
                            <div>
                                Sedon 
                            </div>
                        </label>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="luxury" class="d-flex justify-content-center align-items-center rounded-sm p-10 text-white"
                            :class="[data.body_style == 'luxury' ? activeClass : mainClass ]"
                        >
                            <input type="radio" value="luxury" class="check-input" id="luxury" v-model="data.body_style">
                            <div>
                                Luxury 
                            </div>
                        </label>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="crossover" class="d-flex justify-content-center align-items-center rounded-sm p-10 text-white"
                            :class="[data.body_style == 'crossover' ? activeClass : mainClass ]"
                        >
                            <input type="radio" value="crossover" class="check-input" id="crossover" v-model="data.body_style">
                            <div>
                                Crossover
                            </div>
                        </label>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="hatchback" class="d-flex justify-content-center align-items-center rounded-sm p-10 text-white"
                            :class="[data.body_style == 'hatchback' ? activeClass : mainClass ]"
                        >
                            <input type="radio" value="hatchback" class="check-input" id="hatchback" v-model="data.body_style">
                            <div>
                                Hatchback
                            </div>
                        </label>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="pickup" class="d-flex justify-content-center align-items-center rounded-sm p-10 text-white"
                            :class="[data.body_style == 'pickup' ? activeClass : mainClass ]"
                        >
                            <input type="radio" value="pickup" class="check-input" id="pickup" v-model="data.body_style">
                            <div>
                                Pickup Truck 
                            </div>
                        </label>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="compact_suv" class="d-flex justify-content-center align-items-center rounded-sm p-10 text-white"
                            :class="[data.body_style == 'compact_suv' ? activeClass : mainClass ]"
                        >
                            <input type="radio" value="compact_suv" class="check-input" id="compact_suv" v-model="data.body_style">
                            <div>
                                Compact SUV
                            </div>
                        </label>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="convertible" class="d-flex justify-content-center align-items-center rounded-sm p-10 text-white"
                            :class="[data.body_style == 'convertible' ? activeClass : mainClass ]"
                        >
                            <input type="radio" value="convertible" class="check-input" id="convertible" v-model="data.body_style">
                            <div>
                                Convertible
                            </div>
                        </label>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="sport" class="d-flex justify-content-center align-items-center rounded-sm p-10 text-white"
                            :class="[data.body_style == 'sport' ? activeClass : mainClass ]"
                        >
                            <input type="radio" value="sport" class="check-input" id="sport" v-model="data.body_style">
                            <div>
                                Sport Car
                            </div>
                        </label>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="minivan" class="d-flex justify-content-center align-items-center rounded-sm p-10 text-white"
                            :class="[data.body_style == 'minivan' ? activeClass : mainClass ]"
                        >
                            <input type="radio" value="minivan" class="check-input" id="minivan" v-model="data.body_style">
                            <div>
                                Minivan
                            </div>
                        </label>
                    </div>
                     <div class="col-md-3 mb-3">
                        <label for="ev" class="d-flex justify-content-center align-items-center rounded-sm p-10 text-white"
                            :class="[data.body_style == 'ev' ? activeClass : mainClass ]"
                        >
                            <input type="radio" value="ev" class="check-input" id="ev" v-model="data.body_style">
                            <div>
                                Electric Car 
                            </div>
                        </label>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="hybric" class="d-flex justify-content-center align-items-center rounded-sm p-10 text-white"
                            :class="[data.body_style == 'hybric' ? activeClass : mainClass ]"
                        >
                            <input type="radio" value="hybric" class="check-input" id="hybric" v-model="data.body_style">
                            <div>
                                Hybric Car 
                            </div>
                        </label>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="wagon" class="d-flex justify-content-center align-items-center rounded-sm p-10 text-white"
                            :class="[data.body_style == 'wagon' ? activeClass : mainClass ]"
                        >
                            <input type="radio" value="wagon" class="check-input" id="wagon" v-model="data.body_style">
                            <div>
                                Wagon 
                            </div>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<style scoped>
.mr-3 {
    margin-right: 15px;
}

.mr-5 {
    margin-right: 5px;
}

.fs-8 {
    font-size: 12px;
}

.pl-25 {
    padding-left: 25px;
}

.cap-5 {
    opacity: 0.8;
}

.position-sticky {
    top: 0px;
    left: 0;
}

.pt-20 {
    padding-top: 20px;
}

.mr-2 {
    margin-right: 5px;
}

.capitalize {
    text-transform: capitalize;
}

.main-color {
    background-color: #f7f7f7;
}

.z-100 {
    z-index: 100;
}

.check-input {
    appearance: none;
    display: none;
}
.p-10 {
    padding: 10px;
}
.active-color {
    background : #06CBA3 ;
}
.rounded-sm {
    border-radius: 4px;
}
.bg-main {
    background: #71747D;
}
.text-white {
    color: white ;
}
</style>
    
<script >
    
    export default {
        props :  {
            data : Object ,
            brands : Object ,
        } ,
        data () {
            return {
                activeClass : [
                    'active-color'
                ],
                mainClass : [
                    'bg-main'
                ]
            }
        },
        computed : {
            checkedInput () {
                this.$data
            }
        },
        watch : {
            checkedInput : {
                handler (newValue) {
                    console.log(newValue);
                }
            }
        }   
    }


</script> 