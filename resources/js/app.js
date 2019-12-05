require('./bootstrap');
window.Vue = require('vue');

import destinationsHome from './components/destinationsHome.vue';
Vue.component('example', destinationsHome);

const app = new Vue({
    el: '#app'
});
