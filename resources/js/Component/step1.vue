<template>
    <div>
        <h3 class="fw-bolder">Basic Details </h3>
        <div class="row">
            <div class="col-md-6 ">
                <div class="mb-3">
                    <div class="d-flex flex-column justify-content-center align-items-start ">
                        <label for="zip" class="form-label">license Plate </label>
                        <div class="w-100 position-relative">
                            <input type="text" 
                            :maxLength = "maxCharacter"
                            v-model="plate_number"
                            @input="checkValidae"
                            class="w-100 form-control mb-1 "
                            :class="{'is-valid' : isValide  , 'is-invalid' : isInValide}"
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
                    <input type="text"  name="" id="millage" class="w-100 form-control mb-1"
                        v-model="data.millage"
                        @input="toLocalString"
                        :maxlength="maxMillage"
                        placeholder="Enter Millage Or Kilo Meter">
                </div>
            </div>
        </div>
        <div v-if="arrayData['grades'].length > 0 && arrayData['grades'][0].grade == 0">
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Mingalar Car Sale Center !</strong> We detectived that doesn't have a grade 
            </div>
        </div>
        <div class="mb-3" v-else>
            <label for="form-label mb-3">Grade </label>
            <select class="form-select"  v-model="data.grade" >
                <option :value="grade.id"   v-for="grade in arrayData['grades']" :key="grade.id" >
                    {{ grade.grade }}
                </option>
            </select>
        </div>
        <div class="mb-3">
            <label for="transmission_type" class="form-label mb-3">Transmission</label>
            <select v-model="data.transmission" id="transmission_type" class="form-select">
                <option style="display: none;"  selected>Dirving Hand</option>
                <option v-for="transmission_type in arrayData['transmissionTypes']" :key="transmission_type.id" :value="transmission_type.id">
                    {{ transmission_type.transmission_type }}
                </option>
            </select>
        </div>
        <div class="mb-3">
            <h5 class="fw-bold cap-5">Exterior color</h5>
            <div class=" row ">
                <div class="col-md-4 mb-3"
                v-for="color in arrayData['exterior_colors']" 
                :key="color.id" 
                >
                    <label 
                    :for="color.id"
                    class="justify-content-center d-flex align-items-center p-10 rounded-sm  text-white"
                    :class="[data.exterior_color == color.exterior_color ? activeClass : mainClass ] "

                    >
                        <input 
                            type="radio"
                            v-model="data.exterior_color" 
                            :id="color.id" 
                            :value="color.exterior_color"
                            class="check-input"
                            >
                        <div>{{ color.exterior_color }}</div>
                    </label>
                </div>
            </div>
        </div>
    </div>
</template>
<style scoped>
.spinner-fw{
    widows: 25px;
    height: 25px;
}
.top-3 {
    top : 5px ;
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
import axios from 'axios';
import $ from "jquery";
    
    export default {
        props :  {
            data : {
                type : Object ,
                required : true ,
            } ,
            arrayData : {
                type : Array ,
                required : true ,
            } ,
        } ,
        data () {
            return {
                activeClass : [
                    'active-color'
                ],
                mainClass : [
                    'bg-main'
                ] ,
                maxCharacter : 7 ,
                maxMillage : 8 ,
                isValide : false ,
                isInValide : false ,
                loading : false ,
                showAlert : false ,
                showError : false ,
                plate_number : null ,
            }
        },
        watch : {
            
        } ,
        methods : {
            async checkValidae  () {
                this.loading = true ;
                this.showError = false ;
                this.data.license = null ;
                this.showAlert = false ;
                if(this.plate_number.length == 7 ){
                        $.ajax({
                        url : "/api/sarchQuery"  ,
                        type : "POST" , 
                        data : {
                            'searchQuery' : this.plate_number ,
                        },
                        success : (response) => {
                            this.loading = false ;
                            if(response.message) {
                                this.showError = true ;
                                this.showAlert = false ;
                            }else {
                                this.showAlert = true ;
                                this.data.license = this.plate_number ;
                            }
                        },
                        error : (error) => {
                            console.log(error);
                            }
                        });
                }
                if(this.plate_number.length == 0) {
                    this.loading = false ;
                }
                
            } ,
            toLocalString() {
                let value = this.data.millage.replace(/\D/g, '') ;
                value = Number(value).toLocaleString();
                if(value == 0) {
                    this.data.millage = '';
                }else {
                    this.data.millage = value ;
                }
            }
        },
        computed : {
            defaultGradeId () {
                if(this.arrayData['grades'].length > 0) {
                    return this.arrayData['grades'][0].id ;
                }
                return null ;
            },
            defaultTransmission() {
                if(this.arrayData['transmissionTypes'].length > 0 ){
                    return this.arrayData['transmissionTypes'][0].id ;
                }
                return null ;
            },
        },
        mounted () {
            this.data.grade = this.defaultGradeId ;
            this.data.transmission = this.defaultTransmission ;
            
        }
    }
</script> 