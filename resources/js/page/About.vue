<script setup>
import TrustedBrand from '../components/common/TrustedBrand.vue';
import HaveQuestion from '../components/common/HaveQuestion.vue';
</script>
<template>
    <div>
        <div class="py-8 md:py-12 relative">
            <div class="absolute z-0 top-0 inset-x-0 h-[50%] bg-[#E0F9FF]"></div>
            <div class="relative">
                <div class="flex justify-center text-center">
                    <h1 class="text-3xl font-bold leading-10 max-w-2xl">A mission to make sure all businesses are accessible to great design</h1>
                </div>
                <div class="md:w-[80%] bg-white mx-auto mt-10 rounded-sm shadow">
                    <div class="grid grid-cols-1 md:grid-cols-3 p-8 md:p-12 md:space-x-4">
                        <div>
                            <h2 class="font-bold text-xl mb-8 mt-4">Founded in 2019</h2>
                            <p class="text-[#505050]">We have a mission, aims to solve the problem of costly professional graphic design services by providing the high-quality design that is accessible to everyone.</p>
                        </div>
                        <div>
                            <h2 class="font-bold text-xl mb-8 mt-4">The Application</h2>
                            <p class="text-[#505050]">All users get access to web-application to facilitate tasks assigning, and dedicated designers to make the best fit with your needs.</p>
                        </div>
                        <div>
                            <h2 class="font-bold text-xl mb-8 mt-4">Social vision</h2>
                            <p class="text-[#505050]">Provide employment and training opportunities for youths in need, design a well-structured training program to improve their designing.</p>
                        </div>
                    </div>
                    <img src="/images/other/footer-1.png" alt="" class="w-full">
                </div>
            </div>
        </div>
        <TrustedBrand/>
        <HaveQuestion />
    </div>
</template>