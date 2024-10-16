<template>
    <Head title="Edit Product"/>
    <section class="bg-gray-950 min-h-[100vh]">
        <div class="h-[100px]">

        </div>
        <form @submit.prevent="handleStore" class="w-[90%] m-auto">
            <TextField
             v-model="form.name"
             placeholder="Product name"
             :error="props.errors.name"
            />
            <TextField
             v-model="form.price"
             type="number"
             placeholder="Price"
             :error="props.errors.price"
            />
            <TextField
             v-model="form.stock"
             type="number"
             placeholder="Stock"
             :error="props.errors.stock"
            />
            <TextField
             v-model="form.description"
             placeholder="Description"
             :error="props.errors.description"
            />
            <DataListField
             v-model="form.category_name"
             :categories="categories"
             placeholder="Category"
             :error="props.errors.category_name"
            />

            <button class="text-gray-400
            border w-[400px] border-gray-600
            h-[40px] rounded-sm hover:bg-gray-900
            transition-all ease-in"
             type="submit"
             >Save changes</button>
        </form>

    </section>
</template>

<script setup>
import TextField from '@/Components/Fields/TextField.vue';
import DataListField from '@/Components/Fields/DataListField.vue'
import { useForm } from '@inertiajs/vue3';

 const props = defineProps({
    errors: Object,
    categories:Array,
    product:Array || [],
});

const form = useForm({
    name: props.product.name,
    category_name: props.product.category_name,
    price: props.product.price,
    stock: props.product.stock,
    description: props.product.description,
})

const handleStore = ()=>{
    form.put(route('products.update'));
}
</script>
