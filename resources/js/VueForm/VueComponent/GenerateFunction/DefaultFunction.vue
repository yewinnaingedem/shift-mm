<template>
    <table class="table table-success rounded">
        <thead class="bg-dark">
            <tr class="text-center bg-choco">
                <th scope="col" class="bg-choco text-white">Default Function Name</th>
                <th class="text-center bg-choco">Conditons</th>
            </tr>
        </thead>
        <tbody >
            <tr>
                <th scope="row" class="text-center">Air Conditioning</th>
                <td class="fw-bold text-center" >
                    <i class="fa-solid fa-circle-check text-success" v-if="defaultFun.air_conditioning == 1"></i>
                    <i class="fa-solid fa-xmark text-danger" v-else></i>
                </td>
            </tr>
            <tr class="text-center">
                <th scope="row">Power Steering</th>
                <td class="fw-bold text-center" >
                    <i class="fa-solid fa-circle-check text-success" v-if="defaultFun.power_steering == 1"></i>
                    <i class="fa-solid fa-xmark text-danger" v-else></i>
                </td>
            </tr>
            <tr class="text-center">
                <th scope="row">Power Window</th>
                <td class="fw-bold text-center" >
                    <i class="fa-solid fa-circle-check text-success" v-if="defaultFun.power_windows == 1"></i>
                    <i class="fa-solid fa-xmark text-danger" v-else></i>
                </td>
            </tr>
            <tr class="text-center">
                <th scope="row">ABS Break</th>
                <td class="fw-bold text-center" >
                    <i class="fa-solid fa-circle-check text-success" v-if="defaultFun.abs_brakes == 1"></i>
                    <i class="fa-solid fa-xmark text-danger" v-else></i>
                </td>
            </tr>
            <tr class="text-center">
                <th scope="row">Air Bagse</th>
                <td class="fw-bold text-center" >
                    <i class="fa-solid fa-circle-check text-success" v-if="defaultFun.airbags == 1"></i>
                    <i class="fa-solid fa-xmark text-danger" v-else></i>
                </td>
            </tr>
            <tr class="text-center">
                <th scope="row">Navigation System</th>
                <td class="fw-bold text-center" >
                    <i class="fa-solid fa-circle-check text-success" v-if="defaultFun.navigation_system == 1"></i>
                    <i class="fa-solid fa-xmark text-danger" v-else></i>
                </td>
            </tr>
            <tr class="text-center">
                <th scope="row">Bluetooth Connectivity</th>
                <td class="fw-bold text-center" >
                    <i class="fa-solid fa-circle-check text-success" v-if="defaultFun.bluetooth_connectivity == 1"></i>
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
<style>
.bg-choco{
    background: chocolate !important;
}
</style>