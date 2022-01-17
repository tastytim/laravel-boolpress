
require('./bootstrap');

window.vue = require('vue');

import App from '/views/App';


const app = new Vue(
    {
        el: '#app',
        render: h => h(App)
    }
);
