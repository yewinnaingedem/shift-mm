<template>
    <table class="table table-success rounded">
        <thead class="bg-dark">
            <tr class="text-center ">
                <th scope="col" class="bg-dark text-white">Default Function Name</th>
                <th class="text-center bg-main">Conditons</th>
            </tr>
        </thead>
        <tbody v-for="(df ,index) in defaultFun" :key="index">
            <tr>
                <th scope="row" class="text-center">Air Conditioning</th>
                <td class="fw-bold text-center" >
                    <i class="fa-solid fa-circle-check text-success" v-if="df.air_conditioning == 1"></i>
                    <i class="fa-solid fa-xmark text-danger" v-else></i>
                </td>
            </tr>
            <tr class="text-center">
                <th scope="row">Power Steering</th>
                <td class="fw-bold text-center" >
                    <i class="fa-solid fa-circle-check text-success" v-if="df.power_steering == 1"></i>
                    <i class="fa-solid fa-xmark text-danger" v-else></i>
                </td>
            </tr>
            <tr class="text-center">
                <th scope="row">Power Window</th>
                <td class="fw-bold text-center" >
                    <i class="fa-solid fa-circle-check text-success" v-if="df.power_windows == 1"></i>
                    <i class="fa-solid fa-xmark text-danger" v-else></i>
                </td>
            </tr>
            <tr class="text-center">
                <th scope="row">ABS Break</th>
                <td class="fw-bold text-center" >
                    <i class="fa-solid fa-circle-check text-success" v-if="df.abs_brakes == 1"></i>
                    <i class="fa-solid fa-xmark text-danger" v-else></i>
                </td>
            </tr>
            <tr class="text-center">
                <th scope="row">Air Bagse</th>
                <td class="fw-bold text-center" >
                    <i class="fa-solid fa-circle-check text-success" v-if="df.airbags == 1"></i>
                    <i class="fa-solid fa-xmark text-danger" v-else></i>
                </td>
            </tr>
            <tr class="text-center">
                <th scope="row">Navigation System</th>
                <td class="fw-bold text-center" >
                    <i class="fa-solid fa-circle-check text-success" v-if="df.navigation_system == 1"></i>
                    <i class="fa-solid fa-xmark text-danger" v-else></i>
                </td>
            </tr>
            <tr class="text-center">
                <th scope="row">Bluetooth Connectivity</th>
                <td class="fw-bold text-center" >
                    <i class="fa-solid fa-circle-check text-success" v-if="df.bluetooth_connectivity == 1"></i>
                    <i class="fa-solid fa-xmark text-danger" v-else></i>
                </td>
            </tr>
        </tbody>
    </table>

    </template>
<script>
    export default {
        name : "DefaultFunction",
        props : {
            defaultFun : {
                type : Object ,
                required : true ,
            },
        },
        
    }
</script>