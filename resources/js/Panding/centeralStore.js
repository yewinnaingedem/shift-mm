import { createStore } from "vuex" ;
const centeraStore = createStore({
    state () {
        return {
            carCode : null ,
            progess : null ,
            defaultString : "-----------" ,
            paintAndBody : {
                fixpoint : null ,
                mechineName : null ,
                about : null ,
                description : 'paintAndBody' ,
                state : false ,
                success : false ,
            },
            engineAdnSuspension : {
                fixpoint : null ,
                mechineName : null ,
                about : null ,
                description : 'engineandsuspension' ,
                state : false , 
                success : false ,
            },
            tvAndWiring : {
                fixpoint : null ,
                mechineName : null ,
                about : null ,
                description : 'tvAndWiring' ,
                state : false ,
                success : false ,
            },
            additional : {
                fixpoint : null ,
                mechineName : null ,
                about : null ,
                description : 'additional' ,
                state : false ,
                success : false ,
            }
        }
    },
    actions : {
        sendBodyAndPaint ({state} , id) {
            $.ajax({
                url : "/api/demageReport/" +  id,
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
        },
        sendEngineAndSuspension ({state} , id) {
            $.ajax({
                url : "/api/demageReport/" +  id,
                method : "post" ,
                data : {
                    'fixpoint' : state.engineAdnSuspension.fixpoint ,
                    "mechines" : state.engineAdnSuspension.mechineName ,
                    'carCode' : state.carCode ,
                    'about' : state.engineAdnSuspension.description ,
                },
                success : (response) => {
                    console.log(response);
                },
                error : (error) => {
                    console.log(error);
                }
            });  
        },
        sendTvAndWiring ({state} , id) {
            $.ajax({
                url : "/api/demageReport/" +  id,
                method : "post" ,
                data : {
                    'fixpoint' : state.tvAndWiring.fixpoint ,
                    "mechines" : state.tvAndWiring.mechineName ,
                    'carCode' : state.carCode ,
                    'about' : state.tvAndWiring.description ,
                },
                success : (response) => {
                    console.log(response);
                },
                error : (error) => {
                    console.log(error);
                }
            });  
        },
        sendAdditional ({state} , id) {
            $.ajax({
                url : "/api/demageReport/" +  id,
                method : "post" ,
                data : {
                    'fixpoint' : state.additional.fixpoint ,
                    "mechines" : state.additional.mechineName ,
                    'carCode' : state.carCode ,
                    'about' : state.additional.description ,
                },
                success : (response) => {
                    console.log(response);
                },
                error : (error) => {
                    console.log(error);
                }
            });  
        },
    }
});

export default centeraStore ;