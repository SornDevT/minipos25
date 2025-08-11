import './bootstrap';

import { createApp } from 'vue';
import App from './App.vue';
import Menu from './Components/Menu.vue';
import router from './Router';
import { createPinia } from 'pinia';
const pinia = createPinia();


const app = createApp(App);
app.component('Menu', Menu);
app.use(router);
app.use(pinia);
app.mount('#app');