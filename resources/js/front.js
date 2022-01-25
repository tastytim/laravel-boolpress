window.Vue = require('vue');
window.dayjs = require('dayjs');

Vue.component('App', require('./components/views/App.vue'));

import Vue from 'vue';
import App from '../js/components/views/App.vue';


const app = new Vue(
    {
        el: '#root', 
        render: h => h(App),
    }
);



