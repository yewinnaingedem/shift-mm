
<template>
    <div>
        <!-- Transmission -->
        <div class="mb-3 mt-3">
            <h3 class="mb-3 text-center fw-bold">Transmission </h3>
            <div class="row">
                <div class="col-md-4 mb-3" 
                    v-for="transmission in arrayData['transmissions']"
                    :key="transmission.id"
                >
                    <label 
                        :for="transmission.id" 
                        class="d-flex justify-content-center align-items-center text-white rounded-xsm  p-10" 
                        :class="[data.transmission == transmission.transmission ? activeClass : mainClass]"
                    >
                        <input type="radio" class="form-control check-input mr-5"
                            v-model="data.transmission" 
                            :value="transmission.transmission" 
                            :id="transmission.id"
                        >
                        <div>
                            {{ transmission.transmission + " Transmission" }}
                        </div>
                    </label>
                </div>
            </div>
        </div>
        <!-- divertrim -->
        <div class="mb-3">
            <h3 class="mb-3 text-center fw-bold">divertrim </h3>
            <div class="row">
                <div 
                    class="col-md-4 mb-3"
                    v-for="divertrim in arrayData['divertrimes']"
                    :key="divertrim.id"
                >
                    <label 
                        :for="divertrim.divertrim" 
                        class="d-flex justify-content-center align-items-center text-white rounded-xsm  p-10" 
                        :class="[data.divertrim == divertrim.divertrim ? activeClass : mainClass]"
                    >
                        <input type="radio" class="form-control check-input mr-5" 
                        v-model="data.divertrim" 
                        :value="divertrim.divertrim"
                        :id="divertrim.divertrim">
                        <div>
                            {{ divertrim.divertrim }}
                        </div>
                    </label>
                </div>
                
            </div>
        </div>
        <!-- Engine -->
        <div class="mb-3">
            <h3 class="mb-3 text-center fw-bold">Engine</h3>
            <div class="row">
                <div class="mb-3 col-md-4"
                    v-for="engine in arrayData['engines']"
                    :key="engine.id"
                >
                    <label 
                        :for="engine.engine_power" 
                        class="d-flex justify-content-around align-items-center  p-10 rounded-xsm bg-main"
                        :class="[data.engine == engine.engine_power ? activeClass : mainClass]" 
                    >
                        <input 
                            type="radio" 
                            class="form-check-input check-input mr-5" 
                            v-model="data.engine"
                            :value="engine.engine_power" 
                            :id="engine.engine_power">
                        <div>
                            {{ engine.engine_power }}
                        </div>
                    </label>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default ({
    props: {
        data: {
            required: true,
        },
        arrayData  : Array ,
    },
    computed :  {
        
    },
    data () {
        return {
            activeClass : [
                'active-color' ,
                'text-black',
            ],
            mainClass : [
                'bg-main' ,
                'text-white',
            ],
        }
    },
    methods : {
        
    },
    mounted () {
        console.log(this.arrayData['transmissions']);
    }
});
</script>

<style  scoped>
.rounded-xsm {
    border-radius: 4px;
}
.text-black {
    color: #fff;
}

.p-10 {
    padding: 10px;
}

.bg-main {
    background: #71747D;
}

.text-white {
    color: white;
}
.active-color {
    background : #06CBA3 ;
}

.check-input {
    appearance: none;
    display: none;
}</style>