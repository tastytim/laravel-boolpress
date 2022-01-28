window.Vue = require('vue');
window.dayjs = require('dayjs');
window.axios = require('axios');

import Vue from 'vue';
import App from '../js/App.vue';
import router from '../js/router.js';




Vue.component('App', require('../js/App.vue'));

const app = new Vue(
    {
        el: '#root', 
        router,
        render: h => h(App),
    }
);



