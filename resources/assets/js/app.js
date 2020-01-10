window._ = require('lodash');

window.axios = require('axios');

window.axios.defaults.headers.common['Authorization'] = `Bearer mHUeREPpQJXFjZnC3R5mbZhZeUFf9barjbcB7qqyVXVevf3uujz9aTdbQPAK`;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

window.Vue = require('vue');

Vue.component('lsk-test', require('./components/LskTest.vue').default);
Vue.component('lsk-plans-table', require('./components/PlansTable.vue').default);
Vue.component('lsk-buy-plans', require('./components/BuyPlans.vue').default);

const app = new Vue({
    el: '#app',
});
