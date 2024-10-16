<template>
    <div  class="">
        <div v-if="page.props.flash.deleted"
        class="px-3 py-3 text-red-500 animate-pulse">
            {{ page.props.flash.deleted }}
        </div>
        <div v-if="page.props.flash.created"
        class="px-3 py-3 text-green-500 animate-pulse">
            {{ page.props.flash.created }}
        </div>
    </div>
</template>

<script setup>
import { usePage } from "@inertiajs/vue3";

const page = usePage();

</script>
