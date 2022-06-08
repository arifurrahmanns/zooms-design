<template>
	<DesignCategoryMenu/>
	<Breadcrum :bgcolor="'#E0F9FF'" :breadcrumbs="[{ title: 'All Items' }]"/>
    <BrowseByCategory />
	<div v-for="cat in store.categories">
		<ListEachCategory :id="cat.id" :name="cat.name" :color="cat.color" :show-see-more-button="true" :items="allItems.filter(it => it.category_id == cat.id)"/>
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
            allItems: [],
        }
    },
    async mounted() {
        const allDesign = await getListItemForAllDesign({})
        this.allItems = allDesign.data;
    }
}
</script>