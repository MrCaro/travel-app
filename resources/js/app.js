import destinationsView from "./components/destinationsView";

require('./bootstrap');
window.Vue = require('vue');

import VueRouter from 'vue-router';
Vue.use(VueRouter);

Vue.component('destinations-thumbnails', require('./components/destinationsHome.vue').default);
Vue.component('destinations-info', require('./components/destinationsView.vue').default);

const router = new VueRouter( {
    routes: [
        {
            path:'/',
            component: destinationsView.vue,
        },
        {
            path:'/view',
            component: destinationsView.vue,
        }
    ]
});

const app = new Vue({
    el: '#app',
    router

});

