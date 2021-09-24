require('./bootstrap');
import vue from 'vue';
window.Vue = vue;
import router from './router'
import store from './store'
import App from './components/App';



const app = new Vue({
    el: '#app',
    components:{App }, router, store, moment
});

