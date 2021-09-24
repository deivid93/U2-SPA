import Vue from "vue"
import Vuex from "vuex"
import Axios from "axios";
import createCache from 'vuex-cache';


//modulos de la tienda
import login from './modulos/login'


Vue.use(Vuex);

const store = new Vuex.Store({
    plugins: [createCache()],
    state: {
        
    },
    mutations: {
        
    },
    actions:{
         
    },
    modules: {
        login

    }
})
//store.cache.dispatch('login/register');

export default store
