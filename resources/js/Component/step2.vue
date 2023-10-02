
<template>
    <div>
        <!-- Transmission -->
        <div class="mb-3 mt-3">
            <h3 class="mb-3 text-center fw-bold">Transmission </h3>
            <div class="row">
                <div class="col-md-4 mb-3" >
                    <label for="4_speeds" class="d-flex justify-content-center align-items-center text-white rounded-xsm  p-10" 
                        :class="[data.transmission == '4_speeds' ? activeClass : mainClass]"
                    >
                        <input type="radio" class="form-control check-input mr-5" v-model="data.transmission" value="4_speeds" id="4_speeds">
                        <div>
                            4 Speeds Transmission
                        </div>
                    </label>
                </div>
                <div class="col-md-4 mb-3" >
                    <label for="5_speeds" class="d-flex justify-content-center align-items-center text-white rounded-xsm  p-10" 
                        :class="[data.transmission == '5_speeds' ? activeClass : mainClass]"
                    >
                        <input type="radio" class="form-control check-input mr-5" v-model="data.transmission" value="5_speeds" id="5_speeds">
                        <div>
                            5 Speeds Transmission
                        </div>
                    </label>
                </div>
                <div class="col-md-4 mb-3" >
                    <label for="6_speeds" class="d-flex justify-content-center align-items-center text-white rounded-xsm  p-10" 
                        :class="[data.transmission == '6_speeds' ? activeClass : mainClass]"
                    >
                        <input type="radio" class="form-control check-input mr-5" v-model="data.transmission" value="6_speeds" id="6_speeds">
                        <div>
                            6 Speeds Transmission
                        </div>
                    </label>
                </div>
                <div class="col-md-4 mb-3" >
                    <label for="7_speeds" class="d-flex justify-content-center align-items-center text-white rounded-xsm  p-10" 
                        :class="[data.transmission == '7_speeds' ? activeClass : mainClass]"
                    >
                        <input type="radio" class="form-control check-input mr-5" v-model="data.transmission" value="7_speeds" id="7_speeds">
                        <div>
                            7 Speeds Transmission
                        </div>
                    </label>
                </div>
                <div class="col-md-4 mb-3" >
                    <label for="8_speeds" class="d-flex justify-content-center align-items-center text-white rounded-xsm  p-10" 
                        :class="[data.transmission == '8_speeds' ? activeClass : mainClass]"
                    >
                        <input type="radio" class="form-control check-input mr-5" v-model="data.transmission" value="8_speeds" id="8_speeds">
                        <div>
                            8 Speeds Transmission
                        </div>
                    </label>
                </div>
                <div class="col-md-4 mb-3" >
                    <label for="10_speeds" class="d-flex justify-content-center align-items-center text-white rounded-xsm  p-10" 
                        :class="[data.transmission == '10_speeds' ? activeClass : mainClass]"
                    >
                        <input type="radio" class="form-control check-input mr-5" v-model="data.transmission" value="10_speeds" id="10_speeds">
                        <div>
                            10 Speeds Transmission
                        </div>
                    </label>
                </div>
            </div>
        </div>
        <!-- divertrim -->
        <div class="mb-3">
            <h3 class="mb-3 text-center fw-bold">divertrim </h3>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="all_wheels" class="d-flex justify-content-center align-items-center text-white rounded-xsm  p-10" 
                        :class="[data.divertrim == 'all_wheels' ? activeClass : mainClass]"
                    >
                        <input type="radio" class="form-control check-input mr-5" v-model="data.divertrim" value="all_wheels" id="all_wheels">
                        <div>
                            All Wheels Drive
                        </div>
                    </label>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="font_wheels" class="d-flex justify-content-center align-items-center text-white rounded-xsm  p-10" 
                        :class="[data.divertrim == 'font_wheels' ? activeClass : mainClass]"
                    >
                        <input type="radio" class="form-control check-input mr-5" v-model="data.divertrim" value="font_wheels" id="font_wheels">
                        <div>
                            Font Wheels Drive
                        </div>
                    </label>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="back_wheels" class="d-flex justify-content-center align-items-center text-white rounded-xsm  p-10" 
                        :class="[data.divertrim == 'back_wheels' ? activeClass : mainClass]"
                    >
                        <input type="radio" class="form-control check-input mr-5" v-model="data.divertrim" value="back_wheels" id="back_wheels">
                        <div>
                            Back Wheels Drive
                        </div>
                    </label>
                </div>
                <div class="col-md-4 mb-3" >
                    <label for="four_wheels" class="d-flex justify-content-center align-items-center text-white rounded-xsm  p-10" 
                        :class="[data.divertrim == 'four_wheels' ? activeClass : mainClass]"
                    >
                        <input type="radio" class="form-control check-input mr-5" v-model="data.divertrim" value="four_wheels" id="four_wheels">
                        <div>
                            Four Wheels Drives
                        </div>
                    </label>
                </div>
            </div>
        </div>
        <!-- Engine -->
        <div class="mb-3">
            <h3 class="mb-3 text-center fw-bold">Engine</h3>
            <div class="row">
                <div class="mb-3 col-md-4">
                    <label for="1300_4cyl_gas" 
                        :class="[data.engine == '1300_4cyl_gas' ? activeClass : mainClass]" 
                        class="d-flex justify-content-around align-items-center  p-10 rounded-xsm bg-main">
                        <input type="radio" class="form-check-input check-input mr-5" v-model=" data.engine "
                            value="1300_4cyl_gas" id="1300_4cyl_gas">
                        <div>
                            1.3 / 4 Cylinder Gas
                        </div>
                    </label>
                </div>
                <div class="mb-3 col-md-4">
                    <label for="1400_4cyl_gas" 
                        :class="[data.engine == '1400_4cyl_gas' ? activeClass : mainClass]" 
                        class="d-flex justify-content-around align-items-center  p-10 rounded-xsm bg-main">
                        <input type="radio" class="form-check-input check-input mr-5" v-model=" data.engine "
                            value="1400_4cyl_gas" id="1400_4cyl_gas">
                        <div>
                            1.4 / 4 Cylinder Gas
                        </div>
                    </label>
                </div>
                <div class="mb-3 col-md-4">
                    <label for="1500_4cyl_gas"  
                        
                        class="d-flex justify-content-around align-items-center  p-10 rounded-xsm  "
                        :class="[data.engine == '1500_4cyl_gas' ? activeClass : mainClass]" 
                        >
                        <input @click="click" type="radio" class="form-check-input check-input mr-5" v-model=" data.engine "
                            value="1500_4cyl_gas" id="1500_4cyl_gas">
                        <div >
                            1.5 / 4 Cylinder Gas
                        </div>
                    </label>
                </div>
                <div class="mb-3 col-md-4">
                    <label for="1600_4cyl_gas" 
                        :class="[data.engine == '1600_4cyl_gas' ? activeClass : mainClass]" 
                        class="d-flex justify-content-around align-items-center  p-10 rounded-xsm bg-main">
                        <input type="radio" class="form-check-input check-input mr-5" v-model=" data.engine "
                            value="1600_4cyl_gas" id="1600_4cyl_gas">
                        <div>
                            1.6 / 4 Cylinder Gas
                        </div>
                    </label>
                </div>
                <div class="mb-3 col-md-4">
                    <label for="1800_4cyl_gas" 
                        :class="[data.engine == '1800_4cyl_gas' ? activeClass : mainClass]" 
                        class="d-flex justify-content-around align-items-center  p-10 rounded-xsm bg-main">
                        <input type="radio" class="form-check-input check-input mr-5" v-model=" data.engine "
                            value="1800_4cyl_gas" id="1800_4cyl_gas">
                        <div>
                            1.8 / 4 Cylinder Gas
                        </div>
                    </label>
                </div>
                <div class="mb-3 col-md-4">
                    <label for="2000_4cyl_gas" 
                        :class="[data.engine == '2000_4cyl_gas' ? activeClass : mainClass]" 
                        class="d-flex justify-content-around align-items-center  p-10 rounded-xsm bg-main">
                        <input type="radio" class="form-check-input check-input mr-5" v-model=" data.engine "
                            value="2000_4cyl_gas" id="2000_4cyl_gas">
                        <div>
                            2.0 / 4 Cylinder Gas
                        </div>
                    </label>
                </div>
                <div class="mb-3 col-md-4">
                    <label for="2000_4cyl_diseal" 
                        :class="[data.engine == '2000_4cyl_diseal' ? activeClass : mainClass]" 
                        class="d-flex justify-content-around align-items-center text-white p-10 rounded-xsm bg-main">
                        <input type="radio" class="form-check-input check-input mr-5" v-model=" data.engine "
                            value="2000_4cyl_diseal" id="2000_4cyl_diseal">
                        <div>
                            2.0 / 4 Cylinder Diseal
                        </div>
                    </label>
                </div>
                <div class="mb-3 col-md-4">
                    <label for="2200_4cyl_diseal" 
                        :class="[data.engine == '2200_4cyl_diseal' ? activeClass : mainClass]" 
                        class="d-flex justify-content-around align-items-center  p-10 rounded-xsm bg-main">
                        <input type="radio" class="form-check-input check-input mr-5" v-model=" data.engine "
                            value="2200_4cyl_diseal" id="2200_4cyl_diseal">
                        <div>
                            2.2 / 4 Cylinder Diseal
                        </div>
                    </label>
                </div>
                <div class="mb-3 col-md-4">
                    <label for="2200_4cyl_gas" 
                        :class="[data.engine == '2200_4cyl_gas' ? activeClass : mainClass]" 
                        class="d-flex justify-content-around align-items-center  p-10 rounded-xsm bg-main">
                        <input type="radio" class="form-check-input check-input mr-5" v-model=" data.engine "
                            value="2200_4cyl_gas" id="2200_4cyl_gas">
                        <div>
                            2.2 / 4 Cylinder Gas
                        </div>
                    </label>
                </div>
                <div class="mb-3 col-md-4">
                    <label for="2400_4cyl_gas" 
                        :class="[data.engine == '2400_4cyl_gas' ? activeClass : mainClass]" 
                        class="d-flex justify-content-around align-items-center  p-10 rounded-xsm bg-main">
                        <input type="radio" class="form-check-input check-input mr-5" v-model=" data.engine "
                            value="2400_4cyl_gas" id="2400_4cyl_gas">
                        <div>
                            2.4 / 4 Cylinder Gas
                        </div>
                    </label>
                </div>
                <div class="mb-3 col-md-4">
                    <label for="3000_4cyl_gas" 
                        :class="[data.engine == '3000_4cyl_gas' ? activeClass : mainClass]" 
                        class="d-flex justify-content-around align-items-center  p-10 rounded-xsm bg-main">
                        <input type="radio" class="form-check-input check-input mr-5" v-model=" data.engine "
                            value="3000_4cyl_gas" id="3000_4cyl_gas">
                        <div>
                            3.0 / 4 Cylinder Gas
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
        }
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