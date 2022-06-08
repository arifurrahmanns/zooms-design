<template>
    <div class="max-w-7xl mx-auto py-8 px-4">
        <div class="flex justify-between items-center mb-4 md:mb-6">
            <h2 class="font-bold md:text-xl">Most Popular Items</h2>
            <a :href="`/designs`" class="flex space-x-3 items-center hover:animate-bounceX">
				<span class="font-semibold md:text-xl">
					See more
				</span>
				<svg class="w-5 h-5" viewBox="0 0 23 24" xmlns="http://www.w3.org/2000/svg">
					<path d="M0.199951 1.73337C0.199951 0.960107 0.826684 0.333374 1.59995 0.333374C1.83888 0.333374 2.06428 0.393107 2.26075 0.499041L21.3941 10.7657C21.8342 11.0018 22.1333 11.4657 22.1333 12C22.1333 12.5344 21.8342 12.9982 21.3941 13.2344L2.26075 23.501C2.06428 23.607 1.83888 23.6667 1.59995 23.6667C0.826684 23.6667 0.199951 23.04 0.199951 22.2667V1.73337Z"/>
				</svg>
            </a>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 snap-x">
            <div v-for="item in items" :key="item.id" class="snap-center">
                <a :href="`/items/${item.id}`" class="border border-[#EBEBEB] rounded flex flex-col p-3 hover:shadow-lg hover:cursor-pointer">
                    <img :src="item.media" :alt="item.title" class="mb-2">
                    <div class="text-center text-sm">
                        <h2 class="font-bold mb-1">{{item.title}}</h2>
                        <p class="text-[#999999] mb-2 text-xs">{{item.category}} </p>
                        <p class="text-[#5CD0EB] font-semibold">$ {{item.price}}</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</template>
<script>
import { getListPopularItems } from '../../api/api'
export default {
    data() {
        return {
            items: [
            ]
        }
    },
    async mounted() {
        const data = await getListPopularItems()
        this.items = data.data
    }
}
</script>