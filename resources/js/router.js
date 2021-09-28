import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)
import Home from './views/Home'

const router =  new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '*',
            name: 'login',
            component: ()=> import('./views/Login.vue')
        },
        {
            path: '/',
            name: 'login',
            component: ()=> import('./views/Login.vue')
        },
        {
            path: '/login',
            name: 'login',
            component: ()=> import('./views/Login.vue')
        },
       
        {
            path: '/main',
            name: 'main',
            component: ()=> import('./views/Main.vue')
        },
        {
            path: '/home',
            name: 'home',
            component: ()=> import('./views/Home.vue')
        },
        

    ],
})

export default router
