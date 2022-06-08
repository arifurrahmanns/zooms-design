<script>
import { store } from '../../store'
export default {
	data() {
		return {
			store
		}
	},
}
</script>

<template>
  <div class="hidden md:block pb-4 mx-auto px-4">
      <div class="flex flex-wrap justify-center">
          <div v-for="cat in store.categories" :key="cat.name" class="snap-start">
              <a :href="`/categories/${cat.id}`" class="text-[#A1A6BF] px-2 block md:px-3 py-1 hover:text-[#5CD0EB]">
                  {{cat.name}}
              </a>
          </div>
      </div>
  </div>
</template>