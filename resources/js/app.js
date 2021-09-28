require('./bootstrap');
import vue from 'vue';
window.Vue = vue;
import router from './router'
import store from './store'
import vuetify from './plugins/vuetify';
//import 'material-design-icons-iconfont/dist/material-design-icons.css'
import App from './components/App';



const app = new Vue({
    el: '#app',
    components:{App }, router, store, moment, vuetify
});

