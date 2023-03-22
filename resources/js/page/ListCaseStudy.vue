<script setup>
import DesignCategoryMenu from '../components/common/DesignCategoryMenu.vue';
import Breadcrum from '../components/item/Breadcrum.vue';
import { store } from '../store'
import BrowseByCategory from '../components/list-item/BrowseByCategory.vue';
import LastestCaseStudy from '../components/home/LastestCaseStudy.vue';
import CaseStudyItem from '../components/item/CaseStudyItem.vue';
import { getListCaseStudy } from '../api/api';

</script>
<script>
export default {
    data() {
        return {
            trusteds: [
            ],
            caseStudies: [],
        }
    },
    async mounted() {
        const data = await getListCaseStudy({limit: 50})
        this.caseStudies = data.data
        console.log(this.caseStudies)
    }
}
</script>

<template>
	<DesignCategoryMenu/>

    <div class="bg-[#E0F9FF]">
        <div class="mx-auto py-8 px-4 xl:px-16">
            <h2 class="text-center font-bold my-4 md:text-2xl">Explore how we help big & small businesses</h2>
        </div>
    </div>

    <div class="mx-auto py-8 px-4 xl:px-16">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 snap-x">
            <div v-for="(caseStudy, index) in caseStudies" :key="index">
                <CaseStudyItem :case-study="caseStudy"/>
            </div>
        </div>
    </div>

</template>