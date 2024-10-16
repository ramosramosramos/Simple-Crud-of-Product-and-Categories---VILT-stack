<template>
    <div class=" flex justify-center flex-col text-gray-300 items-center w-[285px] h-[260px] bg-gray-900 rounded-md">
        <div class="w-[90%]">
            <h1><strong>Name:</strong> {{ name }}</h1>

        </div>
        <div class="w-[90%]">

            <h1><strong>Price :</strong> {{ price }}</h1>

        </div>
        <div class="w-[90%]">

            <h1><strong>Stock:</strong> {{ stock }}</h1>
        </div>
        <div class="w-[90%] mb-2">
            <h1><strong>Description:</strong> {{ description }}</h1>
        </div>
        <div class="w-[90%] mb-1 ">
            <h1><strong>Category:</strong> {{ category }}</h1>
        </div>

        <div class="  w-[90%] flex gap-4 mt-10">
            <Link :href="route('products.destroy',product_id)"
                method="delete"
                as="button"
            class="border border-gray-600
             px-3 rounded-md hover:bg-gray-800 transition-all ease-in
             ">Delete</Link>
            <Link   as="button"
            :href="route('products.edit',product_id)"
            class="border border-gray-600
             px-3 rounded-md hover:bg-gray-800 transition-all ease-in
             ">Edit</Link>
        </div>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    name: {
        type: String,
        default: "Product name",
    },
    price: {
        type: Number,
        default: 0,
    },
    description: {
        type: String,
        default: "Product description",
    },
    category: {
        type: String,
        default: "Product category",
    },
    stock: {
        type: String,
        default: "Product stock",
    },

    product_id:{
        type:Number
    }
})

</script>
