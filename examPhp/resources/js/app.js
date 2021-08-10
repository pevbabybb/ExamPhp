require('./bootstrap');

import Vue from 'vue'
import App from './vue/app'
import BootstrapVue from 'bootstrap-vue' //Importing

Vue.use(BootstrapVue) // Telling Vue to use this in whole application

const app = new Vue({
    el:"#app",
    components: {App}
})
