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
    /* display: flex;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 0.8rem; */
}
@media screen and (min-width: 768px) {
    .slick-next:before , .slick-prev:before {
        width: 20px;
        height: 20px;
    }
}
</style>
<script>
import Breadcrum from '../components/item/Breadcrum.vue';
export default {
    name: "pink-tabs",
    data() {
        return {
            images: [
                {
                    id: "1",
                    thumb: "/images/item/9.jpg"
                },
                {
                    id: "2",
                    thumb: "/images/item/10.jpg"
                },
                {
                    id: "3",
                    thumb: "/images/item/11.jpg"
                },
                {
                    id: "4",
                    thumb: "/images/item/12.jpg"
                },
                {
                    id: "5",
                    thumb: "/images/item/12.jpg"
                },
                {
                    id: "6",
                    thumb: "/images/item/12.jpg"
                },
                {
                    id: "7",
                    thumb: "/images/item/12.jpg"
                },
                {
                    id: "8",
                    thumb: "/images/item/12.jpg"
                },
                {
                    id: "9",
                    thumb: "/images/item/12.jpg"
                },
                {
                    id: "10",
                    thumb: "/images/item/12.jpg"
                }
            ],
            tabs: [
                { id: 1, title: "Basic" },
                { id: 2, title: "Standard" },
                { id: 3, title: "Pro" },
            ],
            lists: [
                { contend: "Source files provided" },
                { contend: "JPG, PDF, PNG, Adobe Illustrator" },
                { contend: "1 option design" },
            ],
            openTab: 1,
            breadcrumbs : [
                { title : "All Items" },
                { title : "logo & branding" },
                { title : "logo design" },
            ],
        };
    },
    methods: {
        toggleTabs: function (tabNumber) {
            this.openTab = tabNumber;
        },
    },
    components: { Breadcrum }
}
$(document).ready(function () {
    $('.slider-single').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: false,
        adaptiveHeight: true,
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
});
</script>
<template>
	<Breadcrum :bgcolor="'#FFEAF4'" :breadcrumbs="breadcrumbs"/>
    <div class="max-w-7xl mx-auto px-4 mt-14">
        <div class="grid gap-4 grid-cols-1 lg:grid-cols-2">
            <div class="mb-12 md:mb-20 lg:mb-0">
                <div class="slider slider-single mb-3">
                    <div v-for="image in images">
                        <img :src="image.thumb">
                    </div>
                </div>
                <div class="slider slider-nav">
                    <div v-for="image in images">
                        <img :src="image.thumb">
                    </div>
                </div>
            </div>
            <div class="lg:pl-6">
                <ul class="grid grid-cols-3 mb-0 list-none border-b-0 border-[1px] border-[#DADBDD]">
                    <li v-for="tab in tabs" :key="tab.id" class="flex-auto text-center">
                        <a class="font-bold active:text-white hover:text-[#5CD0EB] px-5 block py-3 cursor-pointer" v-on:click="toggleTabs(tab.id)" v-bind:class="{'text-[#A1A6BF] bg-[#FAFAFA]': openTab !== tab.id, 'text-white bg-[#FC666F]': openTab === tab.id}">
                            {{ tab.title }}
                        </a>
                    </li>
                </ul>
                <div class="bg-white border-[1px] border-[#DADBDD]">
                    <div class="px-6 lg:p-8 py-10 flex-auto">
                        <div class="tab-content tab-space">
                            <div v-bind:class="{'hidden': openTab !== 1, '': openTab === 1}">
                                <div class="flex justify-between items-center mb-4">
                                    <h4 class="text-[#404145] font-bold text-lg">Single logo design</h4>
                                    <span class="text-lg text-[#FC666F] font-bold">$390</span>
                                </div>
                                <p class="text-[#62646A] mb-10">
                                    Outlined, no backgrounds. One page with 1 frame of rough black and white sketch, not details.
                                </p>
                                <div class="grid grid-cols-1 md:grid-cols-2 text-[#2B2F42] font-bold mb-9">
                                    <div class="flex items-center mb-3 md:mb-0">
                                        <img src="/images/item/time-icon.png" class="w-5 xl:w-7 mr-3.5" alt="3 Days Delivery">
                                        <p class="">3 Days Delivery</p>
                                    </div>
                                    <div class="flex items-center">
                                        <img src="/images/item/refresh-icon.png" class="w-5 xl:w-7 mr-3.5" alt="Unlimited Revisions">
                                        <p class="">Unlimited Revisions</p>
                                    </div>
                                </div>
                                <ul class="text-[#2B2F42] mb-6">
                                    <li v-for="list in lists" class="flex items-center mb-4 last:mb-0">
                                        <img src="/images/item/check-icon.png" class="w-4 mr-3 lg:mr-6" alt="{{ list.contend }}">
                                        <span>{{ list.contend }}</span>
                                    </li>
                                </ul>
                                <div class="md:flex justify-between text-xs mb-2">
                                    <p class="text-[#959597] mb-3 md:mb-0">Price in US dollars, excludes local tax.</p>
                                    <p class="text-[#959597]">T&C Applied</p>
                                </div>
                                <div class="grid md:grid-cols-2 lg:grid-cols-1 gap-4">
                                    <a href="#" class="text-center text-white font-bold bg-[#FC666F] hover:bg-[#e8787e] p-2 rounded">Order</a>
                                    <a href="#" class="block text-center text-[#FC666F] font-bold bg-[#FFE9EA] hover:bg-[#f3d3d3] p-2 rounded">Contact Sale</a>
                                </div>
                            </div>
                            <div v-bind:class="{'hidden': openTab !== 2, '': openTab === 2}">
                                <div class="flex justify-between items-center mb-4">
                                    <h4 class="text-[#404145] font-bold text-lg md:text-2xl">Single logo design</h4>
                                    <span class="text-2xl lg:text-4xl text-[#FC666F] font-bold">$390</span>
                                </div>
                            </div>
                            <div v-bind:class="{'hidden': openTab !== 3, '': openTab === 3}">
                                <div class="flex justify-between items-center mb-4">
                                    <h4 class="text-[#404145] font-bold text-lg md:text-2xl">Single logo design</h4>
                                    <span class="text-2xl lg:text-4xl text-[#FC666F] font-bold">$390</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>