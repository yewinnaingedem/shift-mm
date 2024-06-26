import { reactive } from "vue";

export const stepProgess  = reactive({
    storage : null ,
    step1 : {
        transmission : null ,
        body_style : null ,
        brand : null ,
        grade : null ,
        model_name : null ,
        engineSetup : null ,
        engine : {
            cylinder : null ,
            fuel_type : null ,
            turbo : false ,
            engine_power : null 
        }
    },
    step2 : {
        divertrim : null ,
        key: null ,
        sun_roof : null ,
        motor : null ,
        aircon : null  ,
        seat : null ,
        sonor  :null ,
        camera : null ,
    },
    step3 : {
        functions : [],
        default_functions : [] ,
        advance : {
            exist : false ,
            air_conditioning : null ,
            power_steering : null ,
            power_windows : null ,
            abs_brakes : null ,
            airbags : null ,
            navigation_system : null ,
            bluetooth_connectivity : null ,
        } ,
    }
});