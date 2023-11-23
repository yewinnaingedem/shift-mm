<template>
        <div class="mb-3" >
                <p class="fw-bold ques "> Does Air Conditioning have as a default ?</p>
                <div class="ml-3">
                    <label for="ac_yes" class="rounded yes-no ml-3"> 
                        <input type="radio" class="d-none"  id="ac_yes">
                        <div class="fw-bold">
                            Yes 
                        </div>
                    </label>
                    <label for="ac_no" class="rounded yes-no"> 
                        <input type="radio" class="d-none"   id="ac_no">
                        <div class="fw-bold">
                            No
                        </div>
                    </label>
                </div>
                <hr>
            </div>

</template>

<script>
    
</script>

<style>
    .yes-no {
        padding : 4px 16px;
        border : 1px solid gray ;
        background : #18222e ;
        outline : none ;
        color : white ;
        font-size : 18px ;
    }
    .bg-main {
        background :  #06CBA3;
    }
    .ques {
        font-size : 15px ;
    }
    .ml-3 {
        margin-right : 8px ;
    }
</style>