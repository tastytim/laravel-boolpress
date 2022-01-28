import Vue from "vue";
import VueRouter from "vue-router";


import Home from '../js/pages/Home.vue';
import About from '../js/pages/About.vue';
import Contact from '../js/pages/Contact.vue';
import Postshow from '../js/pages/PostShow.vue';
import Categoryshow from '../js/pages/Categoryshow.vue';

Vue.use(VueRouter);

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "home",
            component: Home,
        },
        {
            path: "/about",
            name: "about",
            component: About,
        },
        {
            path: "/contact",
            name: "contact",
            component: Contact,
        },
        {
            path: "/posts/:slug",
            name: "posts.show",
            component: Postshow,
        },
        {
            path: "/categories/:category",
            name: "category.show",
            component: Categoryshow,
        },
    ],
});

export default router;