<template>
    <div>
        <h3 class="fw-bolder">Basic Details </h3>
        <div class="row">
            <div class="col-md-6 ">
                <div class="mb-3">
                    <div class="d-flex flex-column justify-content-center align-items-start ">
                        <label for="zip" class="form-label">license Plate </label>
                        <input type="text" 
                            :maxLength = "maxCharacter"
                            v-model="data.license"
                            name="" id="zip" 
                            @input="checkValidae"
                            class="w-100 form-control mb-1 "
                            :class="{'is-valid' : isValide  , 'is-invalid' : isInValide}"
                            
                            placeholder="Enter License Plate Number">
                        <p v-show="data.zip" class="fs-8 text-danger capitalize">invaild zip code</p>
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
        <div class="mb-3">
            <label for="form-label mb-3">Grade </label>
            <select class="form-select" aria-label="Default select example">
                <option :value="grade.id" v-for="grade in arrayData['grades']"
                    :key="grade.id"
                >
                    {{ grade.grade }}
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


.mr-5 {
    margin-right: 5px;
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
            }
        },
        watch : {
            checkedInput : {
                handler (newValue) {
                    console.log(newValue);
                }
            }, 
        } ,
        methods : {
            checkValidae  () {
                if(this.data.license.length == this.maxCharacter) {
                    this.isValide = true ;
                    this.isInValide = false ;
                }else {
                    this.isValide = false ;
                    this.isInValide = true ;
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
    }
</script> 