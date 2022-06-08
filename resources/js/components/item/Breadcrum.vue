<script>
export default {
	props: ['bgcolor', 'breadcrumbs', 'description'],
	data() {
		return {
		}
	}
}
</script>

<template>
    <nav :style="`background-color: ${bgcolor};`" class="py-6 lg:py-10 text-lg" aria-label="Breadcrumb">
        <div class="max-w-7xl mx-auto px-4">
            <ol class="inline-flex items-center text-md font-bold text-[#0F1137] hover:text-gray-900 space-x-4 md:space-x-6 mb-2">
                <li v-for="item in breadcrumbs" class="relative after:content-['/'] last:after:content-[''] after:absolute after:right-[-10px] md:after:right-[-18px]">
                    <a :href="item.url">
                    {{ item.title }}
                    </a>
                </li>
            </ol>
            <p class="text-[#0F1137]" v-text="description || 'Broccoli roses, alway fresh and delicious. 100% Organic'"></p>
        </div>
    </nav>
</template>