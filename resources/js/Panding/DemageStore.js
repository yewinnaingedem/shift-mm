import { createStore  } from "vuex" ;
import axios from "axios";
const demageStore = createStore ({
    state () {
        return {
            bodyAndPaint : null ,
            tv : null , 
            wiring : null ,
            suspension : null ,
            engine : null ,
            car_id : null ,
            lights : null ,
            exceptions : null ,
            fixer_id : null ,
            dot : "----------" ,
        }
    },
    getters : {

    },
    mutations : {
        
    },
    actions : {
        getBodyAndPaint ( {state} ) {
            axios.post('http://localhost:8000/api/paintDemage' , {
                'paintAndBody' : state.bodyAndPaint ,
                car_id : state.car_id ,
                fixer_id : state.fixer_id ,
                code_id : state.fixer_id + state.car_id + state.bodyAndPaint ,
            }).then(
                (response) => {
                    console.log(response);
                }
            ).catch(
                (error) => {
                    console.log(error);
                }
            ) ;
        }
    }
})

export default demageStore ;