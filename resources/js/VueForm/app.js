import { createApp } from "vue";
import App from "./App.vue";
import pandingState from "../Panding/pandingState.vue" ;
const app = createApp({
    components : {
        App ,
    }
});

const pandingState = createApp ({
    components : {
        pandingState ,              
    }
});
app.mount('#app') ;
pandingState.mount('#panding');