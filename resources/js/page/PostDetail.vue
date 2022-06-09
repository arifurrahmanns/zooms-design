<script>
import { getCastStudyDetail, getPostDetail } from '../api/api'
import DesignCategoryMenu from '../components/common/DesignCategoryMenu.vue'

export default {
    components: { DesignCategoryMenu },
    data() {
        return {
            icons : [
                { title: "facebook" , image: "/images/case/facebook.png" },
                { title: "linkedIn" , image: "/images/case/linkedIn.png" },
                { title: "google" , image: "/images/case/google.png" },
            ],
            item: {},
        }
    },
    async mounted() {
        const id = this.$route.params.id
        const res = await getPostDetail(id)
        this.item = res.data;
        console.log(res.data)
    }
}
</script>
<template>
    <design-category-menu/>
    <div class="bg-[#E0F9FF] py-6 md:py-12 xl:py-16 lg:pr-4">
        <div class="max-w-7xl mx-auto px-4 relative md:flex lg:block flex-row-reverse">
            <div class="lg:absolute inline-block md:max-w-[50%] md:top-0 md:right-0 mb-6 md:mb-0">
                <img :src="item.thumbnail" class="mx-auto md:max-w-full" alt="">
            </div>
            <div class="lg:max-w-[50%] md:pr-10 flex justify-center flex-col">
                <div class="inline-block xl:max-w-[500px]">
                    <p class="font-bold text-lg text-[#5CD0EB] mb-2">Case Study</p>
                    <h2 class="text-2xl xl:text-4xl font-bold text-[#2B2F42] mb-4" v-text="item.title"></h2>
                </div>
                <div class="flex items-center mt-4">
                    <img :src="item.author_image" class="w-20 xl:w-24 rounded-full" alt="">
                    <p class="ml-4 font-bold text-sm md:text-lg text-[#2B2F42]">{{ item.author_name }} <span class="text-[#5CD0EB] ml-4">Author</span></p>
                </div>
            </div>
        </div>
    </div>
    <div class="max-w-7xl mx-auto px-4 mt-6 mb-16 grid grid-cols-1 md:grid-cols-2">
        <div class="flex items-center justify-between md:pr-10">
            <p class="text-[#2B2F42] font-bold text-sm xl:text-lg">Published {{ item.created_at }}</p>
            <div class="flex items-center">
                <div v-for="icon in icons" class="mr-4 last:mr-0">
                    <img :src="icon.image" class="w-7 xl:w-10" :alt="icon.title">
                </div>
            </div>
        </div>
    </div>
    <div class="max-w-7xl mx-auto p-4">
        <div class="prose prose-img:w-[500px] prose-img:mx-auto max-w-full" v-html="item.desc"></div>
    </div>
    <div class="mt-8">
    </div>
</template>