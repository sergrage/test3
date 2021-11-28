import 'bootstrap';
window._ = require('lodash');
window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.Vue = require('vue').default;

import store from './store'


Vue.component('carriers-component', require('./components/CarriersComponent.vue').default);
Vue.component('workers-component', require('./components/WorkersComponent.vue').default);
Vue.component('intervals-component', require('./components/IntervalsComponent.vue').default);
Vue.component('olympiad-component', require('./components/OlympiadComponent.vue').default);


const app = new Vue({
    store,
    el: '#app',
    created() {
        this.$store.dispatch('getCarriers')
    }
});
