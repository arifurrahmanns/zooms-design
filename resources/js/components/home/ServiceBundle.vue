<script setup>
</script>
<script>
export default {
    data() {
        return {
            currentIndex: 0,
            services: [
                { id: 1, name: "Item #1<br> name", image: "/images/service/1.png", link: "/items/1" },
                { id: 2, name: "Item #2<br> name", image: "/images/service/2.png", link: "/items/1" },
                { id: 3, name: "Item #3<br> name", image: "/images/service/3.png", link: "/items/1" },
                { id: 4, name: "Item #1<br> name", image: "/images/service/1.png", link: "/items/1" },
                { id: 5, name: "Item #2<br> name", image: "/images/service/2.png", link: "/items/1" },
                { id: 6, name: "Item #3<br> name", image: "/images/service/3.png", link: "/items/1" },
            ],
        }
    },
    mounted() {
    },
    methods: {
        // prev() {
        //     if (this.currentIndex == 0) return
        //     this.currentIndex--
        //     this.scrollTo(`#` + this.getItemName(this.currentIndex))
        // },
        // next() {
        //     if (this.currentIndex == this.services.length) return
        //     this.currentIndex++
        //     this.scrollTo(`#` + this.getItemName(this.currentIndex))
        // },
        scrollTo(elemId) {
            const elem = document.querySelector(elemId)
            if (!elem) return
            elem.scrollIntoView({
                behavior: 'smooth',
                block: 'nearest'
            })
        },
        getItemName(index) {
            return `carousel-service-${index}`
        }
    }
}
</script>

<template>
    <div class="max-w-7xl mx-auto py-8 px-4">
        <div class="flex justify-between items-center mb-4 md:mb-6">
            <h2 class="font-bold md:text-xl">Service Bundle, SAVE  MORE!</h2>
            <a :href="`/bundle`" class="flex space-x-3 items-center hover:animate-bounceX">
				<span class="font-semibold md:text-xl">
					See more
				</span>
				<svg class="w-5 h-5" viewBox="0 0 23 24" xmlns="http://www.w3.org/2000/svg">
					<path d="M0.199951 1.73337C0.199951 0.960107 0.826684 0.333374 1.59995 0.333374C1.83888 0.333374 2.06428 0.393107 2.26075 0.499041L21.3941 10.7657C21.8342 11.0018 22.1333 11.4657 22.1333 12C22.1333 12.5344 21.8342 12.9982 21.3941 13.2344L2.26075 23.501C2.06428 23.607 1.83888 23.6667 1.59995 23.6667C0.826684 23.6667 0.199951 23.04 0.199951 22.2667V1.73337Z"/>
				</svg>
            </a>
        </div>
        <div class="flex overflow-x-auto gap-6 snap-x snap-mandatory " >
            <div v-for="service in services" :key="service.id" class="shrink-0 snap-center" :id="getItemName(service.id)">
                <div class="relative max-w-[400px]">
                    <img :src="service.image" :alt="service.name" class="">
                    <div class="absolute top-[25%] left-[10%] flex space-y-3 flex-col">
                        <div class="text-2xl font-bold text-white leading-none" v-html="service.name"></div>
                        <div>
                            <a :href="service.link" class="bg-[#2B2F42] rounded px-4 py-2 inline-block text-white font-bold text-center">Order Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>