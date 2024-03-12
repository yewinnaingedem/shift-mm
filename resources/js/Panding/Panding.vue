<template>
    <div class="container my-3">
        <div class="container-header text-center">
            <figure class="text-center">
                <blockquote class="blockquote">
                    <p>This is panding State For Accent ( 2L / 4890 ).</p>
                </blockquote>
            </figure>
        </div>
        <div class="contaner-descripton tracking-wide row text-white fw-bold text-center mb-3 bg-secondary h-35px rounded align-items-center">
            <div class="col-md-3 ">
                <div >Fixing Point</div>
            </div>
            <div class="col-md-3">
                <div>Mechinses Name</div>
            </div>
            <div class="col-md-3">
                <div>Speciliaze </div>
            </div>
            <div class="col-md-3">
                <div>State</div>
            </div>
        </div>
        <!-- this is the paing and body  -->
        <PaintAndBody :fixers="this.panding.fixers" :paintAndBodies="this.paintAndBody"></PaintAndBody>
        <!-- this is for engineAnd Suspension -->
        <engineAndSuspenson :origin="this.panding.demage.engineAndSuspension"  :fixers="this.panding.fixers" :engineAndSuspensiones="this.engineAndSuspenson"></engineAndSuspenson>
        <!-- this is Tv and Wiring -->
        <tvAndWiring :origin="this.panding.demage.TvAndWiring"  :fixers="this.panding.fixers" :tvAndWiringes="this.tvAndWiring"></tvAndWiring>
        <div class="mb-3">
            <additonalDemage :origin="this.panding.demage.addition_exception"  :fixers="this.panding.fixers" :additionales="this.additional"></additonalDemage>
        </div>
        <StateCheck :state1="this.panding.demage.checkedAtShowroom" :state2="this.panding.demage.NMVTIS"></StateCheck>
    </div>    
</template>

<script>
    import PaintAndBody from "./Components/PaintAndBody.vue";
    import engineAndSuspenson from "./components/engineAndSuspension.vue";
    import tvAndWiring from "./components/tvAndWiring.vue";
    import additonalDemage from "./components/additonalDemage.vue";
    import StateCheck from "./components/StateCheck.vue";
    import centeraStore from "./centeralStore";
    export default {
        name : "PandingState" ,
        components : {
            PaintAndBody ,
            engineAndSuspenson ,
            tvAndWiring ,
            additonalDemage ,
            StateCheck
        },
        data  () {
            return  {
                progress : 50 ,
            }
        },
        props : {
            panding : {
                type : Object ,
                required : true ,
            }
        },
        computed : {
            paintAndBody () {
                if(this.panding.paintAndBody) {
                    return this.panding.paintAndBody ;
                }
                return null ;
            },
            engineAndSuspenson () {
                if(this.panding.engineandsuspension) {
                    return this.panding.engineandsuspension ;
                }
                return null ;
            },
            tvAndWiring () {
                if(this.panding.tvAndWiring) {
                    return this.panding.tvAndWiring ;
                }
                return null ;
            },
            additional () {
                if(this.panding.additional)
                {
                    return this.panding.additional ;
                }
                return null ;
            }, 
            carCode () {
                centeraStore.state.carCode = this.panding.demage.license_plate ;
            },
        },
        mounted () {
            this.carCode ;
        }
    }
</script>

<style>
    .tracking-wide {
        letter-spacing: 1px;
    }
    .footer-content {
        height: 2px;
        background-color: gray;
    }
    .w-75{
        width  : 75px ;
    }
    .w-half {
        width: 50%;
    }
    .h-30 {
        height : 40px ;
    }
    .container-description {
            cursor: pointer;
        }
    .container-description .col-md-3:hover {
        background-color: #ffc107 !important;
        transition: background-color 0.3s;
    }
    .container-description .col-md-3:hover div {
        color: #000;
    }
    .h-35px {
        height: 35px;
    }
    .skeleton {
        width: 100%;
        height: 40px;
        animation: skeleton-animation 1s linear infinite alternate ;
    }
    @keyframes skeleton-animation {
        0% {
            background-color : hsl(200, 20%, 70%);
        }
        25% {
            background-color : hsl(200, 20%, 70%);
        }
        50% {
            background-color : hsl(200, 20%, 80%);
        }
        75% {
            background-color : hsl(200 , 20 , 90%)
        }
        100% {
            background-color : hsl(200, 20%, 95%);
        }
    }
</style>./components/PaintAndBody.vue./components/Progess.vue./Components/engineAndSuspension.vue