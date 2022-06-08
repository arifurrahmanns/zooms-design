<script setup>
import Navbar from "./components/Navbar.vue";
import FooterVue from "./components/Footer.vue";
import Contact from './components/Contact.vue';
import { getCategories } from "./api/api";
import { store } from './store'
</script>
<script>
export default {
  data() {
    return {
      store,
    }
  },
  async mounted() {
    this.store.categories = (await getCategories()).data
  }
}
</script>

<template>
  <div>
    <Navbar/>
  </div>
  <div>
    <router-view></router-view>
  </div>
  <div>
    <FooterVue />
  </div>
</template>
