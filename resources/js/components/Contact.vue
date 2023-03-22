<script setup>
import Social from './common/Social.vue';
import { onClickOutside } from '@vueuse/core'
import { ref } from 'vue';
import { contactRequest } from '../api/api';
import { createToast } from 'mosha-vue-toastify';

const email = ref(null)
const name = ref(null)
const msg = ref(null)
const showContactForm = ref(false)
const modalContact = ref(null)

onClickOutside(modalContact, () => {
    showContactForm.value = false
})

const show = () => {
    showContactForm.value = true
}
const hide = () => {
    showContactForm.value = false
}

const request = async () => {
    try {
        await contactRequest({
            'email': email.value,
            'msg': msg.value,
            'name': name.value,
        })
        createToast({title: 'Success', description: 'Your message was successfully submitted.'}, {
            type: 'success',
            timeout: 3000,
            hideProgressBar: true,
        })
        showContactForm.value = false
        email.value = null
        name.value = null
        msg.value = null
    } catch (error) {
        createToast({title: 'Error', description: 'Something went wrong, please try again.'}, {
            type: 'danger',
            timeout: 3000,
            hideProgressBar: true,
        })
    }
}

defineExpose({show, hide})
</script>
<template>
    <Teleport to="#modal">
        <Transition
            enter-active-class="duration-200 ease-out"
            leave-active-class="duration-200 ease-in"
            enter-from-class="transform opacity-0 scale-110"
            leave-to-class="transform opacity-0 scale-110"
            >
            <div v-if="showContactForm" class="fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-full bg-black/30 flex items-center justify-center">
                <div ref="modalContact" class="bg-white rounded-3xl p-4 md:p-8 relative">
                    <button @click="hide" class="absolute top-4 right-4 text-[#555555]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                    <h2 class="text-3xl font-bold mb-4">Contact Us</h2>
                    <div class="flex md:space-x-8 lg:space-x-16 flex-col md:flex-row space-y-4 md:space-y-0">
                        <div class="flex flex-col space-y-4 min-w-[20rem]">
                            <input type="text" v-model="name" placeholder="Full Name" class="border-0 border-b-2 pl-0 px-4 py-2 focus:ring-0">
                            <input type="email" v-model="email" placeholder="E-mail" class="border-0 border-b-2 pl-0 px-4 py-2 focus:ring-0">
                            <textarea v-model="msg" placeholder="Message" class="border-0 border-b-2 pl-0 px-4 py-2 focus:ring-0"></textarea>
                            <div>
                                <button @click="request" class="rounded-full bg-[#5FC3DF] px-4 py-2 text-white font-semibold focus:bg-[#2e8b9f]">Contact Us</button>
                            </div>
                        </div>
                        <div class="flex flex-col space-y-5 w-[15rem]">
                            <div>
                                <h3 class="text-xl font-bold">Contact</h3>
                                <div>hello@zooms.design</div>
                                <div>+85577677171</div>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold">Based in</h3>
                                <div>Phnom Penh</div>
                                <div>Cambodia</div>
                            </div>
                            <div class="max-w-[145px] h-[40px] mb-6 md:mb-0 flex items-center">
                                <Social/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </Transition>
    </Teleport>
</template>
