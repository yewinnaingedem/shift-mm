<template>
    <div class="row w-100 m-0">
        <div class="col-md-4 position-sticky top-0 bottom-0 main-color w-full vh-100">
            <div class="header   ">
                <div class="d-flex justify-content-center w-full  align-items-start ">
                    <h1 class="mt-3">Shift MM </h1>
                </div>
            </div>
            <div class="d-flex justify-content-center flex-column  align-items-start pl-25 h-75">
                <div class="d-flex w-full justify-content-center  fw-semibold  font-weight-normal">
                    <span class="mr-3">1</span>
                    <div>
                        <p>Basic Details </p>
                    </div>
                </div>
                <div class="d-flex w-full justify-content-center fw-semibold  font-weight-normal">
                    <span class="mr-3">2</span>
                    <div>
                        <p>Additional Fecuture </p>
                    </div>
                </div>
                <div class="d-flex w-full justify-content-center fw-semibold  font-weight-normal">
                    <span class="mr-3">3</span>
                    <div>
                        <p>Vehicle History </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="position-sticky   z-100 bg-white w-100">
                <div class="header  d-flex justify-content-between border-bottom p-3">
                    <div class="d-flex justify-content-center align-items-center font-normal">
                        <div class="mr-2">
                            2016
                        </div>
                        <div class="fw-bold mr-2 capitalize">
                            Suzuki
                        </div>
                        <div class="fw-normal capitalize">
                            ciaz
                        </div>
                    </div>
                    <div class="color-primary">
                        <a href="/admin/add-cars" class="text-decoration-none">Exit</a>
                    </div>
                </div>
            </div>
            <div class="main w-75 m-auto pt-20">
                <component v-bind:is="steps[currentStep]" :data="field[0]"></component>
            </div>
        </div>
    </div>
</template>

<style>
    .m-0 {
        margin: 0 !important;
    }
</style>

<script >
    import step1 from '../step1.vue';
    import step2 from '../step2.vue';
    export default {
        data () {
            return {
                steps : [
                    step1 ,
                    step2 
                ],
                currentStep : 0 ,
                field : [
                    {
                        zip : null ,
                        millage : null ,
                        select : null ,
                        radio: null ,
                    } ,
                ]
            }
        },
        components : {
            step1 ,
            step2 
        },
    }
    
</script>