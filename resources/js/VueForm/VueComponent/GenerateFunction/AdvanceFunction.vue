<template>
    <div class="mb-3" >
        <p class="fw-bold ques "> Does Air Conditioning have as a default ?</p>
        <div class="ml-3">
            <label for="ac_yes" class="rounded yes-no ml-3"> 
                <input type="radio" class="d-none" v-model="stepFun.air_conditioning" :value="1" id="ac_yes">
                <div class="fw-bold">
                    Yes 
                </div>
            </label>
            <label for="ac_no" class="rounded yes-no"> 
                <input type="radio" class="d-none" v-model="stepFun.air_conditioning" :value="0"   id="ac_no">
                <div class="fw-bold">
                    No
                </div>
            </label>
        </div>
        <hr>
    </div>
    <div class="mb-3" >
        <p class="fw-bold ques "> Does Power Steering have as a default ?</p>
        <div class="ml-3">
            <label for="ps_yes" class="rounded yes-no ml-3" :class="(stepFun.power_steering == 1) ? 'main-color' : 'bg-dark' "> 
                <input type="radio" class="d-none"  v-model="stepFun.power_steering" :value="1" id="ps_yes">
                <div class="fw-bold">
                    Yes 
                </div>
            </label>
            <label for="ps_no" class="rounded yes-no" :class="(stepFun.power_steering == 1) ? 'main-color' : 'bg-dark' "> 
                <input type="radio" class="d-none" v-model="stepFun.power_steering" :value="0"   id="ps_no">
                <div class="fw-bold">
                    No
                </div>
            </label>
        </div>
        <hr>
    </div>
    <div class="mb-3" >
        <p class="fw-bold ques "> Does Power Window have as a default ?</p>
        <div class="ml-3">
            <label for="pw_yes" class="rounded yes-no ml-3"> 
                <input type="radio" class="d-none" v-model="stepFun.power_windows" :value="1" id="pw_yes">
                <div class="fw-bold">
                    Yes 
                </div>
            </label>
            <label for="pw_no" class="rounded yes-no"> 
                <input type="radio" class="d-none" v-model="stepFun.power_windows" :value="0"   id="pw_no">
                <div class="fw-bold">
                    No
                </div>
            </label>
        </div>
        <hr>
    </div>
    <div class="mb-3" >
        <p class="fw-bold ques "> Does ABS Breaks have as a default ?</p>
        <div class="ml-3">
            <label for="abs_br" class="rounded yes-no ml-3"> 
                <input type="radio" class="d-none" v-model="stepFun.abs_brakes" :value="1" id="abs_br">
                <div class="fw-bold">
                    Yes 
                </div>
            </label>
            <label for="abs_br_no" class="rounded yes-no"> 
                <input type="radio" class="d-none" v-model="stepFun.abs_brakes" :value="0"   id="abs_br_no">
                <div class="fw-bold">
                    No
                </div>
            </label>
        </div>
        <hr>
    </div>
    <div class="mb-3" >
        <p class="fw-bold ques "> Does Air Bags have as a default ?</p>
        <div class="ml-3">
            <label for="air_b" class="rounded yes-no ml-3"> 
                <input type="radio" class="d-none" v-model="stepFun.airbags" :value="1" id="air_b">
                <div class="fw-bold">
                    Yes 
                </div>
            </label>
            <label for="air_no" class="rounded yes-no"> 
                <input type="radio" class="d-none" v-model="stepFun.airbags" :value="0"   id="air_no">
                <div class="fw-bold">
                    No
                </div>
            </label>
        </div>
        <hr>
    </div>
    <div class="mb-3" >
        <p class="fw-bold ques "> Does Navigation Style have as a default ?</p>
        <div class="ml-3">
            <label for="navI_yes" class="rounded yes-no ml-3"> 
                <input type="radio" class="d-none" v-model="stepFun.navigation_system" :value="1" id="navI_yes">
                <div class="fw-bold">
                    Yes 
                </div>
            </label>
            <label for="navI_no" class="rounded yes-no"> 
                <input type="radio" class="d-none" v-model="stepFun.navigation_system" :value="0"   id="navI_no">
                <div class="fw-bold">
                    No
                </div>
            </label>
        </div>
        <hr>
    </div>
    <div class="mb-3" >
        <p class="fw-bold ques "> Does BlueTooth Connectivity have as a default ?</p>
        <div class="ml-3">
            <label for="bl_yes" class="rounded yes-no ml-3"> 
                <input type="radio" class="d-none" v-model="stepFun.bluetooth_connectivity" :value="1" id="bl_yes">
                <div class="fw-bold">
                    Yes 
                </div>
            </label>
            <label for="bl_no" class="rounded yes-no"> 
                <input type="radio" class="d-none" v-model="stepFun.bluetooth_connectivity" :value="0"   id="bl_no">
                <div class="fw-bold">
                    No
                </div>
            </label>
        </div>
        <hr>
    </div>

</template>

<script>
    export default {
        name : "AdvanceFucntion" ,
        props : {
            stepFun : {
                type : Object ,
                required : true ,
            },
            defaultFun : {
                type : Object ,
                required : true ,
            }
        },
    }
</script>

<style>
    .yes-no {
        padding : 4px 16px;
        border : 1px solid gray ;
        background : #18222e ;
        outline : none ;
        color : white ;
        font-size : 18px ;
    }
    .bg-main {
        background :  #06CBA3;
    }
    .ques {
        font-size : 15px ;
    }
    .ml-3 {
        margin-right : 8px ;
    }
</style>