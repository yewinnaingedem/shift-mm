<template>
    <div class="mt-3">
        <div>
            <h1 class="text-center font-bold" >Please Start With </h1>
            <form action="" method="post">
                <div class="mb-3">
                    <select name="" class="customice_form" id="">
                        <option value="2001">2001</option>
                        <option value="2002">2001</option>
                        <option value="2003">2001</option>
                        <option value="2004">2001</option>
                        <option value="2005">2001</option>
                        <option value="2006">2001</option>
                        <option value="2007">2001</option>
                        <option value="2008">2001</option>
                        <option value="2009">2001</option>
                        <option value="2010">2001</option>
                        <option value="2011">2001</option>
                        <option value="2012">2001</option>
                        <option value="2013">2001</option>
                        <option value="2014">2001</option>
                        <option value="2015">2001</option>
                        <option value="2016">2001</option>
                        <option value="2017">2001</option>
                        <option value="2018">2001</option>
                        <option value="2019">2001</option>
                        <option value="2019">2001</option>
                        <option value="2020">2001</option>
                        <option value="2021">2001</option>
                        <option value="2022">2001</option>
                    </select>
                </div>
            </form>
        </div>
    </div>
</template>
<style lang="css">
    .customice_form {
        padding: 20px 20px;
        border-radius: 5px;
        border: 1px solid gray;
        width: 200px;
    }
</style>
<script>
    export default ({
        data() {
            return {
                activeContent : null ,
            }
        },
        methods : {
            toggleContent(id) {
                if(this.activeContent === id){
                    this.activeContent = null ;
                }else {
                    this.activeContent = id ;
                }
            }
        }
    })
</script>