<script setup>
import { store } from '../../store'
</script>

<template>
    <div class="mx-auto py-8 px-4 xl:px-16">
        <h2 class="text-center font-bold mb-4 md:text-xl">Trusted by global brands</h2>
        <div class="">
            <div class="md:flex justify-between overflow-scroll grid grid-cols-3 gap-3 scrollbar-hide">
                <div class="flex justify-center items-center" v-for="trusted in store.trustedBrands" :key="trusted.id">
                    <img :src="trusted.image" :alt="trusted.name" class="max-w-[96px] md:max-w-[166px]">
                </div>
            </div>
        </div>
    </div>
</template>