<template>
    <div>
        <h3 class="fw-bolder">Basic Details </h3>
        <div class="row">
            <div class="col-md-6 ">
                <div class="mb-3">
                    <div class="d-flex flex-column justify-content-center align-items-start ">
                        <label for="zip" class="form-label">Zip</label>
                        <input type="number" 
                            maxlength="10"
                            v-model="data.zip"
                            focus=true
                            name="" id="zip" class="w-100 form-control mb-1"
                            placeholder="Enter Zip">
                        <p class="fs-8 text-danger">invaild zip code</p>
                    </div>
                </div>
            </div>
            <div class="mb-3 col-md-6">
                <div class="d-flex flex-column justify-content-center align-items-start ">
                    <label for="millage" class="form-label">Millage</label>
                    <input type="text"  name="" id="millage" class="w-100 form-control mb-1"
                        v-model="data.millage"
                        placeholder="Enter Millage">
                    <p class="fs-8 text-danger">invaild Millage</p>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <div class="d-flex justify-content-between align-items-center mb-2 ">
                <h5 class="fw-bold">Trim</h5>
                <i class="fa-solid fa-question"></i>
            </div>
            <select class="form-select" v-model="data.trim">
                <option value="one">One</option>
                <option value="two">Two</option>
                <option value="three">Three</option>
            </select>
        </div>
        <div class="mb-3">
            <h5 class="fw-bold cap-5">Exterior color</h5>
            <div class=" row ">
                <div class="mb-3 col-md-3">
                    <input class="form-check-input mr-5" type="radio" v-model="data.exterior_color" name="color" value="black" id="black">
                    <label class="form-check-label" for="black">
                        Black
                    </label>
                </div>
                <div class="mb-3 col-md-3">
                    <input class="form-check-input mr-5" type="radio" v-model="data.exterior_color" name="color" value="white" id="white">
                    <label class="form-check-label" for="white">
                        White
                    </label>
                </div>
                <div class="mb-3 col-md-3">
                    <input class="form-check-input mr-5" type="radio" v-model="data.exterior_color" value="pearl_white" name="color" id="pearl_white">
                    <label class="form-check-label" for="pearl_white">
                        Pearl White
                    </label>
                </div>
                <div class="mb-3 col-md-3">
                    <input class="form-check-input mr-5" type="radio" v-model="data.radio" name="color" value="gray" id="gray">
                    <label class="form-check-label" for="gray">
                        Gray
                    </label>
                </div>
                <div class="mb-3 col-md-3">
                    <input class="form-check-input mr-5" type="radio" v-model="data.radio" value="red" name="color" id="red">
                    <label class="form-check-label" for="red">
                        Red
                    </label>
                </div>
                <div class="mb-3 col-md-3">
                    <input class="form-check-input mr-5" type="radio" v-model='data.exterior_color' value="pearl_gold" name="color" id="pearl_gold">
                    <label class="form-check-label" for="pearl_gold">
                        Pearl Gold
                    </label>
                </div>
                <div class="mb-3 col-md-3">
                    <input class="form-check-input mr-5" type="radio" name="color" v-model="data.exterior_color" value="ivory" id="vory">
                    <label class="form-check-label" for="vory">
                        Ivory White
                    </label>
                </div>
                <div class="mb-3 col-md-3">
                    <input class="form-check-input mr-5" type="radio" name="color" value="blue" v-model="data.exterior_color" id="blue">
                    <label class="form-check-label" for="blue">
                        Blue
                    </label>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <h5 class="fw-bold cap-5"> Body Style</h5>
            <div class="mb-3">
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <input class="form-check-input mr-5" type="radio" v-model="data.bodyType" value="4_doors_suv"  id="4_door">
                        <label class="form-check-label" for="4_door">
                            4 Door SUV
                        </label>
                    </div>
                    <div class="col-md-3 mb-3">
                        <input class="form-check-input mr-5" type="radio" v-model='data.bodyType' value="sedon"  id="sedan">
                        <label class="form-check-label" for="sedan">
                            Sedon
                        </label>
                    </div>
                    <div class="col-md-3 mb-3 ">
                        <input class="form-check-input mr-5" type="radio" v-model="data.bodyType" value="mvp"  id="mvp">
                        <label class="form-check-label" for="mvp">
                            MVP
                        </label>
                    </div>
                    <div class="col-md-3 mb-3 ">
                        <input class="form-check-input mr-5" type="radio" v-model="data.bodyType" value="el_hy"  id="el_hy">
                        <label class="form-check-label" for="el_hy">
                            Electric / Hybird
                        </label>
                    </div>
                    <div class="col-md-3 mb-3 ">
                        <input class="form-check-input mr-5" v-model="data.bodyType" value="hatchback" type="radio" 
                            id="hatchback">
                        <label class="form-check-label" for="hatchback">
                            Hatchback
                        </label>
                    </div>
                    <div class="col-md-3 mb-3 ">
                        <input class="form-check-input mr-5" type="radio" v-model="data.bodyType" value="crossover"  id="crossover">
                        <label class="form-check-label" for="crossover">
                            Crossover
                        </label>
                    </div>
                    <div class="col-md-3 mb-3 ">
                        <input class="form-check-input mr-5" type="radio" v-model="data.bodyType" value="coupe"  id="coupe">
                        <label class="form-check-label" for="coupe">
                            Coupe
                        </label>
                    </div>
                    <div class="col-md-3 mb-3 ">
                        <input class="form-check-input mr-5" type="radio" v-model="data.bodyType" value="convertible"  id="convertible">
                        <label class="form-check-label" for="convertible">
                            Convertible
                        </label>
                    </div>

                    <div class="col-md-3 mb-3 ">
                        <input class="form-check-input mr-5" type="radio"  id="minivan">
                        <label class="form-check-label" for="minivan">
                            Minivan
                        </label>
                    </div>
                    <div class="col-md-3 mb-3">
                        <input class="form-check-input mr-5" type="radio" v-model="data.bodyType" id="pickup">
                        <label class="form-check-label" for="pickup">
                            Pickup Truck
                        </label>
                    </div>
                    <div class="col-md-3 mb-3 ">
                        <input class="form-check-input mr-5" type="radio" v-model='data.bodyType'  value="wagon" id="wagon">
                        <label class="form-check-label" for="wagon">
                            Wagon
                        </label>
                    </div>

                    <div class="col-md-3 mb-3">
                        <input class="form-check-input mr-5" type="radio"  v-model="data.bodyType" value="luxury" id="luxury">
                        <label class="form-check-label" for="luxury">
                            Luxury Cars
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<style>
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
</style>
    
<script >
    
    export default {
        props : ['data'] , watch : {
            data() {
                console.log(data);
            }
        }
        
    }


</script> 