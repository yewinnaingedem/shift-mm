<template>
    <div class="my-3">
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
        </div>
    </div>
</template>

<script>
    import Engine from './Engine.vue';
    import PaintDemage from './PaintDemage.vue';
    import TV from "./TV.vue" ;
    import suspension from './suspension.vue';
    import Lights from './Lights.vue';
    import Additonal from "./Additonal.vue";

    export default {
        name : "Panding" ,
        data () {
            return {
                paint : [] , 
                tvDemage : [] ,
                engineDemage : [] ,
                suspensions : [] ,
                ligthsDemage : [] ,
                additionals : [] ,
            }
        },
        components : {
            PaintDemage ,
            TV ,
            Engine ,
            suspension ,
            Lights ,
            Additonal
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
            }
        }
    }
</script>