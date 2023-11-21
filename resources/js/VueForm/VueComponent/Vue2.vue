<template>
    <div class="container">
        <div class="row">
            <div class="fw-bold mb-3 h-3 text-header">Body Style</div>
            <div class="col-md-4 mb-3" v-for="(divertrim  , index ) in datas['divertrims']" :key="divertrim.id">
                <label :for="divertrim.id + 'tr'" class="d-flex justify-content-center align-items-center main-color p-10 rounded" 
                    :class="(divertrim.id === stepsProgess.divertrim) ? 'bg-dark text-white' : ' ' "
                >
                    <input type="radio" v-model="stepsProgess.divertrim" :value="divertrim.id" :id="divertrim.id + 'tr'" class="d-none">
                    <div class="fw-bold">
                        {{ divertrim.divertrim }}
                    </div>
                </label>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        name : "Vue2" ,
        props : {
            datas : {
                type : Object ,
                required : true 
            },
            stepsProgess : {
                type : Object ,
                required :true ,
            }
        }
    }
</script>