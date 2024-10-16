<template>
    <section class="bg-gray-950 min-h-[100vh]">
        <div class="h-[100px]">

        </div>
        <form @submit.prevent="handleCreate" class="w-[90%] m-auto">
            <TextField
             v-model="form.name"
             placeholder="Product name"
             :error="errors.name"
            />
            <TextField
             v-model="form.price"
             type="number"
             placeholder="Price"
             :error="errors.price"
            />
            <TextField
             v-model="form.stock"
             type="number"
             placeholder="Stock"
             :error="errors.stock"
            />
            <TextField
             v-model="form.description"
             placeholder="Description"
             :error="errors.description"
            />
            <DataListField
             v-model="form.category_name"
             :categories="categories"
             placeholder="Category"
             :error="errors.category_name"
            />

            <button class="text-gray-400
            border w-[400px] border-gray-600
            h-[40px] rounded-sm hover:bg-gray-900
            transition-all ease-in"
             type="submit"
             >Create</button>
        </form>

    </section>
</template>

<script setup>
import TextField from '@/Components/Fields/TextField.vue';
import DataListField from '@/Components/Fields/DataListField.vue'
import { useForm } from '@inertiajs/vue3';

defineProps({
    errors: Object,
    categories:Array,
});

const form = useForm({
    name: "",
    category_name: "",
    price: "",
    stock: "",
    description: "",
})

const handleCreate = ()=>{
    form.post(route('products.store'));
}
</script>
