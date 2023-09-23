<template>
    <form action="" novalidate>
        <slot
            :group="group" 
            :fields = "fields"
            :validationBag="validationBag"
        >

        </slot>
    </form>
</template>

<script>
    export   default {
        props : {
            group : {
                type : String ,
                required : false 
            },
            behavior : {
                type : String ,
                required: false ,
            }
        } ,
        data () {
            return {
                fields : {} ,
                validationBag : {} ,
            }
        }
    }
</script>