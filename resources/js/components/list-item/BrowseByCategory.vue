<script setup>
import { store } from '../../store'
defineProps(['activeCategoryId'])
</script>
<template>
    <div class="mx-auto py-8 px-4 xl:px-16">
		<div class="">
			<div class="font-semibold mb-6">Browse by categories</div>
			<div class="grid grid-cols-2 md:grid-cols-5 gap-y-6">
				<div class="flex" v-for="cat in store.categories" :key="cat.id">
					<a :href="`/categories/${cat.slug}`"
                        :style="`color: ${activeCategoryId == cat.id ? cat.color: '#2B2F42'}`"
						class="hover:text-[#5FC3DF] text-[#2B2F42]">{{cat.name}}</a>
				</div>
			</div>
		</div>
	</div>
</template>