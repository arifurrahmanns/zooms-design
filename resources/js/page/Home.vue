<script setup>
import Discount from '../components/home/Discount.vue'
import TrustedBrand from '../components/common/TrustedBrand.vue';
import ServiceBundle from '../components/home/ServiceBundle.vue';
import ListItem from '../components/home/ListItem.vue';
import LastestCaseStudy from '../components/home/LastestCaseStudy.vue';
let categories = [
    { name: "Design", bgColor: "#FFE9EA", image: "/images/design/design.png"},
    { name: "Design", bgColor: "#5CD0EB", image: "/images/design/design-white.png"},
    { name: "Security", bgColor: "#FFF8E8", image: "/images/design/security.png"},
    { name: "Research", bgColor: "#FFEACC", image: "/images/design/research.png"},
    { name: "Gaming", bgColor: "#F2F4FC", image: "/images/design/gaming.png"},
    { name: "Design", bgColor: "#E5E5E5", image: "/images/design/design-gray.png"},
    { name: "Design", bgColor: "#F0FFE7", image: "/images/design/design-green.png"},
    { name: "Security", bgColor: "#FFEAF4", image: "/images/design/security-red.png"},
    { name: "Research", bgColor: "#E0F9FF", image: "/images/design/research-blue.png"},
    { name: "Gaming", bgColor: "#FFF8E8", image: "/images/design/gaming-yellow.png"},
];


let services = [
    { name: "Item #1<br> name", image: "/images/service/1.png", link: "/" },
    { name: "Item #2<br> name", image: "/images/service/2.png", link: "/" },
    { name: "Item #3<br> name", image: "/images/service/3.png", link: "/" },
    { name: "Item #1<br> name", image: "/images/service/1.png", link: "/" },
    { name: "Item #2<br> name", image: "/images/service/2.png", link: "/" },
    { name: "Item #3<br> name", image: "/images/service/3.png", link: "/" },
]

let flows = [
    { name: "Pick items", desc: "On all orders over<br> $75.00" },
    { name: "Checkout", desc: "On all orders over<br> $75.00" },
    { name: "Submit requirment", desc: "On all orders over<br> $75.00" },
    { name: "Get your design", desc: "On all orders over<br> $75.00" },
]


</script>

