import { createStore } from "vuex" ;
const centeraStore = createStore({
    state () {
        return {
            carCode : null ,
            progess : null ,
            nmvtis : false ,
            carId : null ,
            showRoom : false ,
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
                    if(response){
                        state.paintAndBody.state = true ;
                    }
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
                    if(response)
                    {
                        state.engineAdnSuspension.state = true ;
                    }
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
                    if(response){
                        state.tvAndWiring.state = true ;
                    }
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
                    if(response) {
                        state.additional.state = true ;
                    }
                },
                error : (error) => {
                    console.log(error);
                }
            });  
        },
        sendNmvtis ({state}) {
            $.ajax({
                url : "/api/stateChange" ,
                method : "POST" ,
                data : {
                    name : !state.nmvtis ,
                    carCode : state.carCode ,
                    content : "nmvtis"
                },
                success : (response) => {
                    if(response){
                        state.nmvtis = !state.nmvtis ;
                    }
                },
                error : (error) => {
                    console.log(error);
                }
            })
        },
        sendShowRoom ({state}){
            let name = !state.showRoom ;
            $.ajax({
                url : "/api/stateChange" ,
                method : "POST" ,
                data : {
                    name :  name,
                    carCode : state.carCode ,
                    content : "showRoom"
                },
                success : (response) => {
                    if(response) {
                        state.showRoom = name ;
                    }
                },
                error : (error) => {
                    console.log(error);
                }
            })
        } ,
        moveNext ({state}) {
            swal({
                    title: "Are you sure?",
                    text: "You will not be able to recover this imaginary file!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, Confirm !",
                    cancelButtonText: "No, cancel plx!",
                    closeOnConfirm: false,
                    closeOnCancel: false
              },
              function(isConfirm){
                    if (isConfirm) {
                        $.ajax({
                            url : "/api/moveNext" ,
                            method : "post" ,
                            data : {
                                engineAndSuspension : state.engineAdnSuspension.fixpoint ,
                                paintAndBody : state.paintAndBody.fixpoint ,
                                tvAndWiring : state.tvAndWiring.fixpoint ,
                                additional : state.additional.fixpoint ,
                                showRoom : state.showRoom ,
                                nmvtis : state.nmvtis ,
                                carId : state.carId ,
                            },
                            success : (response) => {
                                swal("Deleted!", "Your imaginary file has been deleted.", "success");
                                if (response.redirect) {
                                    window.location.href = response.redirect;
                                }
                            },
                            error : (error) => {
                                console.log(error);
                            }
                        })
                     
                    } else {
                    swal("Cancelled", "Your imaginary file is safe :)", "error");
                    }
              });
            
        }
    }
});

export default centeraStore ;