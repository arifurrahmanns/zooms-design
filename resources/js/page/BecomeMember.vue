<script setup>
import HaveQuestion from '../components/common/HaveQuestion.vue';
import {getDataForPageBecomeMember } from '../api/api'
import {ref} from 'vue'
import DesignCategoryMenu from '../components/common/DesignCategoryMenu.vue';

const data = (await getDataForPageBecomeMember()).data
const imageLeft = ref(data.image_left)
const imageRight = ref(data.image_right)

</script>
<template>
    <div>
        <DesignCategoryMenu/>
        <div class="py-8 md:py-12 relative">
            <div class="absolute z-0 top-0 inset-x-0 h-[50%] bg-[#E0F9FF]"></div>
            <div class="relative">
                <div class="flex justify-center text-center">
                    <h1 class="text-3xl font-bold leading-10 max-w-2xl">
                        Join our MEMBERSHIP today<br/> to get MORE!
                    </h1>
                </div>
                <!-- Mobile -->
                <div class="md:hidden w-[90%] bg-white mx-auto mt-10 rounded-sm shadow">
                    <div class="p-8">
                        <div class="text-center text-xl font-bold mt-2 mb-8">There are two types of membership</div>
                        <div class="space-y-3">
                            <div>
                                <h2 class="font-bold text-xl text-[#5FC3DF] uppercase mb-4">BLUE CARD</h2>
                                <p class="text-[#505050]">Life time membership, no monthly fee, get 10% of every order and more.</p>
                            </div>
                            <img :src="imageLeft" alt="" class="max-w-[300px]">
                            <button @click="this.$root.$refs.modalContact.show()" class=" inline-block bg-[#5FC3DF] hover:opacity-90 text-white font-bold rounded px-8 py-2 text-center">Contact Sale</button>
                            <div class="space-y-2">
                                <div class="flex items-center">
                                    <img src="/images/icon/check.png" alt="" class="w-4 h-4">
                                    <div class="ml-2">90+ graphic design services</div>
                                </div>
                                <div class="flex items-center">
                                    <img src="/images/icon/check.png" alt="" class="w-4 h-4">
                                    <div class="ml-2">Priority support</div>
                                </div>
                                <div class="flex items-center">
                                    <img src="/images/icon/check.png" alt="" class="w-4 h-4">
                                    <div class="ml-2 text-[#5FC3DF] font-semibold">10% OFF of every order</div>
                                </div>
                                <div class="flex items-center">
                                    <img src="/images/icon/check.png" alt="" class="w-4 h-4">
                                    <div class="ml-2">Member only special offer</div>
                                </div>
                            </div>
                        </div>
                        <div class="h-[1px] bg-[#505050] mt-8"></div>
                        <div class="space-y-3 mt-8">
                            <div>
                                <h2 class="font-bold text-xl text-[#2B2F42] uppercase mb-4">BLACK CARD</h2>
                                <p class="text-[#505050]">Life time membership, no monthly fee, get 15% OFF of every order, and more benefit without extra charge.</p>
                            </div>
                            <img :src="imageRight" alt="" class="max-w-[300px]">
                            <button @click="this.$root.$refs.modalContact.show()" class=" inline-block bg-[#2B2F42] hover:opacity-90 text-white font-bold rounded px-8 py-2 text-center">Contact Sale</button>
                            <div class="space-y-2">
                                <div class="flex items-center">
                                    <img src="/images/icon/check.png" alt="" class="w-4 h-4">
                                    <div class="ml-2">90+ graphic design services</div>
                                </div>
                                <div class="flex items-center">
                                    <img src="/images/icon/check.png" alt="" class="w-4 h-4">
                                    <div class="ml-2">Priority support</div>
                                </div>
                                <div class="flex items-center">
                                    <img src="/images/icon/check.png" alt="" class="w-4 h-4">
                                    <div class="ml-2 text-[#5FC3DF] font-semibold">Unlimited revision</div>
                                </div>
                                <div class="flex items-center">
                                    <img src="/images/icon/check.png" alt="" class="w-4 h-4">
                                    <div class="ml-2 text-[#5FC3DF] font-semibold">15% OFF of every order</div>
                                </div>
                                <div class="flex items-center">
                                    <img src="/images/icon/check.png" alt="" class="w-4 h-4">
                                    <div class="ml-2">Member only special offer</div>
                                </div>
                                <div class="flex items-center">
                                    <img src="/images/icon/check.png" alt="" class="w-4 h-4">
                                    <div class="ml-2 text-[#5FC3DF] font-semibold">Extra fast delivery</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Desktop -->
                <div class="hidden md:block px-4 xl:px-16 mx-auto mt-10">
                    <div class="p-8 bg-white shadow rounded-sm">
                        <div class="text-center text-xl font-bold mt-2 mb-8">There are two types of membership</div>
                        <div class="grid grid-cols-1 md:grid-cols-2">
                            <div class="grid grid-cols-12">
                                <div class="flex flex-col justify-between col-span-5 mx-4">
                                    <div>
                                        <h2 class="font-bold text-xl text-[#5FC3DF] uppercase mb-4">BLUE CARD</h2>
                                        <p class="text-[#505050]">Life time membership, no monthly fee, get 10% of every order and more.</p>
                                    </div>
                                    <button @click="this.$root.$refs.modalContact.show()" class=" inline-block bg-[#5FC3DF] hover:opacity-90 text-white font-bold rounded px-8 py-2 text-center">Contact Sale</button>
                                </div>
                                <div class="col-span-7 mx-4">
                                    <img :src="imageLeft" alt="" class="">
                                </div>
                            </div>
                            <div class="grid grid-cols-12">
                                <div class="col-span-7 mx-4">
                                    <img :src="imageRight" alt="" class="">
                                </div>
                                <div class="flex flex-col justify-between col-span-5 mx-4">
                                    <div>
                                        <h2 class="font-bold text-xl text-[#2B2F42] uppercase mb-4">BLACK CARD</h2>
                                        <p class="text-[#505050]">Life time membership, no monthly fee, get 15% OFF of every order, and more benefit without extra charge.</p>
                                    </div>
                                    <button @click="this.$root.$refs.modalContact.show()" class=" inline-block bg-[#2B2F42] hover:opacity-90 text-white font-bold rounded px-8 py-2 text-center">Contact Sale</button>
                                </div>
                            </div>
                        </div>
                        <div class="text-center text-[#505050] my-8">
                            Yes. When we say “More”, we really mean it!
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2">
                            <div class="grid grid-cols-1 md:grid-cols-2">
                                <div class="space-y-2">
                                    <div class="flex items-center">
                                        <img src="/images/icon/check.png" alt="" class="w-4 h-4">
                                        <div class="ml-2">90+ graphic design services</div>
                                    </div>
                                    <div class="flex items-center">
                                        <img src="/images/icon/check.png" alt="" class="w-4 h-4">
                                        <div class="ml-2">Priority support</div>
                                    </div>
                                </div>
                                <div class="space-y-2">
                                    <div class="flex items-center">
                                        <img src="/images/icon/check.png" alt="" class="w-4 h-4">
                                        <div class="ml-2 text-[#5FC3DF] font-semibold">10% OFF of every order</div>
                                    </div>
                                    <div class="flex items-center">
                                        <img src="/images/icon/check.png" alt="" class="w-4 h-4">
                                        <div class="ml-2">Member only special offer</div>
                                    </div>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2">
                                <div class="space-y-2">
                                    <div class="flex items-center">
                                        <img src="/images/icon/check.png" alt="" class="w-4 h-4">
                                        <div class="ml-2">90+ graphic design services</div>
                                    </div>
                                    <div class="flex items-center">
                                        <img src="/images/icon/check.png" alt="" class="w-4 h-4">
                                        <div class="ml-2">Priority support</div>
                                    </div>
                                    <div class="flex items-center">
                                        <img src="/images/icon/check.png" alt="" class="w-4 h-4">
                                        <div class="ml-2 text-[#5FC3DF] font-semibold">Unlimited revision</div>
                                    </div>
                                </div>
                                <div class="space-y-2">
                                    <div class="flex items-center">
                                        <img src="/images/icon/check.png" alt="" class="w-4 h-4">
                                        <div class="ml-2 text-[#5FC3DF] font-semibold">15% OFF of every order</div>
                                    </div>
                                    <div class="flex items-center">
                                        <img src="/images/icon/check.png" alt="" class="w-4 h-4">
                                        <div class="ml-2">Member only special offer</div>
                                    </div>
                                    <div class="flex items-center">
                                        <img src="/images/icon/check.png" alt="" class="w-4 h-4">
                                        <div class="ml-2 text-[#5FC3DF] font-semibold">Extra fast delivery</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <HaveQuestion page="BECOME_MEMBER"/>
        <div class="max-w-7xl mx-auto py-8 px-8 mt-4">
            <div class="text-center space-y-6">
                <div class="text-center text-xl font-bold">Sign Up Today and Save!</div>
                <div>
                    Join us today to enjoy our special offers and a lot more!
                </div>
                <button @click="this.$root.$refs.modalContact.show()" class="inline-block bg-[#5FC3DF] hover:opacity-90 text-white font-bold rounded px-8 py-2">Contact Sale</button>
                <div class="max-w-[600px] mx-auto">
                    <img src="/images/other/membership.jpg" />
                </div>
            </div>
        </div>
    </div>
</template>