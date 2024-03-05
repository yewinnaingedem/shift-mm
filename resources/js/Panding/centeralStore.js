import { createStore } from "vuex" ;
const centeraStore = createStore({
    state () {
        return {
            carCode : null ,
            paintAndBody : {
                fixpoint : null ,
                mechineName : null ,
                about : null ,
                description : 'paintAndBody' ,
            },
        }
    },
    actions : {
        sendFormData ({state}) {
            var originalString = state.paintAndBody.mechineName ;
            $.ajax({
                url : "/api/demageReport/" +  originalString,
                method : "post" ,
                data : {
                    'fixpoint' : state.paintAndBody.fixpoint ,
                    "mechines" : state.mechineName ,
                    'carCode' : state.carCode ,
                    'about' : state.paintAndBody.description ,
                },
                success : (response) => {
                    console.log(response);
                },
                error : (error) => {
                    console.log(error);
                }
            });  
        }
    }
});

export default centeraStore ;