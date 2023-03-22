<script>
import { getCastStudyDetail } from '../api/api'
import DesignCategoryMenu from '../components/common/DesignCategoryMenu.vue'
import LastestCaseStudy from '../components/home/LastestCaseStudy.vue'

export default {
    components: { LastestCaseStudy, DesignCategoryMenu },
    data() {
        return {
            icons : [
                { title: "facebook" , image: "/images/case/facebook.png" },
                { title: "linkedIn" , image: "/images/case/linkedIn.png" },
                { title: "google" , image: "/images/case/google.png" },
            ],
            caseStudy: {},
            clickToCopy: 'Click to copy link',
            timeout: null,
        }
    },
    computed: {
        currentFullUrl() {
            return window.location.href
        },
        windowz() {
            return window
        }
    },
    async created() {
        const slug = this.$route.params.slug
        const res = await getCastStudyDetail(slug)
        this.caseStudy = res.data;
        document.title = this.caseStudy.title
    },
    methods: {
        getUrlForShare() {
            return `${this.windowz.origin}/case-studies/${this.$route.params.slug}`
        },
        copyLink() {
            if (this.timeout != null) {
                clearTimeout(this.timeout)
                this.timeout = null
            }
            this.copyToClipboard(this.getUrlForShare(), () => {
                this.clickToCopy = 'Link copied!'
                this.timeout = setTimeout(() => {
                    this.clickToCopy = 'Click to copy link'
                }, 3000)
            })
        },
        copyToClipboard(text, success) {
			let input = document.createElement('textarea');
			input.innerHTML = text;
			document.body.appendChild(input);
			input.select();
			document.execCommand('copy');
			document.body.removeChild(input);
			success();
		}
    },
    mounted() {
    }
}
</script>
<template>
    <design-category-menu/>
    <div class="bg-[#E0F9FF] py-6 md:py-12 xl:py-16">
        <div class="mx-auto px-4 xl:px-16 relative md:flex lg:block flex-row-reverse">
            <div class="lg:absolute inline-block mb-6 md:mb-0 left-[50%] pr-4 xl:pr-16 max-h-[450px] overflow-hidden">
                <img :src="caseStudy.thumbnail" class="max-w-full" alt="">
            </div>
            <div class="lg:max-w-[50%] md:pr-10 flex justify-center flex-col">
                <div class="inline-block xl:max-w-[500px]">
                    <p class="font-bold text-lg text-[#5FC3DF] mb-2">Case Study</p>
                    <h1 class="text-2xl xl:text-4xl font-bold text-[#2B2F42] mb-4" v-text="caseStudy.title"></h1>
                </div>
                <div class="flex items-center mt-4">
                    <img :src="caseStudy.author_image" class="w-20 h-20 xl:w-24 xl:h-24 object-cover rounded-full" alt="">
                    <p class="ml-4 font-bold text-sm md:text-lg text-[#2B2F42]">{{ caseStudy.author_name }} <span class="text-[#5FC3DF] ml-4">Author</span></p>
                </div>
            </div>
        </div>
    </div>
    <div class="mx-auto px-4 xl:px-16 mt-6 mb-16 grid grid-cols-1 md:grid-cols-2">
        <div class="flex items-center justify-between md:pr-10">
            <p class="text-[#2B2F42] font-bold text-sm xl:text-lg">Published {{ caseStudy.created_at }}</p>
            <div class="flex items-center">
                <div class="mr-4 last:mr-0">
                    <a :href="`https://www.facebook.com/sharer/sharer.php?u=${getUrlForShare()}`" target="popup"
                        @click="windowz.open(`https://www.facebook.com/sharer/sharer.php?u=${getUrlForShare()}`, caseStudy.title,'width=600,height=400')">
                        <img src="/images/case/facebook.png" class="w-7 xl:w-10" alt="Share to Facebook"/>
                    </a>
                </div>
                <div class="mr-4 last:mr-0">
                    <a :href="`https://www.linkedin.com/sharing/share-offsite/?url=${getUrlForShare()}`" target="_blank">
                        <img src="/images/case/linkedIn.png" class="w-7 xl:w-10" alt="Share to LinkedIn"/>
                    </a>
                </div>
                <div class="mr-4 last:mr-0 relative">
                    <div className="relative flex flex-col items-center group">
                        <button @click="copyLink()">
                            <img src="/images/link.png" class="w-7 xl:w-10"/>
                        </button>
                        <div className="absolute bottom-3 flex-col items-center hidden mb-6 group-hover:flex">
                            <span className="relative z-10 p-2 text-xs leading-none text-white bg-gray-600 shadow-lg rounded-md inline-block whitespace-nowrap">{{ clickToCopy }}</span>
                            <div className="w-3 h-3 -mt-2 rotate-45 bg-gray-600"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mx-auto p-4 xl:px-16">
        <div class="prose prose-img:mx-auto prose-figcaption:hidden max-w-full" v-html="caseStudy.desc"></div>
    </div>
    <div class="mt-8">
        <lastest-case-study label="See more"/>
    </div>
</template>