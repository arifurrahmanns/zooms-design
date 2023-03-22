
<template>
    <div class="mx-auto py-8 px-4 xl:px-16">
        <div class="mb-4 md:mb-6">
            <h2 class="font-bold md:text-xl" v-text="label || 'Case study'"></h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 snap-x">
            <div v-for="caseStudy in caseStudies" :key="caseStudy.id" class="">
                <CaseStudyItem :case-study="caseStudy"/>
            </div>
        </div>
    </div>
</template>
<script>
import { getListCaseStudy } from '../../api/api';
import CaseStudyItem from '../item/CaseStudyItem.vue'
export default {
    props: ['label'],
    data() {
        return {
            caseStudies: []
        };
    },
    components: { CaseStudyItem },
    async mounted() {
        const data = await getListCaseStudy({limit: 3})
        this.caseStudies = data.data
    }
}
</script>