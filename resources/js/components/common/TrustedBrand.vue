<script setup>
let trusteds = [
    { name: "MG", image: "/images/brand/mg.png"},
    { name: "Michelin", image: "/images/brand/michelin.png"},
    { name: "O1", image: "/images/brand/01.png"},
    { name: "100Plus", image: "/images/brand/100plus.png"},
    { name: "Manulife", image: "/images/brand/manulife.png"},
    { name: "Decathlon", image: "/images/brand/decathlon.png"},
]
</script>

<template>
    <div class="max-w-7xl mx-auto py-8 px-4">
        <h2 class="text-center font-bold mb-4 md:text-xl">Trusted by global brands</h2>
        <div class="">
            <div class="md:flex justify-between overflow-scroll grid grid-cols-3 gap-3">
                <div class="flex justify-center items-center" v-for="trusted in trusteds" :key="trusted.name">
                    <img :src="trusted.image" :alt="trusted.name" class="max-w-[96px] md:max-w-[166px]">
                </div>
            </div>
        </div>
    </div>
</template>