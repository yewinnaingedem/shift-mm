import { createApp } from "vue";
import Wrapper from './Component/Form/Wrapper.vue';
import step1 from './Component/step1.vue';
const app = createApp({
    components : {
        Wrapper ,
    }
});

app.mount('#app') ;