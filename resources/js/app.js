

require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';
Vue.use(VueRouter);

import Home from './components/HomeComponent.vue';
import Equipe from './components/EquipeComponent.vue';

const routes = [
    {
        path: '/',
        component: Home
    },
    {
        path: '/equipes',
        component: Equipe
    }
];

const router = new VueRouter({routes});



const app = new Vue({
    el: '#app',
    router: router
});
