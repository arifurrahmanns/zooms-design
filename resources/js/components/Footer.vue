<script>
import Social from './common/Social.vue';
import { store } from '../store'
export default {
	data(){
		return {
			store
		}
	},
    components: { Social }
}
</script>
<template>
    <div class="px-4 pt-16 mx-auto xl:px-16">
        <div class="bg-[#E0F9FF] rounded-tl-3xl rounded-tr-3xl p-8 md:p-12">
            <div class="md:grid md:grid-cols-5">
                <div class="col-span-2">
                    <div class="max-w-[200px] mb-6 md:mb-0">
                        <img src="../assets/logo.png" alt="Zooms Design" class="h-[45px] md:h-[65px] mb-4">
                        <Social/>
                    </div>
                </div>
                <div class="grid grid-cols-3 col-span-3 space-y-2 md:space-y-0">
                    <div class="space-y-2 md:space-y-6">
                        <div class="font-semibold">Service</div>
                        <div class="flex">
                            <a href="/pricing" class="text-sm hover:text-[#5FC3DF] block">Pricing</a>
                        </div>
                        <div class="flex">
                            <a href="/designs" class="text-sm hover:text-[#5FC3DF] block">Design categories</a>
                        </div>
                        <div class="flex">
                            <a href="/manage" class="text-sm hover:text-[#5FC3DF] block">My Account</a>
                        </div>
                    </div>
                    <div class="space-y-2 md:space-y-6">
                        <div class="font-semibold">Resources</div>
                        <div class="flex">
                            <a href="/case-studies" class="text-sm hover:text-[#5FC3DF] block">Case study</a>
                        </div>
                        <div class="flex">
                            <a href="/blogs" class="text-sm hover:text-[#5FC3DF] block">Blog</a>
                        </div>
                        <div class="flex">
                            <a href="javascript:void(0)" class="text-sm hover:text-[#5FC3DF] block">Freebies (Coming Soon!)</a>
                        </div>
                    </div>
                    <div class="space-y-2 md:space-y-6">
                        <div class="font-semibold">Company</div>
                        <div class="flex">
                            <a href="/about" class="text-sm hover:text-[#5FC3DF] block">About</a>
                        </div>
                        <div class="flex">
                            <button @click="this.$root.$refs.modalContact.show()" class="text-sm hover:text-[#5FC3DF] block">Contact</button>
                        </div>
                        <div class="flex">
                            <a href="/blogs" class="text-sm hover:text-[#5FC3DF] block">Zooms Company</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-16 text-sm">
                <div class="mb-6 font-semibold">get a design</div>
                <div class="grid grid-cols-2 md:grid-cols-5 gap-y-6">
                    <div class="flex" v-for="cat in store.categories" :key="cat.id">
                        <a :href="`/categories/${cat.slug}`"
                            class="hover:text-[#5FC3DF]">{{cat.name}}</a>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-2 mt-16 text-sm md:grid-cols-5">
                <div class="col-span-3">
                    <p class="mb-4 font-semibold">
                        We accept all major credit cards for fast and easy payment
                    </p>
                    <img src="/images/other/ccard.png" alt="" class="mb-4 md:mb-0 md:max-w-[400px]">
                </div>
                <div class="col-span-2 space-y-4 md:space-y-6">
                    <a href="mailto:hello@zooms.design" class="block font-semibold hover:text-[#5FC3DF]">hello@zooms.design</a>
                    <a href="tel:+85577677171" class="block font-semibold hover:text-[#5FC3DF]">+85577677171</a>
                    <div class="grid grid-cols-1 space-y-4 md:space-y-0 md:flex md:space-x-4">
                        <a href="/term-condition" class="hover:text-[#5FC3DF] block">terms &amp; conditions</a>
                        <a href="/privacy" class="hover:text-[#5FC3DF] block">privacy policy</a>
                        <a href="/cookie" class="hover:text-[#5FC3DF] block">cookie policy</a>
                    </div>
                    <div class="flex items-center pt-4">
                        <p>Mad with love ❤️ by</p>
                        <a href="https://zoomsgroup.com/">
                            <img src="/images/logo.png" alt="Zooms group" class="h-[22px] ml-2">
                        </a>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</template> 