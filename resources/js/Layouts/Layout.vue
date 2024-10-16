<template>
    <header class="bg-gray-950">
        <nav class="relative bg-gray-950 h-[50px] flex items-center text-gray-300">
            <button @click="isOpenMenu = true" class="px-3">Menu</button>
            <aside :class="['bottom-0 top-0 fixed w-[250px] bg-gray-900 z-50 ',
                'transition-all ease-in-out',
                { ' left-0 ': isOpenMenu },
                { ' left-[-999px] ': !isOpenMenu },
            ]">

            </aside>
        </nav>

      <div class="w-[90%] m-auto">
        <FlashMessage />
      </div>

    </header>
    <main @click="isOpenMenu = false">
        <slot />
    </main>

</template>
<script setup>
import { ref } from "vue";
import FlashMessage from "@/Components/Message/FlashMessage.vue";


const isOpenMenu = ref(false);

</script>
