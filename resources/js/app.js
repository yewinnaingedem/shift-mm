import { createApp } from "vue";
import addcars from "./Component/addcars.vue" ;

const app = createApp({
    components : {
        addcars ,
    }
})

app.mount('#add') ;