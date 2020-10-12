import Vue from "vue";
import VueRouter from "vue-router";
import ApolloClient from 'apollo-boost'
import VueApollo from 'vue-apollo'
import './bootstrap';
import PostLists from "./PostLists";
import Post from "./Post";
import PostTopicList from "./PostTopicList";
import PostAuthorList from "./PostAuthorList";

window.Vue = Vue;
Vue.use(VueRouter);

const routes = [
    {
        path: '/',
        name: 'index',
        component: PostLists
    },
    {
        path: '/post/:id',
        name: 'post',
        component: Post
    },
    {
        path: '/topic/:slug',
        name: 'topic',
        component: PostTopicList
    },
    {
        path: '/author/:id',
        name: 'author',
        component: PostAuthorList
    },
];

Vue.use(VueApollo)
const apolloClient = new ApolloClient({
    // You should use an absolute URL here
    uri: 'http://blogql.local/graphql'
})

const apolloProvider = new VueApollo({
    defaultClient: apolloClient,
})

const router = new VueRouter({
    mode: 'history',
    routes
});

const app = new Vue({
    el: '#app',
    apolloProvider,
    router
});
