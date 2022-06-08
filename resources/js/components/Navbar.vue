
<script setup>
import { onClickOutside } from '@vueuse/core'
import { store } from '../store'
import { ref } from 'vue';
const modalSidebar = ref(null)

const showModal = ref(false)
onClickOutside(modalSidebar, () => {
    showModal.value = false
})
</script>
<template>
    <div class="flex justify-between items-center py-4 mx-auto px-4 xl:px-16">
        <a href="/" class="">
            <img src="../assets/logo.png" alt="Zooms Design" class="h-[45px] md:h-[65px]">
        </a>
        <div class="md:flex space-x-16 justify-center items-center hidden">
            <a href="/designs" class="font-bold hover:text-[#5CD0EB]">Design Categories</a>
            <a href="/become-member" class="bg-[#5CD0EB] hover:opacity-90 text-white font-bold rounded px-8 py-2">Become a member</a>
            <a href="#" class="font-bold hover:text-[#5CD0EB]">Sign in</a>
        </div>
        <div class="md:hidden">
            <button class="p-2 rounded" @click="showModal = true">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </div>
    <Teleport to="#modal">
    <Transition
        enter-active-class="duration-200 ease-out translate-x-0"
        leave-active-class="duration-200 ease-in translate-x-0"
        enter-from-class="transform translate-x-[200%]"
        leave-to-class="transform translate-x-[200%]"
        >
            <div v-if="showModal" class="fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-full bg-white/0">
                <div ref="modalSidebar" class="bg-white w-[250px] h-screen absolute right-0 p-4 flex flex-col justify-between shadow-2xl">
                    <div class="flex flex-col space-y-4">
                        <a href="/" class="">
                            <img src="../assets/logo.png" alt="Zooms Design" class="h-[45px] md:h-[65px]">
                        </a>
                        <div class="h-[1px] bg-[#ccc]"></div>
                        <a href="/designs" class="font-semibold ">Design Categories</a>
                        <a href="/become-member" class="bg-[#5CD0EB] text-white font-semibold rounded p-2">Become a member</a>
                        <a href="#" class="font-semibold ">Sign in</a>
                        <div class="h-[1px] bg-[#ccc]"></div>
                        <div>All Categories</div>
                        <div>
                            <div v-for="cat in store.categories" :key="cat.name" class="snap-start">
                                <a :href="`/categories/${cat.id}`" class="text-[#A1A6BF] px-2 block md:px-3 py-1 hover:text-[#5CD0EB]">
                                    {{cat.name}}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </Transition>
    </Teleport>
</template>