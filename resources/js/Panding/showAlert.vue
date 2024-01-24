<template>
    <div class="row my-3">
        <div class="col-md-6">
            <button class="btn btn-danger" @click="backRoute">
                Back
            </button>
        </div>
        <div class="col-md-6 text-end" v-if="testing" >
            <button class="btn btn-primary" type="button" v-if="showLoading" >
                Loading...
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            </button>
            <button class="btn btn-primary" v-else @click="submit">
                Submit
            </button>
        </div>
    </div>
</template>

<script>
    import { ref, watch } from 'vue';
    import axios from "axios" ;
    import demageStore from './DemageStore';
    export default {

        setup() {
            const allStatesAreTrue = ref(false);
            const testing  = ref(false) ;
            const showLoading  = ref(false);
            watch(
                () => ({
                    paintAndBody: demageStore.state.bodyAndPaint.bodyAndPaintState,
                    engine: demageStore.state.engine.engineDemageState,
                    light: demageStore.state.lights.lightDemageState,
                    suspension: demageStore.state.suspension.suspensionDemageState,
                    tv: demageStore.state.tv.tvDemageState,
                    exceptions: demageStore.state.exceptions.exceptionsDemageState,
                }),
                (newVal) => {
                    allStatesAreTrue.value = Object.values(newVal).every((value) => value === false);
                    if (allStatesAreTrue.value) {
                        testing.value = true ;
                    } else {
                        testing.value = false ;
                    }
                },
                { deep: true }
            );
            const backRoute = () => {
                window.location.href = "http://localhost:8000/admin/panding_state" ;
            };
            const submit = () => {
                showLoading.value = true ;
                axios.get('http://localhost:8000/api/moveToNextStep/'+ demageStore.state.car_id)
                .then((response) => {
                    showLoading.value = false ;
                    swal({
                            title: "Are you sure?",
                            text: "You will not be able to recover this imaginary file!",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#DD6B55",
                            confirmButtonText: "Yes, Move To Next Step",
                            cancelButtonText: "No, cancel plx!",
                            closeOnConfirm: false,
                            closeOnCancel: false
                        },
                        function(isConfirm){
                            if (isConfirm) {
                                window.location.href = response.data.redirectRoute ;
                            } else {
                                swal("Cancelled", "Your imaginary file is safe :)", "error");
                            }
                    });
                }).catch((error) => {
                    demageStore.state.showAlert = true ;
                    demageStore.state.showText = error.response.data.message ;
                })
            }
            return {
                testing ,
                showLoading ,
                submit ,
                backRoute ,
            }
        },
    }
</script>