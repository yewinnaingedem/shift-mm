import { createStore  } from "vuex" ;
import axios from "axios";
const demageStore = createStore ({
    state () {
        return {
            car_id : null ,
            dot : "----------" ,
            showAlert : false ,
            showText : null ,
            bodyAndPaint : {
                bodyAndPaintState : false ,
                bodyAndPaint : null ,
                fixer_id : null ,
                paitnLoading : false ,
                state : false ,
            } ,
            tv  : {
                tvDemageState : false ,
                tvDemage : null ,
                fixer_id : null ,
                paintLoading : false ,
                state : false ,
            } , 
            wiring : {
                wiringDemageState : false ,
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
                lightDemageState : false ,
                lightDemage : null ,
                fixer_id : null ,
                paintLoading : false ,
                state : false ,
            } ,
            exceptions : {
                exceptionsDemageState : false ,
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
            let origin = state.bodyAndPaint.fixer_id + state.car_id + state.bodyAndPaint.bodyAndPaint ;
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
                }
            ).catch(
                (error) => {
                    console.log(error);
                }
            ) ;
        },
        haveDoneBodyAndPaint({state}) {
            let origin = state.bodyAndPaint.fixer_id + state.car_id + state.bodyAndPaint.bodyAndPaint ;
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
            let origin = state.tv.fixer_id + state.car_id + state.tv.tvDemage ;
            let code_id = origin.replace(/\s/g , '%') ;
            axios.post('http://localhost:8000/api/tvDemage' , {
                'tvDemage' : state.tv.tvDemage ,
                car_id : state.car_id ,
                fixer_id : state.tv.fixer_id ,
                code_id :  code_id,
            }).then(
                (response) => {
                    state.tv.paintLoading = true ;
                }
            ).catch(
                (error) => {
                    console.log(error);
                }
            ) ;
        },
        haveDoneTV({state}) {
            let origin = state.tv.fixer_id + state.car_id + state.tv.tvDemage ;
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
            let origin = state.engine.fixer_id + state.car_id + state.engine.engineDemage ;
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
                }
            ).catch(
                (error) => {
                    console.log(error);
                }
            ) ;
        },
        haveDoneEngine({state}) {
            let origin = state.engine.fixer_id + state.car_id + state.engine.engineDemage ;
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
            let origin = state.suspension.fixer_id + state.car_id + state.suspension.suspensionDemage ;
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
                }
            ).catch(
                (error) => {
                    console.log(error);
                }
            ) ;
        },
        haveDoneSupension({state}) {
            let origin = state.suspension.fixer_id + state.car_id + state.suspension.suspensionDemage ;
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
            let origin = state.lights.fixer_id + state.car_id + state.lights.lightDemage ;
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
                }
            ).catch(
                (error) => {
                    console.log(error);
                }
            ) ;
        },
        haveDoneSupension({state}) {
            let origin = state.lights.fixer_id + state.car_id + state.lights.lightDemage ;
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
            let origin = state.exceptions.fixer_id + state.car_id + state.exceptions.exceptionsDemage ;
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
                }
            ).catch(
                (error) => {
                    console.log(error);
                }
            ) ;
        },
        haveDoneAdditionalDemage({state}) {
            let origin = state.exceptions.fixer_id + state.car_id + state.exceptions.exceptionsDemage ;
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
})

export default demageStore ;