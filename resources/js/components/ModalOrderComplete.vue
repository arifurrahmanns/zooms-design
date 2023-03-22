
<script setup>
import { onClickOutside } from '@vueuse/core'
import { ref } from 'vue';
import { store } from '../store'

const showOrderCompleteModal = ref(false)
const modalOrder = ref(null)

onClickOutside(modalOrder, () => {
    showOrderCompleteModal.value = false
})
const show = () => {
    showOrderCompleteModal.value = true
}
const hide = () => {
    showOrderCompleteModal.value = false
}
const goToPageDesigns = () => {
    hide()
    location.href = href="/designs"
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
            <div v-if="showOrderCompleteModal" class="bg-black/30 overflow-y-auto overflow-x-hidden fixed z-50 w-full inset-0 h-full">
                <div class="relative p-8 h-full w-full max-w-xl sm:max-w-3xl mx-auto flex justify-center items-center">
                    <div ref="modalOrder" class="bg-white rounded-3xl relative">
                        <div class="p-4 md:p-8 pb-2 md:pb-2">
                            <div class="text-md sm:text-2xl font-bold mb-4">
                                Thank you for your request! <br />
                                Our team will contact you in 24 hours or less.</div>
                        </div>
                        <div class="p-4 md:p-8 md:pt-2">
                            <div class="flex items-center space-x-4">
                                <a href="/designs"
                                    class="rounded-full bg-[#5FC3DF] py-2 text-white text-center font-semibold focus:bg-[#2e8b9f] inline-block text-xs sm:text-sm w-[110px] sm:w-[150px]">
                                    Order More
                                </a>
                                <a :href="store.home_title.contact_now_url"
                                    class="rounded-full bg-[#2B2F42] py-2 text-white text-center font-semibold focus:bg-[#2e8b9f] inline-block text-xs sm:text-sm w-[110px] sm:w-[150px]">
                                    Contact now!
                                </a>
                                <button @click="hide()"
                                    class="rounded-full bg-[#E0F9FF] py-2 text-[#2B2F42] text-center font-semibold focus:bg-[#2e8b9f] inline-block text-xs sm:text-sm w-[110px] sm:w-[150px]">
                                    Close
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </Transition>
    </Teleport>
</template>
