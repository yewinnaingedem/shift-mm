import { createApp } from "vue";
// import addcars from "./Component/addcars.vue" ;
import App from "./App.vue" ;

const app = createApp({
    components : {
        App ,
    }
})

app.mount('#add') ;