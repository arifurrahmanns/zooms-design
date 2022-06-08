<script>
import Social from './common/Social.vue';
import Contact from './Contact.vue';
import { store } from '../store'
export default {
	data(){
		return {
			store
		}
	},
    components: { Social, Contact }
}
</script>
<template>
    <div class="max-w-7xl mx-auto pt-16 px-4">
        <div class="bg-[#E0F9FF] rounded-tl-3xl rounded-tr-3xl p-8 md:p-12">
            <div class="md:grid md:grid-cols-5">
                <div class="col-span-2">
                    <div class="max-w-[145px] mb-6 md:mb-0">
                        <img src="../assets/logo.png" alt="Zooms Design" class="h-[65px] mb-4">
                        <Social/>
                    </div>
                </div>
                <div class="col-span-3 space-y-2 md:space-y-0 grid grid-cols-3">
                    <div class="space-y-2 md:space-y-6">
                        <div class="font-semibold">Service</div>
                        <div class="flex">
                            <a href="/become-member" class="text-sm hover:text-[#5CD0EB] block">Become a member</a>
                        </div>
                        <div class="flex">
                            <a href="/designs" class="text-sm hover:text-[#5CD0EB] block">Design categories</a>
                        </div>
                        <div class="flex">
                            <a href="/my-account" class="text-sm hover:text-[#5CD0EB] block">My Account</a>
                        </div>
                    </div>
                    <div class="space-y-2 md:space-y-6">
                        <div class="font-semibold">Process</div>
                        <div class="flex">
                            <a href="/case-studies" class="text-sm hover:text-[#5CD0EB] block">Case study</a>
                        </div>
                        <div class="flex">
                            <a href="/help" class="text-sm hover:text-[#5CD0EB] block">Help Center</a>
                        </div>
                        <div class="flex">
                            <a href="/book-demo" class="text-sm hover:text-[#5CD0EB] block">Book demo</a>
                        </div>
                    </div>
                    <div class="space-y-2 md:space-y-6">
                        <div class="font-semibold">Company</div>
                        <div class="flex">
                            <a href="/about" class="text-sm hover:text-[#5CD0EB] block">About</a>
                        </div>
                        <div class="flex">
                            <button @click="this.$refs.contact.show()" class="text-sm hover:text-[#5CD0EB] block">Contact</button>
                        </div>
                        <div class="flex">
                            <a href="/blog" class="text-sm hover:text-[#5CD0EB] block">Blog</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-16 text-sm">
                <div class="font-semibold mb-6">get a design</div>
                <div class="grid grid-cols-2 md:grid-cols-5 gap-y-6">
                    <div class="flex" v-for="cat in store.categories" :key="cat.id">
                        <a :href="`/categories/${cat.id}`"
                            class="hover:text-[#5CD0EB]">{{cat.name}}</a>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-5 mt-16 text-sm">
                <div class="col-span-3">
                    <p class="font-semibold mb-4">
                        We accept all major credit cards for fast and easy payment
                    </p>
                    <img src="/images/other/ccard.png" alt="" class="mb-4 md:mb-0 md:max-w-[400px]">
                </div>
                <div class="space-y-4 md:space-y-6 col-span-2">
                    <a href="mailto:hello@zooms.design" class="block font-semibold hover:text-[#5CD0EB]">hello@zooms.design</a>
                    <a href="tel:+85577677171" class="block font-semibold hover:text-[#5CD0EB]">+85577677171</a>
                    <div class="grid grid-cols-1 space-y-4 md:space-y-0 md:flex md:space-x-4">
                        <a href="/term-condition" class="hover:text-[#5CD0EB] block">terms &amp; conditions</a>
                        <a href="/privacy" class="hover:text-[#5CD0EB] block">privacy policy</a>
                        <a href="/privacy" class="hover:text-[#5CD0EB] block">cookie policy</a>
                    </div>
                    <p class="pt-4">© 2022 Zooms Design. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </div>
    <Contact ref="contact"/>
</template>