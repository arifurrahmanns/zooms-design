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
        <div class="mx-auto py-8 px-4 xl:px-16">
            <h2 class="text-center font-bold my-4 md:text-2xl">Tips, trends and tons of inspiration</h2>
        </div>
    </div>

    <div class="mx-auto py-8 px-4 xl:px-16">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 snap-x">
            <div v-for="(item, index) in items" :key="index">
                <post-item :post="item"/>
            </div>
        </div>
    </div>

</template>