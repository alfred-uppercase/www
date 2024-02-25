import { createApp } from "vue";
import { createPinia } from "pinia";
import App from "./App.vue";
import router from "./router";
// import { guest } from './plugins/axios';

// Nucleo Icons
import "./assets/css/nucleo-icons.css";
import "./assets/css/nucleo-svg.css";
import "./assets/css/style.css";
import "./assets/css/personaliser.css";
import "./assets/css/leboincoin.css";



import materialKit from "./material-kit";

const app = createApp(App);
const pinia = createPinia();
app.use(pinia);
app.use(router);
app.use(materialKit);
app.mount("#app");
