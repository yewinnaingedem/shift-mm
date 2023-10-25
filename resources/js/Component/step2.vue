
<template>
    <div>
        <!-- Transmission -->
    </div>
</template>

<script>
export default ({
    props: {
        data: {
            type : Object ,
            required: true,
        },
        arrayData  : {
            type : Array , 
            required : true ,
        } ,
    },
    computed :  {
        
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
        }
    },
    methods : {
        
    },
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

.check-input {
    appearance: none;
    display: none;
}</style>