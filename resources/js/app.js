import './bootstrap';
import { createApp } from 'vue'
import addCity from "./components/add-city.vue";
import showCities from "./components/show-cities.vue";
import countySelect from "./components/county-select.vue";

const app = createApp();

app.component('add-city', addCity);
app.component('show-cities', showCities);
app.component('county-select', countySelect)

app.mount('#app')
