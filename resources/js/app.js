/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import { createApp } from 'vue'
import * as Vue from 'vue'
import { createRouter, createWebHistory } from 'vue-router'
import App from './App.vue'
import 'mosha-vue-toastify/dist/style.css'

import Home from "./page/Home.vue";
import About from "./page/About.vue";
import Blogs from "./page/Blogs.vue"
import Term from "./page/Term.vue"
import DesignItemDetail from "./page/DesignItemDetail.vue"
import CaseStudyDetail from "./page/CaseStudyDetail.vue"
import ListDesign from "./page/ListDesign.vue"
import NotFound from "./page/NotFound.vue"
import BecomeMember from "./page/BecomeMember.vue"
import GroupDesign from "./page/GroupDesign.vue"
import ListCaseStudy from "./page/ListCaseStudy.vue"


const routes = [
    { path: '/', name: "home", component: Home, },
    { path: '/about', name: "about", component: About, meta: { title: 'About Us'} },
    { path: '/blogs', name: "blogss", component: Blogs, meta: { title: 'Blogs'} },
    { path: '/term-condition', name: "term", component: Term, meta: { title: 'Term and Condition'} },
    { path: '/privacy', name: "privacy", component: Term, meta: { title: 'Term and Condition'} },
    { path: '/cookie', name: "cookie", component: Term, meta: { title: 'Term and Condition'} },
    { path: '/items/:id', name: "item-detail", component: DesignItemDetail, meta: { title: 'Designs'} },
    { path: '/categories/:id', name: "group-item", component: GroupDesign, meta: { title: 'Designs'} },
    { path: '/case-studies', name: "case-studies", component: ListCaseStudy, meta: { title: 'Case Studies'} },
    { path: '/case-studies/:id', name: "case-study-detail", component: CaseStudyDetail, meta: { title: 'Case Studies'} },
    { path: '/designs', name: "designs", component: ListDesign, meta: { title: 'All Designs'} },
    { path: '/become-member', name: "become-member", component: BecomeMember, meta: { title: 'Become Member'} },
    { path: '/:catchAll(.*)', component: NotFound },
]

const router = createRouter({
    history: createWebHistory(),
    routes,
})

const DEFAULT_TITLE = 'Zoom Design';
router.afterEach((to, from) => {
    Vue.nextTick(() => {
        document.title = to.meta.title || DEFAULT_TITLE;
    });
});

const app = createApp(App)
app.use(router)
app.mount('#app')
