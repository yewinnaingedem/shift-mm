import { reactive } from "vue";

export const stepProgess  = reactive({
    step1 : {
        transmission : null ,
        body_style : null ,
        engine : {
            engine_power : null ,
            cylinder : null ,
            fuel_type : null ,
            turbo : false ,
        }
    },
});