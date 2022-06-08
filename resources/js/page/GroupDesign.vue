<script setup>
import DesignCategoryMenu from '../components/common/DesignCategoryMenu.vue';
import Breadcrum from '../components/item/Breadcrum.vue';
import { store } from '../store'
import ListEachCategory from '../components/list-item/ListEachCategory.vue';
import { computed, onMounted, ref } from '@vue/runtime-core';
import BrowseByCategory from '../components/list-item/BrowseByCategory.vue';
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
            return store.categories.find(it => it.id == this.$route.params.id)
        },
        activeCategory() {
            try {
                const result = store.categories.find(it => it.id == this.$route.params.id) || {}
                console.log(result)
                return result
            } catch (error) {
                return { id: 0, color: '#E0F9FF'}
            }
        }
    },
    async mounted() {
        const data = await getListItemByCategory(this.$route.params.id)
        console.log(data)
        this.items = data.data
    }
}
</script>

<template>
	<DesignCategoryMenu/>
	<Breadcrum :bgcolor="'#E0F9FF'" :breadcrumbs="[{ title: 'All Items' }, { title: activeCategory.name }]"/>

    <ListEachCategory :id="category.id" :name="category.name" :color="category.color" :items="items"/>
    <BrowseByCategory :active-category-id="activeCategory.id" />
</template>