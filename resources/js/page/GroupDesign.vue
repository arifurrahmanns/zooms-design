<script setup>
import DesignCategoryMenu from '../components/common/DesignCategoryMenu.vue';
import Breadcrum from '../components/item/Breadcrum.vue';
import { store } from '../store'
import ListEachCategory from '../components/list-item/ListEachCategory.vue';
import { computed, onMounted, ref } from '@vue/runtime-core';
import BrowseByCategory from '../components/list-item/BrowseByCategory.vue';
import NotFoundVue from './NotFound.vue';
import { getListItemByCategory } from '../api/api';

</script>
<script>
export default {
    data() {
        return {
            items: [],
        }
    },
    computed: {
        category() {
            if (store.categories.length == 0) {
                return {}
            }
            return store.categories.find(it => it.slug == this.$route.params.slug)
        },
        activeCategory() {
            try {
                const result = store.categories.find(it => it.slug == this.$route.params.slug) || {}
                return result
            } catch (error) {
                return { id: 0, color: '#E0F9FF'}
            }
        }
    },
    methods: {
        capitalize(word) {
            return word.trim().toLowerCase().replace(/\w\S*/g, (w) => (w.replace(/^\w/, (c) => c.toUpperCase())));
        }
    },
    async created() {
        const data = await getListItemByCategory(this.$route.params.slug, 50)
        this.items = data.data
        try {
            document.title = this.capitalize(this.activeCategory.name)
        } catch (error) {

        }
    }
}
</script>

<template>
	<div v-if="items.length > 0">
        <DesignCategoryMenu/>
        <Breadcrum :bgcolor="activeCategory.bg_color"
            :breadcrumbs="[{ title: 'All Items' }, { title: activeCategory.name }]"
            :description="activeCategory.desc"/>

        <ListEachCategory :id="category.id" :slug="category.slug" :name="category.name" :color="category.color" :items="items"/>
        <BrowseByCategory :active-category-id="activeCategory.id" />
    </div>
    <div v-else>
        <NotFoundVue/>
    </div>
</template>