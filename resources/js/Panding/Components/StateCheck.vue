<template>
    <div class="mt-3 row px-2">
        <blockquote class="blockquote">
            <p>You said that you are gonna check it at Main Showroom And Registration Certificate .</p>
        </blockquote>
        <div class="col-md-4 text-start ">
            <button class="btn btn-primary">
                <span class="me-2">Check At ShowRoow</span>
                <span>
                    <i class="fa-solid " :class="(state1 ? 'fa-circle-check' : 'fa-circle-xmark' )"></i>
                </span>
            </button>
        </div>
        <div class="col-md-4 text-center">
            <button class="btn btn-info" >
                <div>
                    <span class="me-2">Check At NMVTIS</span>
                    <span>
                        <span>
                            <i class="fa-solid " :class="(state2 ? 'fa-circle-check' : 'fa-circle-xmark' )"></i>
                        </span>
                    </span>
                </div>
            </button>
        </div>
        <div class="col-md-4 text-end">
            <button class="btn btn-danger">
                All have done <strong>?</strong> 
            </button>
        </div>
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
        },
        props : {
            state1 : {
                type : Number ,
                default : null ,
            },
            state2 : {
                type : Number ,
                default : null ,
            }
        },
        mounted () {

        }
    }
</script>