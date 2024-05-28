<script setup lang="ts">

import { defineEmits, ref } from "vue";
import axios from "axios";

const modify = ref(null);
const emit = defineEmits(['deleteCityFromList']);

const props = defineProps({
    cities: Array,
    county_name: String,
})

const modifyCity = (cityName: string, cityId: number) =>
{
    const data = new FormData();
    data.append("name", cityName);

    axios.post("/modifyCity/" + cityId, data)
        .then((response) => {
            console.assert(response);
        })
        .catch((error) => {
            console.error(error);
        })

    modify.value = null;
}

const deleteCity = (cityId: number) =>
{
    axios.post("/deleteCity/" + cityId)
        .then(() => {
            emit('deleteCityFromList', cityId);
        })
        .catch((error) => {
            console.error(error);
        })

    modify.value = null;
}

</script>

<template>
    <div class="list-component">
        <div class="county">
            <span>Megye:</span>
            <span>{{ county_name }}</span>
        </div>
        <hr>
        <div class="cities-list-outer">
            <span>Városok:</span>
            <br>

            <div>
                <div class="cities-list-div">
                    <div v-for="city in cities">
                        <span v-if="city.id !== modify" class="modifiable" @click="modify = city.id">{{ city.name }}</span>
                        <div v-else class="hidden-div">
                            <input  @change="" type="text" v-model="city.name">
                            <button @click="modifyCity(city.name, city.id)">Módosit</button>
                            <button @click="deleteCity(city.id)">Törlés</button>
                            <button @click="modify = null">Mégse</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
    .cities-list-outer {
        display: flex;
        flex-direction: column;
        margin-top: 20px;
        margin-bottom: 20px;
        padding-left: 30px;
    }

    .cities-list-div {
        display: flex;
        flex-direction: column;
        margin-top: 5px;
        margin-bottom: 5px;
    }

    .list-component {
        border: 2px solid black;
        border-radius: 10px;
    }

    .county {
        display: flex;
        flex-direction: row;
        margin-top: 20px;
        margin-bottom: 20px;
        justify-content: center;
        align-items: center;
    }

    .modifiable {
        cursor: pointer;
    }

    .hidden-div {
        display: flex;
        flex-direction: row;
    }

    .hidden-div button {
        margin: 5px;
        border-radius: 20px;
        background-color: #2d3748;
        color: #9ea6b5;
        cursor: pointer;
    }
</style>
