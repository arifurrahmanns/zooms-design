<style>
.slider-banner .slick-slide {
    padding: 0;
}
.slick-dots li button:before {
    background: #fff;
    content: '';
    opacity: 1;
}
.slick-dots li.slick-active button:before {
    background: #000;
    opacity: 1;
}
.slick-dots li button:before {
    width: 14px;
    height: 14px;
}
</style>
<script setup>
import Discount from '../components/home/Discount.vue'
import TrustedBrand from '../components/common/TrustedBrand.vue';
import ServiceBundle from '../components/home/ServiceBundle.vue';
import ListItem from '../components/home/ListItem.vue';
import LastestCaseStudy from '../components/home/LastestCaseStudy.vue';
import { store } from '../store'
import { getDataForHomePage } from '../api/api';
</script>
<script>
export default {
    data() {
        return {
            search: null,
            bling: false,
            flows: [
                { name: "Pick", desc: "Pick the item that you like" },
                { name: "Pay", desc: "We contact you & settle payment term" },
                { name: "Pop", desc: "The result pops in" },
            ],
            testimonail: [],
            promos: [],
            timeLefts: {},
            bannerImages: [],
            titleBanner: '',
        }
    },
    async created() {
        setInterval(() => {
            this.bling = !this.bling
        }, 500);
        await this.fetchData();
        this.setupTimer();
        this.initSlider();

        let i = 0
        let categoryIndex = 0;
        setInterval(() => {
            let name =  store.categories[categoryIndex].name
            if (this.titleBanner.length == name.length) {
                this.titleBanner = '';
                i = 0
                categoryIndex ++
                if (categoryIndex == store.categories.length) {
                    categoryIndex = 0
                }
                name =  store.categories[categoryIndex].name
            }
            this.titleBanner += name[i]
            i++
        }, 350)

        store.categories.forEach(category => {
            category.name
        });
    },
    methods: {
        searchDesign() {
            if (!this.search) {
                return
            }

            this.$router.push({path: '/items/search', query: {query: this.search.trim()}})
        },
        getTimeLeft(secs) {
            const hours = Math.floor(secs / 3600);
            secs %= 3600;
            const minutes = Math.floor(secs / 60);
            const seconds = Math.floor(secs % 60);
            return {
                hours, minutes, seconds,
            }
        },
        setupTimer() {
            try {
                this.timeLefts = {};
                const today = new Date();
                this.promos.forEach(it => {
                    const timeLeft = new Date(it.deadline).getTime() - today.getTime()
                    if (timeLeft < 0) {
                        this.timeLefts[it.id] = {
                            hours: 0, minutes: 0, seconds: 0,
                        }
                    } else {
                        this.timeLefts[it.id] = this.getTimeLeft(timeLeft / 1000);
                    }
                });
                for (const key in this.timeLefts) {
                    const timeLeft = this.timeLefts[key];
                    if (timeLeft.hours == 0 && timeLeft.minutes == 0 && timeLeft.seconds == 0) {
                        continue;
                    }
                    let interval = setInterval(() => {
                        if (timeLeft.seconds > 0) {
                            timeLeft.seconds --;
                        } else {
                            if (timeLeft.minutes > 0) {
                                timeLeft.seconds = 59
                                timeLeft.minutes --;
                            } else {
                                if (timeLeft.hours > 0) {
                                    timeLeft.minutes = 59;
                                    timeLeft.hours --;
                                } else {
                                    clearInterval(interval)
                                }
                            }
                        }
                    }, 1000)
                }
            } catch (error) {
                console.log('Setup Timer Error',error)
            }
        },
        async fetchData() {
            const data = (await getDataForHomePage()).data
            this.testimonail = data.testis;
            this.promos = data.promos;
            this.bannerImages = data.banner_images;
        },
        initSlider() {
            $('.slider-testi')
                .on('init', function (event, slick) {
                    $('.slider-testi .slick-slide.slick-current').addClass('is-active');
                })
                .slick({
                    slidesToShow: window.innerWidth > 700 ? 2: 1,
                    slidesToScroll: 1,
                    dots: false,
                    focusOnSelect: false,
                    infinite: true,
                    arrows: true,
                    autoplay: true,
                    autoplaySpeed: 5000,
                    cssEase: 'linear',
                    prevArrow: $(".testi-pp2"),
                    nextArrow: $(".testi-nn2"),
                });
            $('.slider-banner')
                .on('init', function (event, slick) {
                    $('.slider-banner .slick-slide.slick-current').addClass('is-active');
                })
                .slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    dots: true,
                    focusOnSelect: false,
                    infinite: true,
                    arrows: false,
                    autoplay: true,
                    autoplaySpeed: 5000,
                    cssEase: 'linear',
                    speed: 1000,
                    fade: true,
                    dotsClass: 'slick-dots bottom-[15px]'
                });
        }
    }
}
</script>

