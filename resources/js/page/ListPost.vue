<script setup>
import DesignCategoryMenu from '../components/common/DesignCategoryMenu.vue';
import Breadcrum from '../components/item/Breadcrum.vue';
import { store } from '../store'
import BrowseByCategory from '../components/list-item/BrowseByCategory.vue';
import LastestCaseStudy from '../components/home/LastestCaseStudy.vue';
import { getListCaseStudy, getListPost } from '../api/api';
import PostItem from '../components/item/PostItem.vue'

</script>
<script>
export default {
    data() {
        return {
            trusteds: [
                { name: "MG", image: "/images/brand/mg.png"},
                { name: "Michelin", image: "/images/brand/michelin.png"},
                { name: "O1", image: "/images/brand/01.png"},
                { name: "100Plus", image: "/images/brand/100plus.png"},
                { name: "Manulife", image: "/images/brand/manulife.png"},
                { name: "Decathlon", image: "/images/brand/decathlon.png"},
            ],
            items: [],
        }
    },
    async mounted() {
        const data = await getListPost({limit: 50})
        this.items = data.data
        console.log(this.items)
    }
}
</script>

<template>
	<DesignCategoryMenu/>

    <div class="bg-[#E0F9FF]">
        <div class="max-w-7xl mx-auto py-8 px-4">
            <h2 class="text-center font-bold mb-4 md:text-2xl">Tips, trends and tons of inspiration</h2>
            <!-- <div class="">
                <div class="md:flex justify-between overflow-scroll grid grid-cols-3 gap-3">
                    <div class="flex justify-center items-center" v-for="trusted in trusteds" :key="trusted.name">
                        <img :src="trusted.image" :alt="trusted.name" class="max-w-[96px] md:max-w-[166px]">
                    </div>
                </div>
            </div> -->
        </div>
    </div>

    <div class="max-w-7xl mx-auto py-8 px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 snap-x">
            <div v-for="(item, index) in items" :key="index">
                <post-item :post="item"/>
            </div>
        </div>
    </div>

</template>