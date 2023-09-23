import { createApp } from "vue";
import Wrapper from "./Component/Form/Wrapper.vue" ;
const app = createApp({
    components : {
        Wrapper ,
    }
});

app.mount('#app') ;