<template>
    <div class="relative">
        <div class="top-0 left-0">
            <img src="/images/banner/banner1.png" alt="I want to design" class="w-full object-cover">
            <div class="absolute top-[25%] left-[10%] md:space-y-3 w-[40%] md:w-[25%]">
                <h1 class="md:text-3xl font-bold">I want to design</h1>
                <div class="md:text-3xl font-bold text-[#5CD0EB]">product label_</div>
                <div class="relative mt-2">
                    <input type="text" autocomplete="off" name="search" class="border-0 bg-white rounded-md px-2 py-1 md:p-4 w-full text-[15px] md:text-base" placeholder="Search">
                    <button class="absolute w-6 h-6 top-1 md:w-8 md:h-8 right-1 md:top-3 md:right-3">
                        <img src="/images/icon/search.png" alt="Search" class="">
                    </button>
                </div>
            </div>
        </div>
    </div>
    <TrustedBrand/>
    <div class="max-w-7xl mx-auto py-8 px-4">
        <h2 class="font-bold mb-4 md:mb-6 md:text-xl">Design Categories</h2>
        <div class="grid grid-cols-2 md:grid-cols-5 gap-4 md:gap-8">
            <div v-for="cat in categories" :key="cat.name">
                <a href="#" :style="`background-color: ${cat.bgColor}`" class="rounded aspect-square flex justify-center items-center flex-col space-y-2 hover:shadow-lg">
                    <img :src="cat.image" :alt="cat.name" class="max-w-[60px]">
                    <div class="font-bold">
                        {{ cat.name }}
                    </div>
                </a>
            </div>
        </div>
    </div>

    <!-- Service bundle -->
    <ServiceBundle />

    <div class="max-w-7xl mx-auto py-8 px-4">
        <div class="grid grid-cols-2 md:grid-cols-4 bg-[#2B2F42] rounded-lg px-16">
            <div class="flex py-12 space-x-4 items-start justify-center" v-for="(flow, index) in flows" :key="index">
                <div class="text-[#5CD0EB] text-5xl font-bold">{{index + 1}}</div>
                <div >
                    <div class="text-white font-bold mb-1">{{flow.name}}</div>
                    <div class="text-white/75 text-sm font-light" v-html="flow.desc">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <Discount/>

    <div class="max-w-7xl mx-auto py-8 px-4">
        <div class="flex justify-between items-center mb-4 md:mb-6">
            <h2 class="font-bold md:text-xl">Why people love zooms design</h2>
            <div class="flex space-x-2">
                <button class="">
                    <svg class="w-5 h-5" fill="#A1A6BF" viewBox="0 0 23 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M22.8 22.2666C22.8 23.0399 22.1733 23.6666 21.4 23.6666C21.1611 23.6666 20.9357 23.6069 20.7392 23.501L1.60591 13.2343C1.16585 12.9982 0.866715 12.5343 0.866715 12C0.866716 11.4656 1.16585 11.0018 1.60591 10.7656L20.7393 0.498962C20.9357 0.393028 21.1611 0.333296 21.4001 0.333296C22.1733 0.333296 22.8001 0.96003 22.8001 1.7333L22.8 22.2666Z"/>
                    </svg>
                </button>
                <button class="">
                    <svg class="w-5 h-5" fill="#0F1137" viewBox="0 0 23 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.199951 1.73337C0.199951 0.960107 0.826684 0.333374 1.59995 0.333374C1.83888 0.333374 2.06428 0.393107 2.26075 0.499041L21.3941 10.7657C21.8342 11.0018 22.1333 11.4657 22.1333 12C22.1333 12.5344 21.8342 12.9982 21.3941 13.2344L2.26075 23.501C2.06428 23.607 1.83888 23.6667 1.59995 23.6667C0.826684 23.6667 0.199951 23.04 0.199951 22.2667V1.73337Z"/>
                    </svg>
                </button>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 snap-x">
            <div class="border rounded-lg flex space-x-4 px-8 py-12">
                <img src="/images/avatar/avatar1.png" alt="" class="w-[75px] h-[75px] rounded-full">
                <div class="space-y-2">
                    <h2 class="font-bold">Sandy Wilcke</h2>
                    <p class="text-[#626262]">Having produce delivered to your home or office on a set frequency is essential to obtaining the recommended daily servings of fruits and vegetables.</p>
                </div>
            </div>
            <div class="border rounded-lg flex space-x-4 px-8 py-12">
                <img src="/images/avatar/avatar2.png" alt="" class="w-[75px] h-[75px] rounded-full">
                <div class="space-y-2">
                    <h2 class="font-bold">Marcosinacioluz</h2>
                    <p class="text-[#626262]">Each delivery comes with the option to view and make changes to the items in your delivery. Also use your Never Send List to omit items you don’t want.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto py-8 px-4">
        <h2 class="font-bold mb-4 md:text-xl">We design with your favourite applications</h2>
        <div class="">
            <div class="lg:flex justify-between overflow-scroll grid grid-cols-3 md:grid-cols-5 gap-3">
                <div class="flex justify-center items-center"><img src="/images/application/canva.png" class="max-w-[96px]"></div>
                <div class="flex justify-center items-center"><img src="/images/application/ps.png" class="max-w-[96px]"></div>
                <div class="flex justify-center items-center"><img src="/images/application/ai.png" class="max-w-[96px]"></div>
                <div class="flex justify-center items-center"><img src="/images/application/id.png" class="max-w-[96px]"></div>
                <div class="flex justify-center items-center"><img src="/images/application/ae.png" class="max-w-[96px]"></div>
                <div class="flex justify-center items-center"><img src="/images/application/pwp.png" class="max-w-[96px]"></div>
                <div class="flex justify-center items-center"><img src="/images/application/page.png" class="max-w-[96px]"></div>
                <div class="flex justify-center items-center"><img src="/images/application/figma.png" class="max-w-[96px]"></div>
            </div>
        </div>
    </div>

    <!-- Popular item -->
    <ListItem />
    <!-- Case studies -->

    <LastestCaseStudy />
</template>