import './bootstrap';
import '../sass/app.scss';
import { createApp } from 'vue';
import App from './components/ExampleComponent.vue';
import router from './router.js';


const app = createApp(App);

app.use(router);

app.mount('#app');
