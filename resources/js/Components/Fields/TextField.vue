<template>

    <div class="mb-6">
        <input class="w-[400px] rounded-sm"
        min="0"
        v-model="model"
         :type="type"
         :placeholder="placeholder
         ">
         <h1 v-if="error"
          class="text-red-600 animate-pulse">
            {{ error }}
        </h1>
    </div>
</template>

<script setup>

defineProps({
type:{
    type:String,
    default:'text',
},
placeholder:{
    type:String,
    default:"placeholder",
},
error:{
    type:String,
    default:"",
}
});

const model = defineModel({});

</script>
