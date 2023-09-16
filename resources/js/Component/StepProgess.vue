<script setup>
    import { defineProps , ref , computed , defineExpose} from 'vue';
    const props = defineProps({
        data : Object ,
    });
    props.data.currentStep-- ;
    const data = ref(props.data);
    const cssStyle = computed(()=> {
        return {
            '--active-color' : data.value.activeColor ,
            '--passive-color' : data.value.passiveColor ,
        }
    });

    const nextStep = () => {
        if(data.value.currentStep < data.value.steps.length) {
            data.value.currentStep++ 
        }else {
            console.log('hi');
        }
    }
    const previousStep = function () {
        if(data.value.currentStep > 0) {
            data.value.currentStep -- 
        }
    }

    defineExpose ({
        nextStep , 
        previousStep 
    });
</script>

<template>
    <div class="step-container" :style="cssStyle">
        <ul class="step-list">
            <li class="step" v-for="(step , index ) in data.steps" :key="index" :class="(index == data.currentStep ) ? 'step-active' : ' ' ,
            (index < data.currentStep) ? 'step-done' : ''
            ">
                <div class="step-bublle"></div>
                <div class="step-line">
                    <div class="step-fill"></div>
                </div>
            </li>
        </ul>
    </div>
</template>

<style scoped>
    .step-container
    {
        width: 95%;
        margin: 5px auto;
    }

    .step-list {
        display: flex;
        list-style: none;
    }
    .step {
        display: flex;
        position: relative;
        max-width: 100%;
        align-items: center;
        flex-grow: 1;
        height: 60px;
    }
    .step-bublle {
        width: 35px;
        height: 35px;
        border-radius: 50%;
        background-color: var(--passive-color);
        transition: all .3s ease ;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .step-fill {
        width: 0%;
        height: 5px;
        background-color: var(--active-color);
    }
    .step:last-child {
        width: 60px;
    }
    .step-line {
        width: 100%;
        height: 5px;
        background-color: var(--passive-color);
        top: 50%;
        left: 0;
        transform: translateY(-50%);
        position: absolute;
    }
    .step:last-child .step-line {
        display: none;
    }
    .step-active .step-bublle ,
    .step-done .step-bublle {
        width: 60px;
        height: 60px;
        background-color: var(--active-color);
        z-index: 80;
    }
    .step-done .step-fill {
        width: 100%;
    }
</style>