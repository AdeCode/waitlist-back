/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

import axios from "axios";
import Vue from "vue";

Vue.use(axios);

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('show-waitlist', require('./components/Waitlist.vue').default);

const app = new Vue({
    el: '#app',
});
