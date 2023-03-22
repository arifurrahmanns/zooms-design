<script>
import html2canvas from 'html2canvas'
export default {
    props: ['items', 'timeLefts'],
    data() {
        return {
        }
    },
    created() {

    },
    updated() {
        try {
            this.initSlider()
        } catch (error) { }
    },
    methods: {
        initSlider() {
            $('.slider-promo')
                .on('init', function (event, slick) {
                    $('.slider-promo .slick-slide.slick-current').addClass('is-active');
                })
                .slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    dots: true,
                    focusOnSelect: false,
                    infinite: false,
                    arrows: false,
                    autoplay: true,
                    autoplaySpeed: 5000,
                    cssEase: 'linear',
                    prevArrow: $(".testi-pp2"),
                    nextArrow: $(".testi-nn2"),
                    dotsClass: 'slick-dots bottom-[15px]'
                });
        },
        async order(item) {
            this.screenshoting = true
            this.$root.$refs.modalOrderPromotion.show()
            await new Promise((resolve, reject) => {
                setTimeout(() => {
                    resolve()
                }, 100);
            })
            html2canvas(document.querySelector('.slider-promo')).then((canvas) => {
                this.screenshoting = false
                this.$root.$refs.modalOrderPromotion.product = `${item.title}`
                this.$root.$refs.modalOrderPromotion.image = canvas.toDataURL();
                this.$root.$refs.modalOrderPromotion.show()
            });
        },
    }
}
</script>

<template>
    <div class="slider slider-promo">
        <div v-for="(item, i) in items" :key="item.id" class="relative">
            <div class="top-0 left-0">
                <img :src="item.image" alt="I want to design" class="w-full object-cover">
                <div class="absolute top-[2%] md:top-[10%] lg:top-[20%] right-[10%] md:right-[20%] w-[40%] md:w-[30%] lg:w-[20%]">
                    <h1 class="text-lg md:text-3xl lg:text-6xl font-bold md:mb-5" style="mix-blend: different;">{{ item.title }}</h1>
                    <div class="mb-2 md:mb-5 text-[11px] md:text-base">
                        {{ item.description }}
                    </div>
                    <div class="grid grid-cols-3 gap-2 mb-2 md:mb-8">
                        <div class="border border-[#5FC3DF] rounded text-center md:p-2">
                            <div class="text-[#5FC3DF] font-bold md:text-2xl">{{ timeLefts[item.id] ? timeLefts[item.id].hours: 0 }}</div>
                            <div class="text-xs md:text-base">HOURS</div>
                        </div>
                        <div class="border border-[#5FC3DF] rounded text-center md:p-2">
                            <div class="text-[#5FC3DF] font-bold md:text-2xl">{{ timeLefts[item.id] ? timeLefts[item.id].minutes: 0 }}</div>
                            <div class="text-xs md:text-base">MINS</div>
                        </div>
                        <div class="border border-[#5FC3DF] rounded text-center md:p-2">
                            <div class="text-[#5FC3DF] font-bold md:text-2xl">{{ timeLefts[item.id] ? timeLefts[item.id].seconds: 0 }}</div>
                            <div class="text-xs md:text-base">SECS</div>
                        </div>
                    </div>
                    <div>
                        <!--<button @click="order(item)" class="bg-[#2B2F42] text-white font-bold rounded-lg px-2 py-1 md:px-10 md:py-3">ORDER NOW</button>-->
                        <a href="https://halloween.zooms.design" class="bg-[#2B2F42] text-white font-bold rounded-lg px-2 py-1 md:px-10 md:py-3">ORDER NOW</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>