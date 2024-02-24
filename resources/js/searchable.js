import { createApp } from "vue";
import Searchable from "./Component/UISearchable/Searchable.vue";
const app = createApp({
    components : {
        Searchable ,
    }
});

app.mount('#app') ;