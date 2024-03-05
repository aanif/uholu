/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import Vue from 'vue'
import BootstrapVue from 'bootstrap-vue'

Vue.use(BootstrapVue)


import './bootstrap';
// import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'



window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('uploader', require('./components/ExampleComponent.vue').default);
Vue.component('testing', require('./components/test.vue').default);
//Vue.component('testingAuth', require('./components/testAuth.vue').default);
Vue.component('dashboard1', require('./components/dashboard1.vue').default);
Vue.component('admin', require('./components/dashboardAdmin.vue').default);
Vue.component('scanhistory', require('./components/scanrequesthistory.vue').default);
Vue.component('scanreqadmin', require('./components/scanrequestadmin.vue').default);
Vue.component('messages', require('./components/messages.vue').default);
Vue.component('termagreement', require('./components/termagreement.vue').default);
Vue.component('payment', require('./components/payment.vue').default);
Vue.component('contactform', require('./components/contactform.vue').default);
Vue.component('adminform', require('./components/contactformadmin.vue').default);
Vue.component('testingaddress', require('./components/addresstesting.vue').default);
Vue.component('addstaff', require('./components/addstaff.vue').default);
Vue.component('addadmin', require('./components/addadmin.vue').default);
Vue.component('keysadmin', require('./components/keysAdmin.vue').default);
Vue.component('passresetemail', require('./components/passresetemail.vue').default);
Vue.component('passreset', require('./components/passreset.vue').default);
Vue.component('emailverify', require('./components/emailverify.vue').default);
Vue.component('pendingreq', require('./components/pendingreq.vue').default);
Vue.component('history', require('./components/history.vue').default);
Vue.component('convo', require('./components/historyconvo.vue').default);
Vue.component('useractive', require('./components/useractive.vue').default);
Vue.component('userhistory', require('./components/userhistory.vue').default);
Vue.component('upgradepack', require('./components/upgradepackage.vue').default);
Vue.component('profile', require('./components/profile.vue').default);
Vue.component('requestpickup', require('./components/requestpickup.vue').default);
Vue.component('requestdelivery', require('./components/requestdelivery.vue').default);
Vue.component('supportadmin', require('./components/customersupportadmin.vue').default);
Vue.component('support', require('./components/customersupport.vue').default);
Vue.component('changepass', require('./components/changepassword.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',

});
