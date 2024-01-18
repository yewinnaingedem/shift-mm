import { createStore  } from "vuex" ;
import axios from "axios";
const demageStore = createStore ({
    state () {
        return {
            car_id : null ,
            dot : "----------" ,
            showAlert : false ,
            showText : "This is Testing" ,
            bodyAndPaint : {
                bodyAndPaint : null ,
                fixer_id : null ,
                paitnLoading : false ,
                state : false ,
            } ,
            tv  : {
                tvDemage : null ,
                fixer_id : null ,
                paintLoading : false ,
                state : false ,
            } , 
            wiring : {
                wiringDemage : null ,
                fixer_id : null ,
                paintLoading : false ,
                state : false ,
            } ,
            suspension : {
                suspensionDemage : null ,
                fixer_id : null ,
                paintLoading : false ,
                state : false ,
            } ,
            engine : {
                engineDemage : null ,
                fixer_id : null ,
                paintLoading : false ,
                state : false ,
            } ,
            lights : {
                lightDemage : null ,
                fixer_id : null ,
                paintLoading : false ,
                state : false ,
            } ,
            exceptions : {
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
    }
})

export default demageStore ;