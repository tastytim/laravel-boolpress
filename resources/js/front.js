
require('./bootstrap');

window.Vue = require('vue');

Vue.component('app', require('./components/views/App.vue'));

import Vue from 'vue';
import App from '../js/components/views/App.vue';


const app = new Vue(
    {
        el: '#app',
        render: h => h(App)
    }
);
