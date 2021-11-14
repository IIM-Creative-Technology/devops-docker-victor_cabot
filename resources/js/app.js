

require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';
Vue.use(VueRouter);

Vue.component('pagination', require('laravel-vue-pagination'));

import Home from './components/HomeComponent.vue';

const routes = [
    {
        path: '/',
        component: Home
    }
];

const router = new VueRouter({routes});



const app = new Vue({
    el: '#app',
    router: router
});
