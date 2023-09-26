
<template>
    <div>
        <div class="form-group">
            <label for="name" class="form-label">Name</label>
            <input type="text" id="name" class="form-control" v-model="data.name" placeholder="Enter Name">
        </div>
        <div class="form-group">
            <label for="lastName" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="lastName" v-model="data.lastName" placeholder="Enter Name">
        </div>
    </div>
</template>

<script>
    export default ({
        props : {
            data : {
                required : true ,
            }
        }

    });
</script>