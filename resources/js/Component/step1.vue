<template>
    <div>
        <h3 class="fw-bolder">Basic Details </h3>
        <div class="row">
            <div class="col-md-6 ">
                <div class="mb-3">
                    <div class="d-flex flex-column justify-content-center align-items-start ">
                        <label for="zip" class="form-label">license Plate </label>
                        <div class="w-100 position-relative">
                            <input type="text" :maxLength="maxCharacter" v-model="data.license" @input="checkValidae"
                                class="w-100 form-control mb-1 "
                                :class="{ 'is-valid': isValide, 'is-invalid': isInValide }"
                                placeholder="Enter License Plate Number">
                            <div class="position-absolute top-3 right-0" v-if="loading">
                                <i class="fas fa-spinner fa-spin spinner-fw"></i>
                            </div>
                            <p class="m-0 fw-bolder text-success" v-else-if="showAlert">It is avaliable</p>
                            <p class="text-danger m-0 fw-bolder" v-else-if="showError">It is not avaliable</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-3 col-md-6">
                <div class="d-flex flex-column justify-content-center align-items-start ">
                    <label for="millage" class="form-label">Millage Or KiloMeter</label>
                    <input type="text" name="" id="millage" class="w-100 form-control mb-1" v-model="data.millage"
                        @input="toLocalString" :maxlength="maxMillage" placeholder="Enter Millage Or Kilo Meter">
                </div>
            </div>
        </div>
        <div v-if="arrayData['grades'].length > 0 && arrayData['grades'][0].grade == 'none'">
            <div class="alert alert-warning alert-dismissible fade show"  v-if="isvisiable">
                <strong>Mingalar Car Sale Center !</strong> We detectived that doesn't have a grade
                <button type="button" class="btn-close"  @click="btn_close" ></button>
            </div>
        </div>
        <div class="mb-3" v-else>
            <label for="form-label mb-3">Grade </label>
            <select class="form-select" v-model="data.grade">
                <option :value="grade.id" v-for="grade in arrayData['grades']" :key="grade.id">
                    {{ grade.grade }}
                </option>
            </select>
        </div>
        <div class="mb-3">
            <label for="transmission_type" class="form-label mb-3">Transmission</label>
            <select v-model="data.transmission" id="transmission_type" class="form-select">
                <option style="display: none;" selected>Dirving Hand</option>
                <option v-for="transmission_type in arrayData['transmissionTypes']" :key="transmission_type.id"
                    :value="transmission_type.id">
                    {{ transmission_type.transmission_type }}
                </option>
            </select>
        </div>
        <div class="mb-3">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="fw-bold cap-5">Exterior color</h5>
                </div>
                <div class="form-check col-md-6 form-switch mb-3 d-flex justify-content-end align-items-center ">
                    <label class="d-block mr-50" for="preDefinedColor">Color ?</label>
                    <input class="form-check-input" type="checkbox" v-model="adjustColor"  :value="true" id="preDefinedColor">
                </div>
            </div>
            <div class=" row ">
                <div class="col-md-4 mb-3" v-for="color in arrayData['exterior_colors']" :key="color.id"
                    v-if="adjustColor == false">
                    <label :for="color.id"
                        class="justify-content-center d-flex align-items-center p-10 rounded-sm  text-white"
                        :class="[data.exterior_color == color.id ? activeClass : mainClass]">
                        <input type="radio"  v-model="data.exterior_color"  :id="color.id" :value="color.id"
                            class="check-input">
                        <div>{{ color.exterior_color }}</div>
                    </label>
                </div>
                <div v-else>
                    <div class="mb-3">
                        <label for="preDefindedColor" class="form-label">Color</label>
                        <input type="text" class="form-control" v-model="data.exterior_color" placeholder="Enter Color">
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<style scoped>
.spinner-fw {
    width: 25px;
    height: 25px;
}
.mr-50 {
    margin-right:  50px;
}
.top-3 {
    top: 5px;
}

.right-0 {
    right: 3px;
}

.mr-5 {
    margin-right: 5px;
}

.m-0 {
    margin: 0;
}

.fs-8 {
    font-size: 12px;
}



.cap-5 {
    opacity: 0.8;
}

