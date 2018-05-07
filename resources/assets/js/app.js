
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('teams-list', require('./components/TeamsList.vue'));
Vue.component('team-create', require('./components/TeamCreate.vue'));
Vue.component('players-list', require('./components/PlayersList.vue'));
Vue.component('player-create', require('./components/PlayerCreate.vue'));

const app = new Vue({
    el: '#app'
});
