<template>
    <select class="form-multiselect block w-full mt-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" multiple v-model="selected" @blur="$emit('update:modelValue', selected)">
        <option v-for="option in options" :value="option">{{ option.name }}</option>
    </select>
</template>

<script setup>
import { ref } from 'vue'
const props = defineProps(['options', 'modelValue']);

const selected = ref(props.modelValue)
</script>
