<script setup>
import { store } from '../../store'
</script>

<template>
    <div class="px-4 py-8 mx-auto xl:px-16">
        <h2 class="mb-4 font-bold text-center md:text-xl">Trusted by global brands</h2>
        <div class="">
            <div class="grid justify-between grid-cols-3 gap-3 overflow-auto md:flex scrollbar-hide">
                <div class="flex items-center justify-center" v-for="trusted in store.trustedBrands" :key="trusted.id">
                    <img :src="trusted.image" :alt="trusted.name" class="max-w-[96px] md:max-w-[166px]">
                </div>
            </div>
        </div>
    </div>
</template>