.position-sticky {
    top: 0px;
    left: 0;
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
    background: #06CBA3;
}

.rounded-sm {
    border-radius: 4px;
}

.bg-main {
    background: #71747D;
}

.text-white {
    color: white;
}
</style>
    
<script >
import $ from "jquery";
import { color } from "./Form/Wrapper";

export default {
    setup () {
        return { color } ;
    }, 
    props: {
        arrayData: {
            type: Object,
            required: true,
        },
        data : {
            type : Object ,
            required  : true ,
        } ,
        forSpecific: {
            type: Array,
            required: true,
        }
    },
    data() {
        return {
            adjustColor : false ,
            activeClass: [
                'active-color'
            ],
            isvisiable : true ,
            mainClass: [
                'bg-main'
            ],
            maxCharacter: 7,
            maxMillage: 8,
            isValide: false,
            isInValide: false,
            loading: false,
            showAlert: false,
            showError: false,
            plate_number: null,
        }
    },
    methods: {
        btn_close () {
            this.isvisiable  = false ;
        }, 
        async checkValidae() {
            this.loading = true;
            this.showError = false;
            this.showAlert = false;
            if (this.data.license.length == 7) {
                $.ajax({
                    url: "/api/sarchQuery",
                    type: "POST",
                    data: {
                        'searchQuery': this.data.license,
                    },
                    success: (response) => {
                        this.loading = false;
                        let step1 = this.forSpecific[0];
                        let step2 = this.forSpecific[1];
                        let step3 = this.forSpecific[2];

                        if (response.message) {
                            this.showError = true;
                            this.showAlert = false;
                            let query = response.existedQuery;
                            // for Step 1

                            step1.license = query.license_plate;
                            step1.millage = query.kilo_meter;
                            step1.grade = query.grade;
                            step1.exterior_color = query.exterior_color_id;
                            step1.transmission = query.transmission_type;
                            // for Step 2
                            step2.license_state = query.license_state;
                            step2.steering = query.steering_coner;
                            step2.warranty = query.warranty;
                            step2.pass_owner = query.pass_owner;
                            step2.madeIn = query.place_of_orgin;
                            step2.num_seat = query.number_seats;
                            step2.font_break = query.break;
                            step2.back_break = query.break;
                            // for step3 
                            step3.interior_color = query.interior_color;
                            step3.VIN = query.vin;
                            step3.engine_exception = query.engine_exception;
                            step3.license_exception = query.license_exception;
                            step3.exception = query.exception;
                        } else {
                            // for step1
                            step1.millage = null;
                            step1.exterior_color = null;
                            // for step2
                            step2.license_state = null;
                            step2.steering = null;
                            step2.warranty = null ;
                            step2.pass_owner = null ;
                            step2.madeIn = null ;
                            step2.num_seat = null ;
                            step2.font_break = null ;
                            step2.back_break = null ;
                            // for step3

                            step3.interior_color = null ;
                            step3.VIN = null ;
                            step3.engine_exception = 'none' ;
                            step3.license_exception = 'none' ;
                            step3.exception = 'none' ;
                            this.showAlert = true;
                        }
                    },
                    error: (error) => {
                        console.log(error);
                    }
                });

            }

            if (this.data.license.length == 0) {
                this.loading = false;
            }
        },
        toLocalString() {
            let value = this.data.millage.replace(/\D/g, '');
            value = Number(value).toLocaleString();
            if (value == 0) {
                this.data.millage = '';
            } else {
                this.data.millage = value;
            }
        }
    },
    computed: {
        defaultGradeId() {
            if (this.arrayData['grades'].length > 0) {
                return this.arrayData['grades'][0].id;
            }
            return null;
        },
        defaultColor () {
            return this.exterior_color ;
        }, 
        defaultTransmission() {
            if (this.arrayData['transmissionTypes'].length > 0) {
                return this.arrayData['transmissionTypes'][0].id;
            }
            return null;
        },
    },
    mounted() {
        this.data.grade = this.defaultGradeId;
        this.data.transmission = this.defaultTransmission;
    },
    watch : {
        adjustColor () {
            return this.data.exterior_color = null ;
        }
    }
}
</script> 