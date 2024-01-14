import { createStore  } from "vuex" ;

const demageStore = createStore ({
    state () {
        return {
            bodyAndPaint : null ,
            tv : null , 
            wiring : null ,
            suspension : null ,
            engine : null ,
            lights : null ,
            exceptions : null ,
            dot : "----------" ,
        }
    },
    getters : {

    },
    mutations : {

    },
    actions : {

    }
})

export default demageStore ;