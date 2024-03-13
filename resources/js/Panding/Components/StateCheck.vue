<template>
    <div class="mt-3 row px-2">
        <blockquote class="blockquote">
            <p>You said that you are gonna check it at Main Showroom And Registration Certificate .</p>
        </blockquote>
        <div class="col-md-4 text-start ">
            <button class="btn btn-primary" @click="showRoom">
                <span class="me-2">Check At ShowRoow</span>
                <span>
                    <i class="fa-solid fa-circle-check" v-if="centeraStore.state.showRoom" ></i>
                    <i class="fa-solid fa-circle-xmark" v-else ></i>
                </span>
            </button>
        </div>
        <div class="col-md-4 text-center">
            <button class="btn btn-info" @click="nmctis" >
                <div>
                    <span class="me-2">Check At NMVTIS</span>
                    <span>
                        <span>
                            <i class="fa-solid fa-circle-check" v-if="centeraStore.state.nmvtis" ></i>
                            <i class="fa-solid fa-circle-xmark" v-else ></i>
                        </span>
                    </span>
                </div>
            </button>
        </div>
        <div class="col-md-4 text-end">
            <button class="btn btn-danger"  @click="handleAllSuccess" :disabled="allSuccessValuesTrue">
                All have done <strong>?</strong> 
            </button>
        </div>
    </div>
</template>

<script>
    import centeraStore from '../centeralStore';
    export default {
        name : "StateCheck" ,
        setup () {
            return {
                centeraStore
            }
        },
        data () {
            return {
                allSuccessValuesTrue : true ,
            }
        },
        props : {
            state1 : {
                type : Number ,
                default : null ,
            },
            state2 : {
                type : Number ,
                default : null ,
            }
        },
        methods : {
            nmctis () {
                centeraStore.dispatch('sendNmvtis');
            },
            showRoom () {
                centeraStore.dispatch('sendShowRoom');
            },
            handleAllSuccess () {
                centeraStore.dispatch('moveNext');
            }
        },
        computed : {
            stateCheck1 () {
                if(this.state1) {
                    return centeraStore.state.showRoom = true ;
                }
            },
            stateCheck2 () {
                if(this.state2) {
                    return centeraStore.state.nmvtis = true ;
                }
            },
            checkAtall () {
                let intervalId = setInterval(() => {
                    let dataValue = {
                        value1: centeraStore.state.engineAdnSuspension.success,
                        value2: centeraStore.state.paintAndBody.success,
                        value3: centeraStore.state.tvAndWiring.success,
                        value4: centeraStore.state.additional.success,
                    };
                    let allSuccess = Object.values(dataValue).every(value => value === true);

                    if (allSuccess) {
                        
                        this.allSuccessValuesTrue = false ;
                    }
                }, 3000);
            }
        },
        mounted () {
            this.stateCheck1 ;
            this.stateCheck2 ;
            this.checkAtall ;
        }
    }
</script>