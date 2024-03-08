<template>
    <div class="my-3">
        <div class="progress">
            <div class="progress-bar" role="progressbar" :style="{ width: progress + '%' }" aria-valuenow="progress" aria-valuemin="0" aria-valuemax="100">10%</div>
        </div>
    </div>
</template>

<script>
    export default {
        name : "progessBar" ,
    }
</script>