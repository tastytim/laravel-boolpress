window.Vue = require('vue');
window.dayjs = require('dayjs');

Vue.component('App', require('./App.vue'));

import Vue from 'vue';
import App from '../js/App.vue';
import router from '../js/router.js';


const app = new Vue(
    {
        el: '#root', 
        router,
        render: h => h(App),
    }
);



