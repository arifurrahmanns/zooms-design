<script setup>
import HaveQuestion from '../components/common/HaveQuestion.vue';
</script>
<template>
    <div>
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
                        <div class="text-center text-xl font-bold mt-2 mb-8">There are two types of committement</div>
                        <div class="space-y-3">
                            <div>
                                <h2 class="font-bold text-xl text-[#5CD0EB] uppercase mb-4">blue</h2>
                                <p class="text-[#505050]">Subscription / Billed monthly</p>
                            </div>
                            <img src="/images/other/cc.png" alt="" class="max-w-[300px]">
                            <a href="#" class=" inline-block bg-[#5CD0EB] hover:opacity-90 text-white font-bold rounded px-8 py-2 text-center">Contact Sale</a>
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
                                    <div class="ml-2 text-[#5CD0EB] font-semibold">10% OFF of every order</div>
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
                                <h2 class="font-bold text-xl text-[#2B2F42] uppercase mb-4">black</h2>
                                <p class="text-[#505050]">Subscription / Billed monthly</p>
                            </div>
                            <img src="/images/other/cc-dark.png" alt="" class="max-w-[300px]">
                            <a href="#" class=" inline-block bg-[#2B2F42] hover:opacity-90 text-white font-bold rounded px-8 py-2 text-center">Contact Sale</a>
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
                                    <div class="ml-2 text-[#5CD0EB] font-semibold">Unlimited revision</div>
                                </div>
                                <div class="flex items-center">
                                    <img src="/images/icon/check.png" alt="" class="w-4 h-4">
                                    <div class="ml-2 text-[#5CD0EB] font-semibold">15% OFF of every order</div>
                                </div>
                                <div class="flex items-center">
                                    <img src="/images/icon/check.png" alt="" class="w-4 h-4">
                                    <div class="ml-2">Member only special offer</div>
                                </div>
                                <div class="flex items-center">
                                    <img src="/images/icon/check.png" alt="" class="w-4 h-4">
                                    <div class="ml-2 text-[#5CD0EB] font-semibold">Extra fast delivery</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Desktop -->
                <div class="hidden md:block max-w-7xl px-8 mx-auto mt-10">
                    <div class="p-8 bg-white shadow rounded-sm">
                        <div class="text-center text-xl font-bold mt-2 mb-8">There are two types of committement</div>
                        <div class="grid grid-cols-1 md:grid-cols-2">
                            <div class="grid grid-cols-12">
                                <div class="flex flex-col justify-between col-span-5 mx-4">
                                    <div>
                                        <h2 class="font-bold text-xl text-[#5CD0EB] uppercase mb-4">blue</h2>
                                        <p class="text-[#505050]">Subscription / Billed monthly</p>
                                    </div>
                                    <a href="#" class=" inline-block bg-[#5CD0EB] hover:opacity-90 text-white font-bold rounded px-8 py-2 text-center">Contact Sale</a>
                                </div>
                                <div class="col-span-7 mx-4">
                                    <img src="/images/other/cc.png" alt="" class="">
                                </div>
                            </div>
                            <div class="grid grid-cols-12">
                                <div class="col-span-7 mx-4">
                                    <img src="/images/other/cc-dark.png" alt="" class="">
                                </div>
                                <div class="flex flex-col justify-between col-span-5 mx-4">
                                    <div>
                                        <h2 class="font-bold text-xl text-[#2B2F42] uppercase mb-4">black</h2>
                                        <p class="text-[#505050]">Subscription / Billed monthly</p>
                                    </div>
                                    <a href="#" class=" inline-block bg-[#2B2F42] hover:opacity-90 text-white font-bold rounded px-8 py-2 text-center">Contact Sale</a>
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
                                        <div class="ml-2 text-[#5CD0EB] font-semibold">10% OFF of every order</div>
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
                                        <div class="ml-2 text-[#5CD0EB] font-semibold">Unlimited revision</div>
                                    </div>
                                </div>
                                <div class="space-y-2">
                                    <div class="flex items-center">
                                        <img src="/images/icon/check.png" alt="" class="w-4 h-4">
                                        <div class="ml-2 text-[#5CD0EB] font-semibold">15% OFF of every order</div>
                                    </div>
                                    <div class="flex items-center">
                                        <img src="/images/icon/check.png" alt="" class="w-4 h-4">
                                        <div class="ml-2">Member only special offer</div>
                                    </div>
                                    <div class="flex items-center">
                                        <img src="/images/icon/check.png" alt="" class="w-4 h-4">
                                        <div class="ml-2 text-[#5CD0EB] font-semibold">Extra fast delivery</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <HaveQuestion />
        <div class="max-w-7xl mx-auto py-8 px-8 mt-4">
            <div class="text-center space-y-6">
                <div class="text-center text-xl font-bold">Join us today to enjoy our special offers and alot more! </div>
                <div>
                    Sign up for our membership program today to get MORE!
                </div>
                <a href="#" class="inline-block bg-[#5CD0EB] hover:opacity-90 text-white font-bold rounded px-8 py-2">Contact Sale</a>
                <div class="max-w-[500px] mx-auto">
                    <img src="/images/other/joinus.png" />
                </div>
            </div>
        </div>
    </div>
</template>