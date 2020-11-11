

require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';
Vue.use(VueRouter);

Vue.component('pagination', require('laravel-vue-pagination'));
Vue.component('add-equipe', require('./components/AddEquipeComponent.vue').default);
Vue.component('edit-equipe', require('./components/EditEquipeComponent.vue').default);

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
