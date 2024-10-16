<template>
    <Head title="Home Product"/>
    <section class="bg-gray-950 min-h-[100vh]">
        <div class="w-[90%] m-auto mb-2 flex justify-end items-center">
            <Link :href="route('products.create')" as="button" class="bg-gray-900
     text-gray-300 w-[40px] h-[40px] text-2xl
     rounded-full hover:bg-gray-700"><span>+</span>
            </Link>
        </div>
        <div class="w-[90%] m-auto flex flex-wrap gap-5">
            <CardProduct v-for="product in products.data " :key="product.id" :name="product.name" :price="product.price"
                :stock="product.stock" :description="product.description" :category="product.category"
                :product_id="product.id" />
        </div>
    </section>

</template>
<script setup>
import Layout from '@/Layouts/Layout.vue'
import CardProduct from '@/Components/CardProduct.vue'
defineOptions({
    layout: Layout
});

defineProps({
    products: Object,
})
</script>
