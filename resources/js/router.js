import {createApp} from "vue"; // Импортирует CSS Bootstrap
import PostComponent from "./components/PostComponent.vue";
import 'bootstrap'; // Импортирует JavaScript Bootstrap
import 'bootstrap/dist/css/bootstrap.min.css';


const app = createApp(PostComponent);
app.mount('#app');
