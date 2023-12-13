<template>
    <div class="row  mt-3">
        <div class="col-md-6 mb-3">
            <label for="state" class="form-label">Lincense State</label>
            <select v-model="data.license_state"  class="form-select">
                <option :value="license_state.id" :key="license_state.id" v-for="license_state in arrayData['license-states']">{{ license_state.state }}</option>
            </select>
        </div>
        <div class="col-md-6">
            <label for="steering" class="form-label">Steering </label>
            <select v-model="data.steering" id="" class="form-select">
                <option :value="steering.id" :key="steering.id" v-for="steering in arrayData['steerings']">{{ steering.steering }}</option>
            </select>
        </div>
        <div class="col-md-6">
            <label for="warranty" class="form-label">Warranty</label>
            <input type="text" v-model="data.warranty" id="warranty" class="form-control" placeholder="Enter Warrantly">
        </div>
        <div class="col-md-6 mb-3">
            <label for="owner" class="form-label">Pass Owner</label>
            <input type="text" v-model="data.pass_owner" id="owner" class="form-control" placeholder="Enter Pass Owner">
        </div>
        <div class="col-md-6 mb-3">
            <label for="madeIn" class="form-label">Place Of Orignal</label>
            <input type="text" v-model="data.madeIn" id="madeIn" class="form-control" placeholder="Place Of Orignal ">
        </div>
        <div class="col-md-6 mb-3">
            <label for="num_seat" class="form-label">Number Of Seat</label>
            <input type="text" v-model="data.num_seat" id="num_seat" class="form-control" placeholder="Number Of Seat ">
        </div>
    </div>
    <div class="row">
        <label for="break" class="form-label">Brake System</label>
        <div class="col-md-6 mb-3">
            <input type="text" v-model="data.font_break" id="break" class="form-control" placeholder="Font Break">
        </div>
        <div class="col-md-6">
            <input type="text" class="form-control" v-model="data.back_break" id="break" placeholder="Rear Break">
        </div>
    </div>
</template>

<script>
export default ({
    props: {
        arrayData  : {
            type : Array , 
            required : true ,
        } ,
        data : {
            type : Object ,
            required : true ,
        }
    },
    computed :  {
        defaultSteeringConer () {
            if(this.arrayData['steerings'].length > 0) {
                return this.arrayData['steerings'][0].id ;
            }
            return null ;
        },
        defaultState () {
            if(this.arrayData['license-states'].length > 0) {
                return this.arrayData['license-states'][0].id ;
            }
            return null ;
        }
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
            font_break : null ,
            back_break : null ,
        }
    },
    mounted () {
        this.data.steering = this.defaultSteeringConer ;
        this.data.license_state = this.defaultState ;
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

.d-none {
    display: none;
}
.check-input {
    appearance: none;
    display: none;
}</style>