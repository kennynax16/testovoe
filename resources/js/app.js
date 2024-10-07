import { createApp } from "vue"; // Импортирует Vue
import router from "./router"; // Импорт Vue Router

import vuetify from './plugins/vuetify';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';
import './bootstrap';
import AppComponent from "./components/AppComponent.vue";


const app = createApp(AppComponent);

app.use(router);
app.use(vuetify)
app.mount('#app');
