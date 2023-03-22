<template>
	<DesignCategoryMenu/>
	<Breadcrum
        :bgcolor="'#E0F9FF'"
        :breadcrumbs="[{ title: 'Search Design' }]"
        :description='`Searching result of "${getQuery()}"..`'/>
    <BrowseByCategory />

    <div v-if="items.length > 0" class="mx-auto py-8 px-4 xl:px-16">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-2 md:gap-8 snap-x">
            <div v-for="item in items" :key="item.id" class="snap-center">
                <a :href="`/items/${item.slug}`" class="border border-[#EBEBEB] rounded flex flex-col p-3 hover:shadow-lg hover:cursor-pointer">
                    <img :src="item.media" :alt="item.title" class="mb-2">
                    <div class="text-center text-sm">
                        <h2 class="font-bold mb-1">{{item.title}}</h2>
                        <p class="text-[#999999] mb-2 text-xs">{{item.category.name}} </p>
                        <p class="text-[#5FC3DF] font-semibold">$ {{item.price}}</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div v-else>
        <div class="mx-auto px-4 xl:px-16">
            <hr class="h-[1px] bg-gray-300 mt-8"/>
            <div class="flex items-center justify-center h-44 text-lg">
                Sorry, the item you were looking for does not exist or is not available.
            </div>
        </div>
    </div>
</template>

<script setup>
import DesignCategoryMenu from '../components/common/DesignCategoryMenu.vue';
import Breadcrum from '../components/item/Breadcrum.vue';
import { store } from '../store'
import ListEachCategory from '../components/list-item/ListEachCategory.vue';
import BrowseByCategory from '../components/list-item/BrowseByCategory.vue';
import { getListItemForAllDesign } from '../api/api';
</script>
<script>
export default {
    data() {
        return {
            items: [],
        }
    },
    methods: {
        getQuery() {
            return this.$route.query.query || ''
        },
    },
    async mounted() {
        const allDesign = await getListItemForAllDesign({title: this.getQuery()})
        this.items = allDesign.data;
    }
}
</script>