<template>
    <div class="relative">
        <div class="top-0 left-0 min-h-[100px]">
            <div class="slider slider-banner">
                <div v-for="banner in bannerImages" :key="banner">
                    <img :src="banner" alt="Zooms Design" class="w-full aspect-[1920/863]">
                </div>
            </div>
            <div class="absolute top-[25%] left-[10%] md:space-y-3 w-[40%] md:w-[25%]">
                <h1 class="md:text-4xl font-bold">{{ store.home_title.text1 }}</h1>
                <div class="md:text-4xl font-bold"> {{titleBanner }}<span :class="{'opacity-0': bling, }" class="transition-all duration-300 ease-in-out">_</span></div>
                <form @submit.prevent="searchDesign" ref="formSearch" class="relative mt-2">
                    <input type="text" autocomplete="off" v-model="search" class="border-0 bg-white rounded-md px-2 py-1 md:p-5 w-full text-[15px] md:text-base focus:ring-[#5FC3DF]" placeholder="Search">
                    <button type="submit" class="absolute w-6 h-6 top-1 md:w-8 md:h-8 right-1 md:top-4 md:right-3">
                        <img src="/images/icon/search.png" alt="Search">
                    </button>
                </form>
            </div>
        </div>
    </div>
    <div class="py-8"></div>
    <TrustedBrand/>
    <div class="py-8"></div>
    <div class="mx-auto py-8 px-4 xl:px-16">
        <h2 class="font-bold mb-4 md:mb-6 md:text-xl">Categories</h2>
        <div class="grid grid-cols-2 md:grid-cols-5 gap-4 md:gap-8">
            <div v-for="cat in store.categories" :key="cat.name">
                <a :href="`/categories/${cat.slug}`" :style="`background-color: ${cat.bg_color}`" class="rounded aspect-square flex justify-center items-center flex-col space-y-2 hover:shadow-lg">
                    <img :src="cat.image" :alt="cat.name" class="max-w-[60px]">
                    <div class="font-bold capitalize text-center">
                        {{ cat.name }}
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="py-8"></div>

    <!-- Service bundle -->
    <ServiceBundle />
    <div class="py-4"></div>

    <div class="mx-auto py-8 px-4 xl:px-16">
        <div class="grid grid-cols-2 md:grid-cols-3 bg-[#2B2F42] rounded-lg px-4 sm:px-16">
            <div class="flex py-4 sm:py-12 space-x-4 items-start justify-start sm:justify-center" v-for="(flow, index) in flows" :key="index">
                <div class="text-[#5FC3DF] text-5xl font-bold">{{index + 1}}</div>
                <div >
                    <div class="text-white font-bold mb-1">{{flow.name}}</div>
                    <div class="text-white/75 text-sm font-light" v-html="flow.desc">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-8"></div>

    <Discount :items="promos" :timeLefts="timeLefts"/>
    <div class="py-8"></div>

    <div class="mx-auto py-8 px-4 xl:px-16">
        <div class="flex justify-between items-center mb-4 md:mb-6">
            <h2 class="font-bold md:text-xl">Why people love zooms design</h2>
            <div class="flex space-x-2">
                <button class="testi-pp2">
                    <svg class="w-5 h-5" fill="#A1A6BF" viewBox="0 0 23 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M22.8 22.2666C22.8 23.0399 22.1733 23.6666 21.4 23.6666C21.1611 23.6666 20.9357 23.6069 20.7392 23.501L1.60591 13.2343C1.16585 12.9982 0.866715 12.5343 0.866715 12C0.866716 11.4656 1.16585 11.0018 1.60591 10.7656L20.7393 0.498962C20.9357 0.393028 21.1611 0.333296 21.4001 0.333296C22.1733 0.333296 22.8001 0.96003 22.8001 1.7333L22.8 22.2666Z"/>
                    </svg>
                </button>
                <button class="testi-nn2">
                    <svg class="w-5 h-5" fill="#0F1137" viewBox="0 0 23 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.199951 1.73337C0.199951 0.960107 0.826684 0.333374 1.59995 0.333374C1.83888 0.333374 2.06428 0.393107 2.26075 0.499041L21.3941 10.7657C21.8342 11.0018 22.1333 11.4657 22.1333 12C22.1333 12.5344 21.8342 12.9982 21.3941 13.2344L2.26075 23.501C2.06428 23.607 1.83888 23.6667 1.59995 23.6667C0.826684 23.6667 0.199951 23.04 0.199951 22.2667V1.73337Z"/>
                    </svg>
                </button>
            </div>
        </div>
        <div class="slider slider-testi">
            <div v-for="(testi, index) in testimonail" :key="index" class="px-2">
                <div class="border rounded-lg flex space-x-4 px-8 py-12">
                    <img :src="testi.image" alt="" class="w-[75px] h-[75px] rounded-full">
                    <div class="space-y-2">
                        <h2 class="font-bold">{{ testi.name }}</h2>
                        <p class="text-[#626262]">{{ testi.description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-8"></div>

    <div class="mx-auto py-8 px-4 xl:px-16">
        <h2 class="font-bold mb-4 md:text-xl">We design with your favourite applications</h2>
        <div class="">
            <div class="lg:flex justify-between overflow-scroll grid grid-cols-3 md:grid-cols-5 gap-3 scrollbar-hide">
                <div class="flex justify-center items-center"><img src="/images/application/canva.png" class="max-w-[100px] sm:max-w-[144px]"></div>
                <div class="flex justify-center items-center"><img src="/images/application/ps.png" class="max-w-[100px] sm:max-w-[144px]"></div>
                <div class="flex justify-center items-center"><img src="/images/application/ai.png" class="max-w-[100px] sm:max-w-[144px]"></div>
                <div class="flex justify-center items-center"><img src="/images/application/id.png" class="max-w-[100px] sm:max-w-[144px]"></div>
                <div class="flex justify-center items-center"><img src="/images/application/ae.png" class="max-w-[100px] sm:max-w-[144px]"></div>
                <div class="flex justify-center items-center"><img src="/images/application/pwp.png" class="max-w-[100px] sm:max-w-[144px]"></div>
                <div class="flex justify-center items-center"><img src="/images/application/page.png" class="max-w-[100px] sm:max-w-[144px]"></div>
                <div class="flex justify-center items-center"><img src="/images/application/figma.png" class="max-w-[100px] sm:max-w-[144px]"></div>
            </div>
        </div>
    </div>
    <div class="py-8"></div>

    <!-- Popular item -->
    <ListItem />
    <div class="py-8"></div>
    <!-- Case studies -->
    <LastestCaseStudy />
    <div class="py-8"></div>
</template>