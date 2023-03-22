<script>
import { getStaticPageContent } from '../api/api'

export default {
    data: () => ({
        content: '',
        lastUpdate: '',
    }),
    async created() {
        try {
            const response = await getStaticPageContent('Privacy Policy')
            this.content = response.data.content
            this.lastUpdate = response.data.updated_at
        } catch (error) {

        }
    }
}
</script>
<template>
    <div>
        <div class="py-8 px-4 xl:px-16 relative">
            <div class="absolute z-0 top-0 inset-x-0 h-[50%] bg-[#E0F9FF]"></div>
            <div class="relative">
                <div class="flex justify-center flex-col items-center">
                    <h1 class="text-3xl font-bold leading-10 max-w-2xl">
                        Privacy Policy
                    </h1>
                    <div class="text-[#74818d] pt-4" v-text="`Last updated ${lastUpdate}`">

                    </div>
                </div>
                <div class="bg-white mx-auto mt-10 rounded shadow">
                    <div class="p-8 md:p-12">
                        <div class="prose prose-lg prose-neutral max-w-none" v-html="content">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>