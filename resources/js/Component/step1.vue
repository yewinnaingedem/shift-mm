<template>
    <div>
        <h3 class="fw-bolder">Basic Details </h3>
        <div class="row">
            <div class="col-md-6 ">
                <div class="mb-3">
                    <div class="d-flex flex-column justify-content-center align-items-start ">
                        <label for="zip" class="form-label">Zip</label>
                        <input type="text" 
                        v-model="formValue.zip"
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
            <select class="form-select">
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
        <div class="mb-3">
            <h5 class="fw-bold cap-5">Exterior color</h5>
            <div class=" row ">
                <div class="mb-3 col-md-3">
                    <input class="form-check-input mr-5" type="radio" name="color" id="black">
                    <label class="form-check-label" for="black">
                        Black
                    </label>
                </div>
                <div class="mb-3 col-md-3">
                    <input class="form-check-input mr-5" type="radio" name="color" id="white">
                    <label class="form-check-label" for="white">
                        White
                    </label>
                </div>
                <div class="mb-3 col-md-3">
                    <input class="form-check-input mr-5" type="radio" name="color" id="pearl_white">
                    <label class="form-check-label" for="pearl_white">
                        Pearl White
                    </label>
                </div>
                <div class="mb-3 col-md-3">
                    <input class="form-check-input mr-5" type="radio" name="color" id="gray">
                    <label class="form-check-label" for="gray">
                        Gray
                    </label>
                </div>
                <div class="mb-3 col-md-3">
                    <input class="form-check-input mr-5" type="radio" name="color" id="red">
                    <label class="form-check-label" for="red">
                        Red
                    </label>
                </div>
                <div class="mb-3 col-md-3">
                    <input class="form-check-input mr-5" type="radio" name="color" id="pearl_gold">
                    <label class="form-check-label" for="pearl_gold">
                        Pearl Gold
                    </label>
                </div>
                <div class="mb-3 col-md-3">
                    <input class="form-check-input mr-5" type="radio" name="color" id="vory">
                    <label class="form-check-label" for="vory">
                        Ivory White
                    </label>
                </div>
                <div class="mb-3 col-md-3">
                    <input class="form-check-input mr-5" type="radio" name="color" id="blue">
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
                        <input class="form-check-input mr-5" type="radio" name="body_styel" id="4_doors">
                        <label class="form-check-label" for="4_door">
                            4 Door SUV
                        </label>
                    </div>
                    <div class="col-md-3 mb-3">
                        <input class="form-check-input mr-5" type="radio" name="body_styel" id="sedan">
                        <label class="form-check-label" for="sedan">
                            Sedon
                        </label>
                    </div>
                    <div class="col-md-3 mb-3 ">
                        <input class="form-check-input mr-5" type="radio" name="body_styel" id="mvp">
                        <label class="form-check-label" for="mvp">
                            MVP
                        </label>
                    </div>
                    <div class="col-md-3 mb-3 ">
                        <input class="form-check-input mr-5" type="radio" name="body_styel" id="el_hy">
                        <label class="form-check-label" for="el_hy">
                            Electric / Hybird
                        </label>
                    </div>
                    <div class="col-md-3 mb-3 ">
                        <input class="form-check-input mr-5"  type="radio" name="body_styel"
                            id="hatchback">
                        <label class="form-check-label" for="hatchback">
                            Hatchback
                        </label>
                    </div>
                    <div class="col-md-3 mb-3 ">
                        <input class="form-check-input mr-5" type="radio" name="body_styel" id="crossover">
                        <label class="form-check-label" for="crossover">
                            Crossover
                        </label>
                    </div>
                    <div class="col-md-3 mb-3 ">
                        <input class="form-check-input mr-5" type="radio" name="body_styel" id="coupe">
                        <label class="form-check-label" for="coupe">
                            Coupe
                        </label>
                    </div>
                    <div class="col-md-3 mb-3 ">
                        <input class="form-check-input mr-5" type="radio" name="body_styel" id="convertible">
                        <label class="form-check-label" for="convertible">
                            Convertible
                        </label>
                    </div>

                    <div class="col-md-3 mb-3 ">
                        <input class="form-check-input mr-5" type="radio" name="body_styel" id="minivan">
                        <label class="form-check-label" for="minivan">
                            Minivan
                        </label>
                    </div>
                    <div class="col-md-3 mb-3">
                        <input class="form-check-input mr-5" type="radio" name="body_styel" id="pickup">
                        <label class="form-check-label" for="pickup">
                            Pickup Truck
                        </label>
                    </div>
                    <div class="col-md-3 mb-3 ">
                        <input class="form-check-input mr-5" type="radio" name="body_styel" id="wagon">
                        <label class="form-check-label" for="wagon">
                            Wagon
                        </label>
                    </div>

                    <div class="col-md-3 mb-3">
                        <input class="form-check-input mr-5" type="radio" name="body_styel" id="luxury">
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

<script setup>
    
</script> 