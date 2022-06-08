<script setup>
import DesignCategoryMenu from '../components/common/DesignCategoryMenu.vue';
import Breadcrum from '../components/item/Breadcrum.vue';
import { store } from '../store'
import BrowseByCategory from '../components/list-item/BrowseByCategory.vue';
import LastestCaseStudy from '../components/home/LastestCaseStudy.vue';
import CaseStudyItem from '../components/item/CaseStudyItem.vue';


let trusteds = [
    { name: "MG", image: "/images/brand/mg.png"},
    { name: "Michelin", image: "/images/brand/michelin.png"},
    { name: "O1", image: "/images/brand/01.png"},
    { name: "100Plus", image: "/images/brand/100plus.png"},
    { name: "Manulife", image: "/images/brand/manulife.png"},
    { name: "Decathlon", image: "/images/brand/decathlon.png"},
]
const caseStudies = [
    { id: 1, name: "Spring Dress Try - On Haul", desc: "This is one of my favorite dress designers (has been for years!). Every detail in this dress (30%…", image: "/images/case/1.png", date: "April 24, 2021", author: "admin" },
    { id: 2, name: "Aliquam vel ante mattis", desc: "Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex. Aenean posuere libero eu augue condimentum…", image: "/images/case/2.png", date: "November 29, 2021", author: "admin" },
    { id: 3, name: "Praesent imperdiet going", desc: "Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex. Aenean posuere libero eu augue condimentum…", image: "/images/case/3.png", date: "July 13, 2021", author: "admin" },
    { id: 4, name: "Spring Dress Try - On Haul", desc: "This is one of my favorite dress designers (has been for years!). Every detail in this dress (30%…", image: "/images/case/1.png", date: "April 24, 2021", author: "admin" },
    { id: 5, name: "Aliquam vel ante mattis", desc: "Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex. Aenean posuere libero eu augue condimentum…", image: "/images/case/2.png", date: "November 29, 2021", author: "admin" },
    { id: 6, name: "Praesent imperdiet going", desc: "Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex. Aenean posuere libero eu augue condimentum…", image: "/images/case/3.png", date: "July 13, 2021", author: "admin" },
    { id: 7, name: "Spring Dress Try - On Haul", desc: "This is one of my favorite dress designers (has been for years!). Every detail in this dress (30%…", image: "/images/case/1.png", date: "April 24, 2021", author: "admin" },
    { id: 8, name: "Aliquam vel ante mattis", desc: "Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex. Aenean posuere libero eu augue condimentum…", image: "/images/case/2.png", date: "November 29, 2021", author: "admin" },
    { id: 9, name: "Praesent imperdiet going", desc: "Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex. Aenean posuere libero eu augue condimentum…", image: "/images/case/3.png", date: "July 13, 2021", author: "admin" },
]
</script>

<template>
	<DesignCategoryMenu/>

    <div class="bg-[#E0F9FF]">
        <div class="max-w-7xl mx-auto py-8 px-4">
            <h2 class="text-center font-bold mb-4 md:text-2xl">Explore how we help big & small businesses</h2>
            <div class="">
                <div class="md:flex justify-between overflow-scroll grid grid-cols-3 gap-3">
                    <div class="flex justify-center items-center" v-for="trusted in trusteds" :key="trusted.name">
                        <img :src="trusted.image" :alt="trusted.name" class="max-w-[96px] md:max-w-[166px]">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto py-8 px-4">

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 snap-x">
            <div v-for="(caseStudy, index) in caseStudies" :key="index">
                <CaseStudyItem :case-study="caseStudy"/>
            </div>
        </div>
    </div>

</template>