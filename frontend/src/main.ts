import { createApp } from "vue";
import PrimeVue from "primevue/config";
import ToastService from "primevue/toastservice";
import "primeicons/primeicons.css";
import "./style.css";

import router from "./router";
import App from "./App.vue";

const app = createApp(App);

app.use(PrimeVue);
app.use(ToastService); // Isso deve vir antes do app.mount()
app.use(router);

app.mount("#app");