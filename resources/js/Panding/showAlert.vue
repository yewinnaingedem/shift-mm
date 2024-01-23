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