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
Vue.component('question-create', require('./components/admin/vocabulary/QuestionCreate.vue').default);
Vue.component('question-list', require('./components/admin/vocabulary/QuestionList.vue').default);
Vue.component('vocabulary-detail', require('./components/admin/vocabulary/VocabularyDetail.vue').default);
Vue.component('vocabulary-list', require('./components/admin/vocabulary/VocabularyList.vue').default);
//listening
Vue.component('question-listening-list', require('./components/admin/listening/QuestionList.vue').default);
Vue.component('question-listening-create', require('./components/admin/listening/QuestionCreate.vue').default);
Vue.component('question-listening-detail', require('./components/admin/listening/QuestionDetail.vue').default);
Vue.component('topic-listening-list', require('./components/admin/listening/ListeningList.vue').default);
Vue.component('listening-detail', require('./components/admin/listening/ListeningDetail.vue').default);
//Reading
Vue.component('topic-reading-list', require('./components/admin/reading/ReadingList.vue').default);
Vue.component('topic-reading-create', require('./components/admin/reading/TopicCreate.vue').default);
Vue.component('topic-reading-detail', require('./components/admin/reading/TopicDetail.vue').default);
//grammar
Vue.component('question-grammar-create', require('./components/admin/grammar/QuestionCreate.vue').default);
Vue.component('question-grammar-list', require('./components/admin/grammar/QuestionList.vue').default);
Vue.component('grammar-detail', require('./components/admin/grammar/GrammarDetail.vue').default);
Vue.component('grammar-list', require('./components/admin/grammar/GrammarList.vue').default);
//user
Vue.component('user-list', require('./components/admin/user/UserList.vue').default);
Vue.component('user-create', require('./components/admin/user/UserCreate.vue').default);
Vue.component('user-edit', require('./components/admin/user/UserEdit.vue').default);
//role
Vue.component('role-list', require('./components/admin/role/RoleList.vue').default);
Vue.component('role-create', require('./components/admin/role/RoleCreate.vue').default);
Vue.component('role-edit', require('./components/admin/role/RoleEdit.vue').default);

//frontend
//header

Vue.component('header-component', require('./components/frontend/header.vue').default);
//home
Vue.component('home-page-component', require('./components/frontend/homePage/Home.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

