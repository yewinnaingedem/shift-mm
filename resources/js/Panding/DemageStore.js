import { createStore  } from "vuex" ;
import axios from "axios";
const demageStore = createStore ({
    state () {
        return {
            car_id : null ,
            licensePlate : null ,
            dot : "----------" ,
            showAlert : false ,
            showText : null ,
            bodyAndPaint : {
                bodyAndPaintState : true ,
                bodyAndPaint : null ,
                fixer_id : null ,
                paitnLoading : false ,
                state : false ,
            } ,
            tv  : {
                tvDemageState : true ,
                tvDemage : null ,
                fixer_id : null ,
                paintLoading : false ,
                state : false ,
            } , 
            wiring : {
                wiringDemageState : true ,
                wiringDemage : null ,
                fixer_id : null ,
                paintLoading : false ,
                state : false ,
            } ,
            suspension : {
                suspensionDemageState : true ,
                suspensionDemage : null ,
                fixer_id : null ,
                paintLoading : false ,
                state : false ,
            } ,
            engine : {
                engineDemageState : true ,
                engineDemage : null ,
                fixer_id : null ,
                paintLoading : false ,
                state : false ,
            } ,
            lights : {
                lightDemageState : true ,
                lightDemage : null ,
                fixer_id : null ,
                paintLoading : false ,
                state : false ,
            } ,
            exceptions : {
                exceptionsDemageState : true ,
                exceptionsDemage : null ,
                fixer_id : null ,
                paintLoading : false ,
                state : false ,
            } ,
            
        }
    },
    getters : {

    },
    mutations : {
        
    },
    actions : {
        // for PaintAndBody 
        getBodyAndPaint ( {state} ) {
            let origin = state.bodyAndPaint.fixer_id + state.car_id + state.bodyAndPaint.bodyAndPaint + state.licensePlate;
            let code_id = origin.replace(/\s/g , '%') ;
            axios.post('http://localhost:8000/api/paintDemage' , {
                'paintAndBody' : state.bodyAndPaint.bodyAndPaint ,
                car_id : state.car_id ,
                fixer_id : state.bodyAndPaint.fixer_id ,
                code_id :  code_id,
            }).then(
                (response) => {
                    state.bodyAndPaint.paitnLoading = true ;
                    state.showAlert = true ;
                    state.showText = response.data.message ;
                    state.bodyAndPaint.bodyAndPaintState = true ;
                }
            ).catch(
                (error) => {
                    console.log(error);
                }
            ) ;
        },
        haveDoneBodyAndPaint({state}) {
            let origin = state.bodyAndPaint.fixer_id + state.car_id + state.bodyAndPaint.bodyAndPaint + state.licensePlate ;
            axios.put(`http://localhost:8000/api/paintDemage/${origin}` ).then((response) => {
                if(response.status == 200) {
                    state.bodyAndPaint.state = true ;
                }
            }).catch((error) => {
                console.log(error);
            });
        } ,
        // for TV 
        getTVDemage ( {state} ) {
            let origin = state.tv.fixer_id + state.car_id + state.tv.tvDemage  + state.licensePlate;
            let code_id = origin.replace(/\s/g , '%') ;
            axios.post('http://localhost:8000/api/tvDemage' , {
                'tvDemage' : state.tv.tvDemage ,
                car_id : state.car_id ,
                fixer_id : state.tv.fixer_id ,
                code_id :  code_id,
            }).then(
                (response) => {
                    state.tv.paintLoading = true ;
                    state.showAlert  = true ;
                    state.showText = response.data.message ;
                    state.tv.tvDemageState = true ;
                }
            ).catch(
                (error) => {
                    console.log(error);
                }
            ) ;
        },
        haveDoneTV({state}) {
            let origin = state.tv.fixer_id + state.car_id + state.tv.tvDemage + state.licensePlate ;
            axios.put(`http://localhost:8000/api/tvDemage/${origin}` ).then((response) => {
                if(response.status == 200) {
                    state.tv.state = true ;
                }
                console.log(response.status);
            }).catch((error) => {
                console.log(error);
            });
        } ,
        // for Engine 
        getEngineDemage ( {state} ) {
            let origin = state.engine.fixer_id + state.car_id + state.engine.engineDemage + state.licensePlate ;
            let code_id = origin.replace(/\s/g , '%') ;
            axios.post('http://localhost:8000/api/engineDemage' , {
                'engineDemage' : state.engine.engineDemage ,
                car_id : state.car_id ,
                fixer_id : state.engine.fixer_id ,
                code_id :  code_id,
            }).then(
                (response) => {
                    state.engine.paintLoading = true ;
                    state.showAlert = true ;
                    state.showText = response.data.message ;
                    state.engine.engineDemageState = true ;
                }
            ).catch(
                (error) => {
                    console.log(error);
                }
            ) ;
        },
        haveDoneEngine({state}) {
            let origin = state.engine.fixer_id + state.car_id + state.engine.engineDemage + state.licensePlate ;
            axios.put(`http://localhost:8000/api/engineDemage/${origin}` ).then((response) => {
                if(response.status == 200) {
                    state.engine.state = true ;
                    state.showAlert = true ;
                    state.showText = response.data.success ;
                }
            }).catch((error) => {
                console.log(error);
            });
        } ,
        // for Suspension
        getSuspensionDemage ( {state} ) {
            let origin = state.suspension.fixer_id + state.car_id + state.suspension.suspensionDemage + state.licensePlate ;
            let code_id = origin.replace(/\s/g , '%') ;
            axios.post('http://localhost:8000/api/suspensionDemage' , {
                'suspensionDemage' : state.suspension.suspensionDemage ,
                car_id : state.car_id ,
                fixer_id : state.engine.fixer_id ,
                code_id :  code_id,
            }).then(
                (response) => {
                    state.suspension.paintLoading = true ;
                    state.showAlert = true ;
                    state.showText = response.data.message ;
                    state.suspension.suspensionDemageState = true ;
                }
            ).catch(
                (error) => {
                    console.log(error);
                }
            ) ;
        },
        haveDoneSupension({state}) {
            let origin = state.suspension.fixer_id + state.car_id + state.suspension.suspensionDemage + state.licensePlate ;
            axios.put(`http://localhost:8000/api/suspensionDemage/${origin}` ).then((response) => {
                if(response.status == 200) {
                    state.suspension.state = true ;
                    state.showAlert = true ;
                    state.showText = response.data.success ;
                }
            }).catch((error) => {
                console.log(error);
            });
        } ,
        // for Light
        getLightDemage ({state}) {
            let origin = state.lights.fixer_id + state.car_id + state.lights.lightDemage  + state.licensePlate ;
            let code_id = origin.replace(/\s/g , '%') ;
            axios.post('http://localhost:8000/api/lightsDemage' , {
                'lightsDemage' : state.lights.lightDemage ,
                car_id : state.car_id ,
                fixer_id : state.engine.fixer_id ,
                code_id :  code_id,
            }).then(
                (response) => {
                    state.lights.paintLoading = true ;
                    state.showAlert = true ;
                    state.showText = response.data.message ;
                    state.lights.lightDemageState  = true ;
                }
            ).catch(
                (error) => {
                    console.log(error);
                }
            ) ;
        },
        haveDoneLight({state}) {
            let origin = state.lights.fixer_id + state.car_id + state.lights.lightDemage + state.licensePlate ;
            axios.put(`http://localhost:8000/api/lightsDemage/${origin}` ).then((response) => {
                if(response.status == 200) {
                    state.lights.state = true ;
                    state.showAlert = true ;
                    state.showText = response.data.success ;
                }
            }).catch((error) => {
                console.log(error);
            });
        } ,
        // for Additional Exceptions
        getAdditionalDemage ({state}) {
            let origin = state.exceptions.fixer_id + state.car_id + state.exceptions.exceptionsDemage  + state.licensePlate ;
            let code_id = origin.replace(/\s/g , '%') ;
            axios.post('http://localhost:8000/api/additionalDemage' , {
                'additionalDemage' : state.exceptions.exceptionsDemage ,
                car_id : state.car_id ,
                fixer_id : state.engine.fixer_id ,
                code_id :  code_id,
            }).then(
                (response) => {
                    state.exceptions.paintLoading = true ;
                    state.showAlert = true ;
                    state.showText = response.data.message ;
                    state.exceptions.exceptionsDemageState = true ;
                }
            ).catch(
                (error) => {
                    console.log(error);
                }
            ) ;
        },
        haveDoneAdditionalDemage({state}) {
            let origin = state.exceptions.fixer_id + state.car_id + state.exceptions.exceptionsDemage  + state.licensePlate ;
            axios.put(`http://localhost:8000/api/additionalDemage/${origin}` ).then((response) => {
                if(response.status == 200) {
                    state.exceptions.state = true ;
                    state.showAlert = true ;
                    state.showText = response.data.success ;
                }
            }).catch((error) => {
                console.log(error);
            });
        } ,
    }
});

export default demageStore ;