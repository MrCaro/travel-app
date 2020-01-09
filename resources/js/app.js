import destinationsView from "./components/destinationsView";

require('./bootstrap');
window.Vue = require('vue');

import VueRouter from 'vue-router';
Vue.use(VueRouter);

Vue.component('destinations-thumbnails', require('./components/destinationsHome.vue').default);
Vue.component('destinations-info', require('./components/destinationsView.vue').default);
Vue.component('destinations-cards', require('./components/destinationCards.vue').default);
Vue.component('destination-itinerary', require('./components/destinationItinerary.vue').default);

const router = new VueRouter( {
    //with history you remove '#'
    mode: "history",
    routes: [
        {
            path:'/',
            component: destinationsView.vue,
            props: {default: true}
        },
        {
            path:'/view',
            component: destinationsView.vue,
            props: (route) => ({ query: route.query.destination })
        }
    ]
});

const app = new Vue({
    el: '#app',
    router,
});

