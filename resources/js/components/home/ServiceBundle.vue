<script setup>
import { store } from '../../store'
</script>
<script>
export default {
    data() {
        return {
        }
    },
    mounted() {
    },
    updated() {
        try {
        this.initSlider()
        } catch (error) {

        }
    },
    methods: {
        initSlider() {
            $('.slider-nav')
                .on('init', function (event, slick) {
                    $('.slider-nav .slick-slide.slick-current').addClass('is-active');
                })
                .slick({
                    slidesToShow: window.innerWidth > 700 ? 3: 1,
                    slidesToScroll: 1,
                    dots: false,
                    focusOnSelect: false,
                    infinite: false,
                    arrows: true,
                    prevArrow: $(".pp2"),
                    nextArrow: $(".nn2"),
                });
        },
        order(bundle) {
            this.$root.$refs.modalOrder.product = bundle.title
            this.$root.$refs.modalOrder.show()
        },
    },
}
</script>

<template>
    <div class="mx-auto py-8 px-4 xl:px-16">
        <div class="flex justify-between items-center mb-4 md:mb-6">
            <h2 class="font-bold md:text-xl">Service Bundle, SAVE  MORE!</h2>

            <div class="flex space-x-2">
                <button class="pp2">
                    <svg class="w-5 h-5" fill="#A1A6BF" viewBox="0 0 23 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M22.8 22.2666C22.8 23.0399 22.1733 23.6666 21.4 23.6666C21.1611 23.6666 20.9357 23.6069 20.7392 23.501L1.60591 13.2343C1.16585 12.9982 0.866715 12.5343 0.866715 12C0.866716 11.4656 1.16585 11.0018 1.60591 10.7656L20.7393 0.498962C20.9357 0.393028 21.1611 0.333296 21.4001 0.333296C22.1733 0.333296 22.8001 0.96003 22.8001 1.7333L22.8 22.2666Z"/>
                    </svg>
                </button>
                <button class="nn2">
                    <svg class="w-5 h-5" fill="#0F1137" viewBox="0 0 23 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.199951 1.73337C0.199951 0.960107 0.826684 0.333374 1.59995 0.333374C1.83888 0.333374 2.06428 0.393107 2.26075 0.499041L21.3941 10.7657C21.8342 11.0018 22.1333 11.4657 22.1333 12C22.1333 12.5344 21.8342 12.9982 21.3941 13.2344L2.26075 23.501C2.06428 23.607 1.83888 23.6667 1.59995 23.6667C0.826684 23.6667 0.199951 23.04 0.199951 22.2667V1.73337Z"/>
                    </svg>
                </button>
            </div>
        </div>
        <div>
            <div class="slider slider-nav">
                <div v-for="service in store.bundleServices" :key="service.id" class="relative">
                    <img :src="service.image" :alt="service.title" class="">
                    <div class="absolute top-[25%] left-[10%] flex space-y-3 flex-col">
                        <div class="text-2xl font-bold text-white leading-none" v-html="service.title"></div>
                        <div>
                            <a :href="service.link"
                                class="bg-[#2B2F42] rounded px-4 py-2 inline-block text-white font-bold text-center">
                                Order Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>