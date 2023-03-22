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

import { globalCookiesConfig } from "vue3-cookies";

import Home from "./page/Home.vue";
import About from "./page/About.vue";
import ListPost from "./page/ListPost.vue"
import Term from "./page/StaticTerm.vue"
import Cookie from "./page/StaticCookie.vue"
import Privacy from "./page/StaticPrivacy.vue"
import DesignItemDetail from "./page/DesignItemDetail.vue"
import CaseStudyDetail from "./page/CaseStudyDetail.vue"
import ListDesign from "./page/ListDesign.vue"
import NotFound from "./page/NotFound.vue"
import BecomeMember from "./page/BecomeMember.vue"
import GroupDesign from "./page/GroupDesign.vue"
import ListCaseStudy from "./page/ListCaseStudy.vue"
import PostDetail from './page/PostDetail.vue'
import SearchItem from './page/SearchItem.vue'
import Pricing from './page/Pricing.vue'



const routes = [
    { path: '/', name: "home", component: Home, },
    { path: '/about', name: "about", component: About, meta: { title: 'About Us' } },
    { path: '/blogs', name: "blogs", component: ListPost, meta: { title: 'Blogs' } },
    { path: '/post/:slug', name: "bloga-detail", component: PostDetail, meta: { title: 'Post Detail' } },
    { path: '/items/search', name: "search-item", component: SearchItem, meta: { title: 'Designs' } },
    { path: '/items/:slug', name: "item-detail", component: DesignItemDetail, meta: { title: 'Designs' } },
    { path: '/categories/:slug', name: "group-item", component: GroupDesign, meta: { title: 'Designs' } },
    { path: '/case-studies', name: "case-studies", component: ListCaseStudy, meta: { title: 'Case Studies' } },
    { path: '/case-studies/:slug', name: "case-study-detail", component: CaseStudyDetail, meta: { title: 'Case Studies' } },
    { path: '/designs', name: "designs", component: ListDesign, meta: { title: 'All Designs' } },
    { path: '/become-member', name: "become-member", component: BecomeMember, meta: { title: 'Become Member' } },

    { path: '/term-condition', name: "term", component: Term, meta: { title: 'Terms and Conditions' } },
    { path: '/privacy', name: "privacy", component: Privacy, meta: { title: 'Privacy Policy' } },
    { path: '/cookie', name: "cookie", component: Cookie, meta: { title: 'Cookie Policy' } },
    { path: '/pricing', name: "pricing", component: Pricing, meta: { title: 'Pricing' } },


    // { path: '/s/case-studies/:slug', component: CaseStudyDetail },
    // { path: '/s/post/:slug', component: PostDetail },

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

globalCookiesConfig({
    expireTimes: "1y",
    path: "/",
    // secure: true,
});

const app = createApp(App)
app.use(router)
app.mount('#app')
