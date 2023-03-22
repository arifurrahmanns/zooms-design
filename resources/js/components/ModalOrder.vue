<script>
import { onClickOutside } from '@vueuse/core'
import { useCookies } from "vue3-cookies";
import Social from './common/Social.vue';
import { onMounted, ref } from 'vue';
import { orderRequest } from '../api/api';
import { createToast } from 'mosha-vue-toastify';
export default {
    data() {
        return {
            name: '',
            email: '',
            phone: '',
            company: '',
            msg: '',
            showOrderForm: false,
            modalOrder: null,
            submitting: false,
        }
    },
    setup() {
        const product = ref(null)
        const image = ref(null)
        const modalOrder = ref(null)
        const showOrderForm = ref(false)
        onClickOutside(modalOrder, () => {
            showOrderForm.value = false
        })
        return {
            modalOrder, showOrderForm, product, image,
        }
    },
    methods: {
        async request() {
            if (!this.email ||
                !this.name ||
                !this.phone ||
                !this.company) {
                    console.log('invalid input')
                return;
            }
            try {
                const request = {
                    email: this.email,
                    msg: this.msg,
                    name: this.name,
                    product: this.product,
                    company: this.company,
                    phone: this.phone,
                }
                const { cookies } = useCookies();
                cookies.set('info', JSON.stringify(request), '1y', '/')
                request.image = this.image
                await orderRequest(request)
                this.showOrderForm = false
                this.$root.$refs.modalOrderComplete.show()
            } catch (error) {
                console.log(error)
                createToast({title: 'Error', description: 'Something went wrong, please try again.'}, {
                    type: 'danger',
                    timeout: 3000,
                    hideProgressBar: true,
                })
            }
        },
        hide() {
            this.showOrderForm = false;
        },
        show() {
            const { cookies } = useCookies();
            let info = cookies.get('info')
            if (info != null) {
                this.name = info.name || ''
                this.msg = info.msg || ''
                this.email = info.email || ''
                this.phone = info.phone || ''
                this.company = info.company || ''
            }
            this.showOrderForm = true
        }
    }
}
</script>
<template>
    <Teleport to="#modal">
        <Transition
            enter-active-class="duration-200 ease-out"
            leave-active-class="duration-200 ease-in"
            enter-from-class="transform opacity-0 scale-110"
            leave-to-class="transform opacity-0 scale-110"
            >
            <div v-if="showOrderForm" class="bg-black/30 overflow-y-auto overflow-x-hidden fixed z-50 w-full inset-0 h-full">
                <div class="relative p-8 w-full max-w-2xl mx-auto">
                    <div ref="modalOrder" class="bg-white rounded-3xl relative">
                        <div class="p-4 md:p-8">
                            <h2 class="text-3xl font-bold mb-4">Order request</h2>
                            <div class="grid grid-cols-2 gap-6">
                                <input type="text" v-model="name" placeholder="Full Name" class="border-0 border-b-2 pl-0 px-4 py-2 focus:ring-0" />
                                <input type="text" v-model="email" placeholder="E-mail" class="border-0 border-b-2 pl-0 px-4 py-2 focus:ring-0" />
                                <input type="text" v-model="phone" placeholder="Phone number (or Telegram)" class="border-0 border-b-2 pl-0 px-4 py-2 focus:ring-0" />
                                <input type="text" v-model="company" placeholder="Company" class="border-0 border-b-2 pl-0 px-4 py-2 focus:ring-0" />
                            </div>
                            <div class="grid grid-cols-1 my-12">
                                <textarea v-model="msg" placeholder="Message" class="border-0 border-b-2 pl-0 px-4 py-2 focus:ring-0"></textarea>
                            </div>
                            <div>
                                <h2 class="text-xl font-bold mb-4">Item</h2>
                                <div>
                                    <img :src="image" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="bg-[#E0F9FF] py-6 lg:py-10 p-4 md:p-8">
                            <div class="font-bold text-[#0F1137] text-md">
                                Note:
                            </div>
                            <ul class="text-[#0F1137] mt-4 list-disc px-4">
                                <li>Our agent will contact you in 24 hours. </li>
                                <li>You can cancel and change your order later. </li>
                                <li>By submitting request form, you are allowing us to contact, send email newsletter and other promotional related topics via the provided contact info. </li>
                            </ul>
                        </div>
                        <div class="p-4 md:p-8">
                            <button @click="request"
                                class="rounded-full bg-[#5FC3DF] px-8 py-2 text-white font-semibold focus:bg-[#2e8b9f] flex items-center">
                                Submit
                                <svg v-if="submitting" class="animate-spin h-5 w-5 text-white ml-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                </button>
                        </div>
                    </div>
                </div>
            </div>
        </Transition>
    </Teleport>
</template>
