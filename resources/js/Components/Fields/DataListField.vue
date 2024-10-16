<template>

    <div class="mb-6">
        <input class="w-[400px] rounded-sm" min="0" v-model="model" list="categories" :placeholder="placeholder
            ">

        <datalist id="categories">
            <option v-for="(category, index) in categories" :key="index"
            :value="category.name" />

        </datalist>

        <h1 v-if="error" class="text-red-600 animate-pulse">
            {{ error }}
        </h1>
    </div>
</template>

<script setup>

defineProps({

    placeholder: {
        type: String,
        default: "placeholder",
    },
    error: {
        type: String,
        default: "",
    },
    categories: {
        type: Array,
        default: [],
    }


});

const model = defineModel({});

</script>
