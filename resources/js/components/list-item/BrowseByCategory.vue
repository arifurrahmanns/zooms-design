<script setup>
import { store } from '../../store'
defineProps(['activeCategoryId'])
</script>
<template>
    <div class="max-w-7xl mx-auto py-8 px-4">
		<div class="">
			<div class="font-semibold mb-6">Browse by categories</div>
			<div class="grid grid-cols-2 md:grid-cols-5 gap-y-6">
				<div class="flex" v-for="cat in store.categories" :key="cat.id">
					<a :href="`/categories/${cat.id}`"
                        :style="`color: ${activeCategoryId == cat.id ? cat.color: '#2B2F42'}`"
						class="hover:text-[#5CD0EB] text-[#2B2F42]">{{cat.name}}</a>
				</div>
			</div>
		</div>
	</div>
</template>