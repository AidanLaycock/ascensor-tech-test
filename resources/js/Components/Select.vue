<template>
    <select class="form-multiselect block w-full mt-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" multiple v-model="selected">
        <option v-for="option in temp" :value="option">{{ option.name }}</option>
    </select>
</template>

<script setup>
import {ref} from 'vue'
const props = defineProps({temp: Array});

const selected = ref([])
</script>
