
<script>
import { getItemDetail, getListItemByCategory } from '../api/api';
import Breadcrum from '../components/item/Breadcrum.vue';
import { store } from '../store'
import NotFoundVue from './NotFound.vue';
import DesignCategoryMenu from '../components/common/DesignCategoryMenu.vue'
import html2canvas from 'html2canvas'
export default {
    name: "DesignItemDetail",
    components: { Breadcrum, NotFoundVue, DesignCategoryMenu },
    data() {
        return {
            images: [],
            category_slug: null,
            category: {},
            plans: [],
            openTab: 0,
            breadcrumbs : [],
            currentPlan: {
                features: '',
            },
            relatedItems: [],
            title: '',
            contactSaleUrl: '',
            screenshoting: false,
        };
    },
    async created() {
        try {
            const data = (await getItemDetail(this.$route.params.slug)).data

            this.category_slug = data.category.slug
            this.relatedItems = (await getListItemByCategory(this.category_slug, 4)).data
            this.relatedItems = this.relatedItems.filter(it => it.slug != this.$route.params.slug)
            this.breadcrumbs = [
                { title : "All Items", url: '/designs' },
                { title : this.getCategory().name, url: `/categories/${data.category.slug}` },
                { title : data.title, url: '' },
            ]
            document.title = data.title
            this.title = data.title
            this.plans = data.plans
            this.currentPlan = this.plans[this.openTab]
            this.contactSaleUrl = data.contact_sale_url
            this.images = data.images
        } catch (error) {
            console.log(error)
            console.log('Item Detail Error')
        }

    },
    updated() {
        try {
            this.initSlider();
        } catch (error) {

        }
    },
    methods: {
        toggleTabs: function (index) {
            this.openTab = index;
            this.currentPlan = this.plans[this.openTab]
        },
        getCategory() {
            if (this.category.id != null) return this.category;
            this.category = store.categories.find(it => it.slug == this.category_slug) || {}
            return this.category;
        },
        initSlider() {
            $('.slider-single').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                fade: false,
                // adaptiveHeight: true,
                infinite: false,
                useTransform: true,
                speed: 400,
                cssEase: 'cubic-bezier(0.77, 0, 0.18, 1)',
            });

            $('.slider-nav')
                .on('init', function (event, slick) {
                    $('.slider-nav .slick-slide.slick-current').addClass('is-active');
                })
                .slick({
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    dots: false,
                    focusOnSelect: false,
                    infinite: false,
                    arrows: true
                });

            $('.slider-single').on('afterChange', function (event, slick, currentSlide) {
                $('.slider-nav').slick('slickGoTo', currentSlide);
                var currrentNavSlideElem = '.slider-nav .slick-slide[data-slick-index="' + currentSlide + '"]';
                $('.slider-nav .slick-slide.is-active').removeClass('is-active');
                $(currrentNavSlideElem).addClass('is-active');
            });

            $('.slider-nav').on('click', '.slick-slide', function (event) {
                event.preventDefault();
                var goToSingleSlide = $(this).data('slick-index');
                $('.slider-single').slick('slickGoTo', goToSingleSlide);
            });
        },
        async order(item) {
            this.screenshoting = true
            this.$root.$refs.modalOrder.show()
            await new Promise((resolve, reject) => {
                setTimeout(() => {
                    resolve()
                }, 100);
            })
            html2canvas(document.querySelector('#item-detail')).then((canvas) => {
                this.screenshoting = false
                this.$root.$refs.modalOrder.product = `${this.title} (${item.title})`
                this.$root.$refs.modalOrder.image = canvas.toDataURL();
                this.$root.$refs.modalOrder.show()
            });
        },
    },
}
</script>
<template>
	<div v-if="plans.length > 0">
        <design-category-menu/>
        <Breadcrum :bgcolor="getCategory().bg_color" :breadcrumbs="breadcrumbs"
            :description="getCategory().desc"/>
        <div class="px-4 mx-auto mt-14 xl:px-16">
            <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                <div class="mb-12 md:mb-20 lg:mb-0">
                    <div class="mb-3 slider slider-single">
                        <div v-for="image in images">
                            <img :src="image.thumb" class="min-w-full">
                        </div>
                    </div>
                    <div class="slider slider-nav">
                        <div v-for="image in images">
                            <img :src="image.thumb">
                        </div>
                    </div>
                </div>
                <div class="lg:pl-6">
                    <div id="item-detail">
                        <ul class="grid grid-cols-3 mb-0 list-none border-b-0 border-[1px] border-[#DADBDD]">
                            <li v-for="(plan, index) in plans" :key="plan.id" class="flex-auto text-center">
                                <a class="block px-5 py-3 font-bold text-white cursor-pointer hover:opacity-80"
                                    :style="openTab === index ? `background-color: ${getCategory().color};`: `background-color: #FAFAFA;color:#A1A6BF;`"
                                    @click="toggleTabs(index)">
                                    {{ plan.title }}
                                </a>
                            </li>
                        </ul>
                        <div class="bg-white border-[1px] border-[#DADBDD]">
                            <div class="flex-auto px-6 py-10 lg:p-8">
                                <div class="tab-content tab-space">
                                    <div>
                                        <div class="flex items-center justify-between mb-4">
                                            <h4 class="text-[#404145] font-bold text-lg" v-text="currentPlan.sub_title"></h4>
                                            <span class="text-lg font-bold" :style="`color: ${getCategory().color}`" v-text="`${currentPlan.price}`"></span>
                                        </div>
                                        <p class="text-[#62646A] mb-10" v-text="currentPlan.desc"></p>
                                        <div class="grid grid-cols-1 md:grid-cols-2 text-[#2B2F42] font-bold mb-9">
                                            <div class="flex items-center mb-3 md:mb-0">
                                                <img src="/images/item/time-icon.png" class="w-5 xl:w-7 mr-3.5">
                                                <p class="" v-text="currentPlan.delivery_days"></p>
                                            </div>
                                            <div class="flex items-center">
                                                <img src="/images/item/refresh-icon.png" class="w-5 xl:w-7 mr-3.5">
                                                <p class="" v-text="currentPlan.revisions"></p>
                                            </div>
                                        </div>
                                        <ul class="text-[#2B2F42] mb-6">
                                            <li v-for="feature in currentPlan.features.split('\n')" class="flex items-center mb-4 last:mb-0">
                                                <img v-if="feature != ''" src="/images/item/check-icon.png" class="w-4 mr-3 lg:mr-6">
                                                <span v-text="feature"></span>
                                            </li>
                                        </ul>
                                        <div class="justify-between mb-2 text-xs md:flex">
                                            <p class="text-[#959597] mb-3 md:mb-0">Price in US dollars, excludes local tax.</p>
                                            <p class="text-[#959597]">T&C Applied</p>
                                        </div>
                                        <div v-if="!screenshoting" class="grid gap-4 md:grid-cols-2 lg:grid-cols-1">
                                            <button @click="order(currentPlan)"
                                                :style="`background-color: ${getCategory().color}`"
                                                class="py-3 font-bold text-center text-white rounded hover:opacity-80">Order</button>
                                            <a :href="contactSaleUrl"
                                                :style="`color: ${getCategory().color}; background-color: ${getCategory().bg_color}`"
                                                class="block py-3 font-bold text-center rounded hover:opacity-80">Contact Sale</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div v-if="relatedItems.length > 0" class="px-4 py-8 mx-auto xl:px-16">
            <div class="flex items-center justify-between mb-4 md:mb-6">
                <h2 class="font-semibold capitalize md:text-xl" :style="`color: ${category.color}`">{{ category.name }} </h2>
                <a :href="`/categories/${category.slug}`" class="flex items-center space-x-3 hover:animate-bounceX">
                    <span class="font-semibold md:text-xl" :style="`color: ${category.color}`">
                        See more
                    </span>
                    <svg class="w-5 h-5" :fill="category.color" viewBox="0 0 23 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.199951 1.73337C0.199951 0.960107 0.826684 0.333374 1.59995 0.333374C1.83888 0.333374 2.06428 0.393107 2.26075 0.499041L21.3941 10.7657C21.8342 11.0018 22.1333 11.4657 22.1333 12C22.1333 12.5344 21.8342 12.9982 21.3941 13.2344L2.26075 23.501C2.06428 23.607 1.83888 23.6667 1.59995 23.6667C0.826684 23.6667 0.199951 23.04 0.199951 22.2667V1.73337Z"/>
                    </svg>
                </a>
            </div>
            <div class="grid grid-cols-2 gap-2 md:grid-cols-4 md:gap-8 snap-x">
                <div v-for="item in relatedItems" :key="item.id" class="snap-center">
                    <a :href="`/items/${item.slug}`" class="border border-[#EBEBEB] rounded flex flex-col p-3 hover:shadow-lg hover:cursor-pointer">
                        <img :src="item.media" :alt="item.title" class="mb-2">
                        <div class="text-sm text-center">
                            <h2 class="mb-1 font-bold">{{item.title}}</h2>
                            <p class="text-[#999999] mb-2 text-xs">{{item.category.name}} </p>
                            <p class="font-semibold" :style="`color: ${category.color}`">{{item.price}}</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div v-else>
        <NotFoundVue/>
    </div>
</template>
<style>
.slick-arrow {
    top: unset;
    bottom: -50px;
}
.slick-next {
    right: 5px;
}
.slick-prev {
    left: unset;
    right: 50px;
}
.slick-next:before, .slick-prev:before {
    content: "";
    width: 18px;
    height: 18px;
    position: absolute;
    top: 0;
    left: 0;
}
.slick-next:before {
    background-image: url('/images/item/next.png');
    background-repeat: no-repeat;
    background-size: 100% 100%;
}
.slick-prev:before {
    background-image: url('/images/item/prev.png');
    background-repeat: no-repeat;
    background-size: 100% 100%;
}
.slick-slide {
    padding: 0 7px;
}
@media screen and (min-width: 768px) {
    .slick-next:before , .slick-prev:before {
        width: 20px;
        height: 20px;
    }
}
</style>