import Vue from 'vue';
import VueRouter from 'vue-router';
import Home from '../js/pages/Home.vue';
import About from './pages/About.vue';
import Contact from '../js/pages/Contact.vue';
import Postshow from '../js/pages/Postshow.vue';

Vue.use(VueRouter);

const router = new VueRouter(
    {
        mode:'history',
        routes: [
            {
                path:'/',
                name: 'home',
                component: Home
            },
            {
                path:"/about",
                name: "about",
                component: About
            },
            {
                path:'/contact',
                name: 'contact',
                component: Contact
            },
            // {
            //     path:'/post/',
            //     name: 'posts.show',
            //     component: 'Postshow'
            // },
        ]
    }
)


export default router;