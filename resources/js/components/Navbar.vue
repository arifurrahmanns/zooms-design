
<script setup>
import { onClickOutside } from '@vueuse/core'
import { store } from '../store'
import { computed, ref } from 'vue';
import { useRoute, useRouter } from 'vue-router';
const modalSidebar = ref(null)
const search = ref(null)
const router = useRouter()
const route = useRoute();

const showModal = ref(false)
onClickOutside(modalSidebar, () => {
    showModal.value = false
})

const path = computed(() => {
    return router.currentRoute.value.fullPath
})

const searchDesign = () => {
    if (!search.value) {
        return
    }
    router.push({path: '/items/search', query: {query: search.value.trim()}})
}
</script>
<template>
    <div class="flex items-center justify-between px-4 py-4 mx-auto xl:px-16">
        <div class="flex items-center justify-center">
            <a href="/" class="">
                <img src="../assets/logo.png" alt="Zooms Design" class="h-[45px] lg:h-[65px]">
            </a>
        </div>
        <div class="items-center justify-center hidden space-x-2 md:flex lg:space-x-8 2xl::space-x-16">
            <form v-if="path != '/'" @submit.prevent="searchDesign" ref="formSearch" class="relative">
                <input type="text" autocomplete="off" v-model="search" class="border-1 bg-white rounded-md px-3 py-1 lg:py-3 min-w-[100px] lg:min-w-[200px] xl:min-w-[400px] text-[15px] md:text-base focus:ring-[#5FC3DF]" placeholder="Search">
                <button type="submit" class="absolute w-6 h-6 top-1 md:w-8 md:h-8 right-1 sm:top-0 lg:top-2 md:right-2">
                    <img src="/images/icon/search.png" alt="Search">
                </button>
            </form>
            <a href="/designs" class="font-bold hover:text-[#5FC3DF] text-sm lg:text-base">Design Categories</a>
            <a href="/pricing" class="bg-[#5FC3DF] hover:opacity-90 text-white font-bold rounded px-4 xl:px-8 py-2 text-sm lg:text-base">Pricing</a>
            <a href="/manage" class="font-bold hover:text-[#5FC3DF] text-sm lg:text-base">Sign in</a>
        </div>
        <div class="md:hidden">
            <button class="p-2 rounded" @click="showModal = true">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
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
            <div v-if="showModal" class="fixed top-0 left-0 right-0 z-50 w-full h-full md:inset-0 bg-white/0">
                <div ref="modalSidebar" class="bg-white w-[250px] h-screen absolute right-0 p-4 flex flex-col justify-between shadow-2xl">
                    <div class="flex flex-col space-y-4">
                        <a href="/" class="">
                            <img src="../assets/logo.png" alt="Zooms Design" class="h-[45px] md:h-[65px]">
                        </a>
                        <div class="h-[1px] bg-[#ccc]"></div>
                        <a href="/designs" class="font-semibold ">Design Categories</a>
                        <div>
                            <a href="/pricing" class="bg-[#5FC3DF] text-white font-semibold rounded p-2">Pricing</a>
                        </div>
                        <a href="/manage" class="font-semibold ">Sign in</a>
                        <div class="h-[1px] bg-[#ccc]"></div>
                        <div>All Categories</div>
                        <div>
                            <div v-for="cat in store.categories" :key="cat.name" class="snap-start">
                                <a :href="`/categories/${cat.slug}`" class="text-[#A1A6BF] px-2 block md:px-3 py-1 hover:text-[#5FC3DF]">
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