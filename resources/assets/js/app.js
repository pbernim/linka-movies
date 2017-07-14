
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

 // Vue.component('example', require('./components/Example.vue'));

require('./bootstrap');

window.Vue = require('vue');

// Controllers
const Movies = Vue.component('movies', require('./components/Movies.vue'));
const Movie = Vue.component('movie', require('./components/Movie.vue'));

// Routes
Vue.use(VueRouter);
import Vue from 'vue'
import VueRouter from 'vue-router'

const routes = [
    {
        path: '/',
        name: 'movies',
        component: Movies
    },
    {
        path: '/movie/:slug',
        name: 'movie',
        component: Movie
    },
    {
        path: '*', 
        redirect: '/'
    }
];

const router = new VueRouter({
    //mode: 'history',
    routes: routes
});
router.mode = 'html5';

// Global filters
Vue.filter('storage', function(value) {
	if(value) {
		return value.replace('public', "storage");
	}        
});

import App from './App.vue'

const app = new Vue({
    router,
    el: '#app',
    render: h => h(App)
});






