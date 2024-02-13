import { createApp } from "vue";
import bootstraptable from "./components/bootstraptable.vue" ;


const app = createApp({
    components: {
        bootstraptable ,
    }
});

app.mount('#app');
