<template>
    <div class="my-3 position-relative overflow-hidden">
        <figure class="text-center">
            <blockquote class="blockquote">
                <p>A well-known quote, contained in a blockquote element.</p>
            </blockquote>
            <figcaption class="blockquote-footer">
                Someone famous in <cite title="Source Title">Source Title</cite>
            </figcaption>
        </figure>
        <div class="container mt-3">
            <!-- This is for Paint Deamage -->
            <PaintDemage :paint="panding.demage.paint_demage" :fixers="paint" ></PaintDemage>
            <!-- This is for TV  -->
            <TV :tvDemage="panding.demage.tv" :fixers="tvDemage"></TV>
            <!-- This is for Engine -->
            <Engine :fixers="engineDemage" :engineDemage="panding.demage.engine_malfunction"></Engine>
            <!-- This is for supsension  -->
            <suspension :supsensionDemage="panding.demage.suspection" :fixers="suspensions"></suspension>
            <!-- This is for Lights -->
            <Lights :fixers="ligthsDemage" :lightDemage="panding.demage.lights"></Lights>
            <!-- This is for additional Exceptions -->
            <Additonal :additionalDemage="panding.demage.addition_exception" :fixers="additionals"></Additonal>
            <showAlert></showAlert>
        </div>
        <div class="alert-container" v-if="demageStore.state.showAlert">
            <div class="alert alert-show " id="myAlert">
                {{ demageStore.state.showText }}
            </div>
        </div>
    </div>
</template>

<style>
    .alert-container {
        position: absolute;
        top: 0;
        right: 0;
        overflow: hidden;
    }

    .alert {
        background-color: #dc3545; /* Set your desired background color */
        color: #fff; /* Set your desired text color */
        padding: 10px 20px;
        margin: 10px;
        border-radius: 10px 0px 0px 10px;
        opacity: 0;
        animation: slideIn 0.5s forwards;
    }

    
    @keyframes slideIn {
        0% {
            transform: translateX(100%);
            opacity: 0;
        }
        100% {
            transform: translateX(0);
            opacity: 1;
        }
    }
</style>

<script>
    import Engine from './Engine.vue';
    import PaintDemage from './PaintDemage.vue';
    import TV from "./TV.vue" ;
    import suspension from './suspension.vue';
    import Lights from './Lights.vue';
    import Additonal from "./Additonal.vue";
    import demageStore from './DemageStore';
    import showAlert from './showAlert.vue';

    export default {
        setup () {
            return {
                demageStore ,
            }
        },  
        name : "Panding" ,
        data () {
            return {
                paint : [] , 
                
                state : false ,
                tvDemage : [] ,
                engineDemage : [] ,
                suspensions : [] ,
                ligthsDemage : [] ,
                additionals : [] ,
                showAlert : false ,
            }
        },
        components : {
            PaintDemage ,
            TV ,
            Engine ,
            suspension ,
            Lights ,
            Additonal ,
            showAlert
        },
        props : {
            panding : {
                type : Object ,
                required : true ,
            },
        },
        mounted () {
            this.bodyAndDemage ;
            this.tv ;
            this.engine ;
            this.suspension ;
            this.light ;
            this.additional ;
            this.carId ;
            setInterval(() => {
                demageStore.state.showAlert = false ; 
            }, 60000);
            this.licenseSet ;
        },
        computed : {
            bodyAndDemage () {
                this.panding.fixers.forEach(element => {
                    if(element.specialize == this.panding.sepcializes[1].id) {
                        this.paint.push(element);
                    }
                });
            },
            tv () {
                this.panding.fixers.forEach(tv => {
                    if(tv.specialize == this.panding.sepcializes[0].id){
                        this.tvDemage.push(tv)
                    }
                });
            },
            engine () {
                this.panding.fixers.forEach(engine => {
                    if(engine.specialize == 3) {
                        this.engineDemage.push(engine);
                    }
                });
            },
            suspension () {
                this.panding.fixers.forEach(suspension => {
                    if(suspension.specialize == 4) {
                        this.suspensions.push(suspension);
                    }
                });
            },
            light () {
                this.panding.fixers.forEach(light   => {
                    if(light.specialize == 6) {
                        this.ligthsDemage.push(light);
                    } 
                });
            },
            additional () {
                this.panding.fixers.forEach(additonal => {
                    this.additionals.push(additonal);
                });
            },
            carId () {
                this.demageStore.state.car_id = this.panding.car_id ;
            },
            licenseSet () {
                demageStore.state.licensePlate  = this.panding.demage.license_plate ;
            },
            checkValue () {
                console.log(this.states);
                const allTrue = Object.values(this.states).every((value) => value == true) ;
                return allTrue ;
            }
        },
        watch : {
            states  : {
                handler (newValue , oldValue ) {
                    console.log(newValue , oldValue);
                },
                deep  :true ,
            }
        }
    }
</script>