<script setup lang="ts">

import { defineEmits, ref} from "vue";
import axios from "axios";

const props = defineProps({
    countyId: Number
})

const name = ref('');
const emit = defineEmits(['addCityToList']);

const addCityToCounty = () =>
{
    const data = new FormData();
    data.append("name", name.value);
    data.append("county_id", props.countyId);

    axios.post("/addCityToCounty", data)
        .then((response) => {
            emit('addCityToList', response.data);
            name.value = '';
        })
        .catch((error) => {
            console.error(error);
        })
}
</script>

<template>

<div class="add-component">
    <span>Új város:</span>

    <div class="add-div">
        <input id="name" type="text" v-model="name" required="required"/>
        <button @click="addCityToCounty">Felvétel</button>
    </div>
</div>
</template>

<style scoped>
    .add-component {
        width: auto;
        margin: 20px;
        display: flex;
        flex-direction: row;
        border: 2px solid black;
        border-radius: 10px;
        justify-content: start;
        padding: 20px;
    }

    .add-component span {
        padding-right: 20px;
        justify-content: center;
        align-items: center;
    }

    .add-div {
        display: flex;
        flex-direction: column;
        width: auto;
    }

    .add-div button {
        margin-top:5px;
        color: #9ea6b5;
        background-color: #2d3748;
        border-radius: 20px;
    }
</style>
