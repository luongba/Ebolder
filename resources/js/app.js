/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
window.$ = require('jquery')
window.JQuery = require('jquery')
import {Api} from "./utils/Api"
window.$Api = Api;
import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';
Vue.use(ElementUI);
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
Vue.component('question-create', require('./components/vocabulary/QuestionCreate.vue').default);
Vue.component('question-list', require('./components/vocabulary/QuestionList.vue').default);
Vue.component('vocabulary-detail', require('./components/vocabulary/VocabularyDetail.vue').default);
Vue.component('vocabulary-list', require('./components/vocabulary/VocabularyList.vue').default);
//listening
Vue.component('question-listening-list', require('./components/listening/QuestionList.vue').default);
Vue.component('question-listening-create', require('./components/listening/QuestionCreate.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

