import { createApp } from "vue";
import { createPinia } from "pinia";
import App from "./App.vue";
import router from "./router";
// import PrimeVue from "primevue/config";
// import InputText from "primevue/inputtext";
// import StyleClass from "primevue/styleclass";
// import Panel from "primevue/panel";
// import Menubar from 'primevue/menubar';
// import Accordion from 'primevue/accordion';
// import AccordionTab from 'primevue/accordiontab';
// import InputNumber from 'primevue/inputnumber';
// import Button from 'primevue/button';
// import InputGroup from 'primevue/inputgroup';
// import InputGroupAddon from 'primevue/inputgroupaddon';
// import CascadeSelect from 'primevue/cascadeselect';
// import Dropdown from 'primevue/dropdown';
// import Password from 'primevue/password';
// import Calendar from 'primevue/calendar';
// import InputOtp from 'primevue/inputotp';
// import IconField from 'primevue/iconfield';
// import InputIcon from 'primevue/inputicon';
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
// app.component("InputText", InputText);
// app.component('Button', Button);
// app.component('Calendar', Calendar);
// app.component("Password", Password);
// app.component("Accordion", Accordion);
// app.component("AccordionTab", AccordionTab);
// app.component("Calendar", Calendar);
// app.component("InputNumber", InputNumber);
// app.component("InputGroup", InputGroup);
// app.component("Dropdown", Dropdown);
// app.component("CascadeSelect", CascadeSelect);
// app.component("InputGroupAddon", InputGroupAddon);
// app.component("InputOtp", InputOtp);
// app.component("IconField", IconField);
// app.component("InputIcon", InputIcon);
// app.component('Menubar', Menubar);
// app.directive("styleclass", StyleClass);
app.use(pinia);
app.use(router);
app.use(materialKit);
app.mount("#app");
