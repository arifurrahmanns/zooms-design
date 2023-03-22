<script setup>
import Navbar from "./components/Navbar.vue";
import FooterVue from "./components/Footer.vue";
import Contact from './components/Contact.vue';
import { getBasicData } from "./api/api";
import { store } from './store'
import ModalOrder from "./components/ModalOrder.vue";
import ModalOrderComplete from "./components/ModalOrderComplete.vue";
import ModalOrderPromotion from "./components/ModalOrderPromotion.vue";
import ModalOrderPromotionComplete from "./components/ModalOrderPromotionComplete.vue";

</script>
<script>
export default {
  data() {
    return {
      store,
    }
  },
  async mounted() {
    const data = (await getBasicData()).data
    this.store.categories = data.design_categories
    this.store.trustedBrands = data.trusted_brands
    this.store.bundleServices = data.bundle_services
    this.store.home_title = data.home_title
  }
}
</script>

<template>
    <Navbar/>
    <Suspense>
        <router-view></router-view>
        <template #fallback>
            Loading...
        </template>
    </Suspense>
    <FooterVue />

    <Contact ref="modalContact"/>
    <ModalOrder ref="modalOrder"/>
    <ModalOrderComplete ref="modalOrderComplete" />
    <ModalOrderPromotion ref="modalOrderPromotion" />
    <ModalOrderPromotionComplete ref="modalOrderPromotionComplete"/>
</template>
