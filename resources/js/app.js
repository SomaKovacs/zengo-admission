import './bootstrap';
import { createApp } from 'vue'
import Teszt from "./components/teszt.vue";

const app = createApp();

app.component('teszt', Teszt)

app.mount('#app')
