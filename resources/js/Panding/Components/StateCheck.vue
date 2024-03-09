<template>
    <div class="mb-3 row">
        <div class="col-md-4">
            <button class="btn btn-primary">
                <span class="me-2">Check At ShowRoow</span>
                <span><i class="fa-solid fa-square-check"></i></span>
            </button>
        </div>
        <div class="col-md-4">
            <button class="btn btn-info" @click="showRoom()">
                <div>
                    <span class="me-2">Check At ShowRoow</span>
                    <span>
                        <i :class="(isSquareChecked ? 'fa-solid' : 'fa-regular') + 'fa-square-check'"></i>
                    </span>
                </div>
            </button>
        </div>
        <div class="col-md-4"></div>
    </div>
</template>

<script>

    export default {
        name : "StateCheck" ,
        data () {
            return {
                isSquareChecked : true ,
            }
        },
        methods : {
            showRoom () {
                this.isSquareChecked = !this.isSquareChecked;
            }
        }
    }
</script>