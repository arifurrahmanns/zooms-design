<script setup>
import TrustedBrand from '../components/common/TrustedBrand.vue';
import HaveQuestion from '../components/common/HaveQuestion.vue';
import DesignCategoryMenu from '../components/common/DesignCategoryMenu.vue';
</script>
<template>
    <div class="">
        <DesignCategoryMenu/>
        <div class="relative px-4 py-8 md:py-12 xl:px-16">
            <div class="absolute z-0 top-0 inset-x-0 h-[50%] bg-[#E0F9FF]"></div>
            <div class="relative">
                <div class="flex justify-center text-center">
                    <h1 class="max-w-2xl text-3xl font-bold leading-10">
                        Make great design <br/>
                        accessible to all businesses
                    </h1>
                </div>
                <div class="mx-auto mt-10 bg-white rounded-sm shadow ">
                    <div class="grid grid-cols-1 p-8 md:grid-cols-3 md:p-12 md:space-x-4">
                        <div>
                            <h2 class="mt-4 mb-8 text-xl font-bold">Affordable services</h2>
                            <p class="text-[#505050]">200+ of our services are created with affordable prices and one vision, to make great graphic design accessible for everyone</p>
                        </div>
                        <div>
                            <h2 class="mt-4 mb-8 text-xl font-bold">Acceptable outcomes</h2>
                            <p class="text-[#505050]">We've worked with hundreds of brands from various fields. Our design focuses on connecting your brand with your audience to ensure that you get what you want</p>
                        </div>
                        <div>
                            <h2 class="mt-4 mb-8 text-xl font-bold">Painless process</h2>
                            <p class="text-[#505050]">Pick-Pay-Pop. As easy as that! No complicated process or contract is involved, We toned it down and keep our workflow as simple as possible</p>
                        </div>
                    </div>
                    <img src="/images/other/about-us.png" alt="" class="w-full">
                </div>
            </div>
        </div>
        <TrustedBrand/>
      
    </div>
</template>  