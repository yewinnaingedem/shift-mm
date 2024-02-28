import { createStore } from "vuex" ;

const centeraStore = createStore({
    state () {
        return {
            paintAndBody : {
                mechineName : null ,
                about : null ,
            },
            engineAndSuspension : {
                mechineName : null ,
                about : null ,
            },
            wiringAndTV : {
                mechineName : null ,
                about : null ,
            },
            additional : {
                mechineName : null ,
                about : null ,
            }
        }
    }
});

export default centeraStore ;