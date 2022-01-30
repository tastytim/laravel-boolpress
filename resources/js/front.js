window.Vue = require("vue");
window.dayjs = require("dayjs");
window.axios = require("axios");

import Vue from "vue";
import App from "../js/App.vue";
import router from "../js/router.js";
import Vuetify from 'vuetify';
import '@mdi/font/css/materialdesignicons.css';



try {
    Vue.prototype.$csrf_token = document
        .querySelector("meta[name='csrf-token']")
        .getAttribute("content");
    Vue.prototype.$userName = document
        .querySelector("meta[name='user-name']")
        .getAttribute("content");
} catch {
    Vue.prototype.$csrf_token = '';
    Vue.prototype.$userName = '';
}
Vue.use(Vuetify);




Vue.component("App", require("../js/App.vue"));

const app = new Vue({
    el: "#root",
    router,
    vuetify: new Vuetify(),
    render: (h) => h(App),
});


