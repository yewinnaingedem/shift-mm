import {  reactive } from "vue" ;

export const fields = reactive({
    step1 : {
        license : null ,
        millage : null ,
        preDefindedColor :  false ,
        ownColor : 'none' ,
        grade : this.data['grades'][0].grade,
        exterior_color: null ,
        transmission : null ,
    },
    step2 : {
        license_state : null ,
        steering : null ,
        warranty  : null ,
        pass_owner : null ,
        madeIn : null ,
        num_seat : null ,
        font_break : null ,
        back_break : null ,
    } ,
    step3 : {
        interior_color : null ,
        VIN : null ,
        engine_exception : 'none' ,
        license_exception : 'none',
        exception : 'none' ,
    }
});