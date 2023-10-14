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
                            @input="validateInput"
                            name="" id="zip" 
                            class="w-100 form-control mb-1 "
                            :class="{'is-valid' : isValide }"
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
            <div>
                <input type="checkbox"
                v-model="data.trim" 
                id="trim_input" 
                value="none" class="form-checkbox mr-5">
                <label for="trim_input" class="form-label">
                    It doesn't have 
                </label>
            </div>
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
        <div class="mb-3">
            <h5 class="fw-bold cap-5"> Body Style</h5>
            <div class="mb-3">
                <div class="row">
                    <div 
                        v-for="bodyStyle in arrayData['body_styles']"
                        :key="bodyStyle.id"
                        class="mb-3 col-md-4"
                    >
                    <label
                        :for="bodyStyle.body_style"
                        class="justify-content-center d-flex align-items-center p-10 rounded-sm  text-white"
                        :class="[data.body_style == bodyStyle.body_style ? activeClass : mainClass ]"
                    >
                        <input type="radio" 
                            v-model="data.body_style" 
                            :value="bodyStyle.body_style" 
                            :id="bodyStyle.body_style"
                            class="check-input" >
                        <div>
                            {{ bodyStyle.body_style }}
                        </div>
                    </label>
                    </div>
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
                isValide : false ,
            }
        },
        computed : {
            checkedInput () {
                this.$data
            },
        },
        watch : {
            checkedInput : {
                handler (newValue) {
                    console.log(newValue);
                }
            }
        } ,
        methods : {
            validateInput () {
                if(this.data.license.length > this.maxLength ){
                    this.data.license = this.data.license.slice(0 , this.maxLength);
                    this.isValide = true  ;
                    console.log(this.isValide = true);
                }
            }
        }
    }
</script> 