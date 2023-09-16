<script setup>
    import StepProgess from "./Component/StepProgess.vue" ;
    import { ref } from "vue";
    const dataSteps = {
        steps : ['step 1' , 'step 2' , 'step 3'] , 
        currentStep : 3 , 
        activeColor : "#65a30d" ,
        passiveColor : "#84cc18" ,
   }

   const stepProgess = ref();

   console.log(stepProgess.nextStep);
</script>

<template>
    <StepProgess :data="dataSteps" ref="stepProgess" />
    <button @click="stepProgess.nextStep">Next Step </button>
    <button @click="stepProgess.previousStep">Previous Step</button>
</template>