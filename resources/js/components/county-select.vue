<script setup lang="ts">

import { onMounted, ref } from 'vue';
import axios from "axios";

const counties = ref();
const cities = ref([]);
const selectedCounty = ref(null);

const getData = () =>
{
    axios.get("/getCitiesByCountyId/" + selectedCounty.value.id)
        .then((response) => {
            cities.value = Object.values(response.data);
        })
        .catch((error) => {
            console.error(error);
        })
}

const handleAddCity = (city: Object): void => {
    cities.value.push(city);
}

const handleDeleteCity = (city_id: number):void => {
    cities.value = cities.value.filter((c) => c.id !== city_id);
}


onMounted(async () => {
    (await fetch('/counties')).json().then((data) => {
        counties.value = data;
    });
})

</script>

<template>
    <div class="main-content">
        <div class="left-content-div">
            <div class="county-picker">
                <label for="county">Megye:</label>

                <select name="county" id="county" v-model="selectedCounty" @change="getData">
                    <option value="null" disabled hidden="hidden"> Válasszon! </option>
                    <option v-for="county in counties" :value="county"> {{ county.name }}</option>
                </select>
            </div>

            <add-city v-if="selectedCounty" :countyId="selectedCounty.id" @add-city-to-list="handleAddCity"></add-city>
        </div>

        <div class="right-content-div">
            <show-cities v-if="selectedCounty" :cities="cities" :county_name="selectedCounty.name" @delete-city-from-list="handleDeleteCity"></show-cities>
        </div>
    </div>
</template>

<style scoped>
    .main-content {
        display: flex;
        flex-direction: row;
        width: 100%;
        height: 100%;
        align-items: start;
    }

    .left-content-div {
        display: flex;
        flex-direction: column;
        width: 30%;
    }

    .right-content-div {
        width: 50%;
    }

    .county-picker {
        border-radius: 10px;
        border: 2px solid black;
        padding: 10px;
    }

    .county-picker label {
        margin-right: 10px;
    }

</style>
