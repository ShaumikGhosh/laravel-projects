require('./bootstrap');

window.Vue = require('vue');

import { Form, HasError, AlertError } from 'vform';
import VueRouter from 'vue-router'
import Dashboard from "./components/Dashboard";
import Profile from "./components/Profile";
import Users from "./components/Users";
import Swal from "sweetalert2";


Vue.config.devtools = true;
Vue.config.productionTip = false;


window.Form = Form;
window.Swal = Swal;


const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    onOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
});
window.Toast = Toast;

let Fire = new Vue();
window.Fire = Fire;

Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

Vue.use(VueRouter)

const routes = [
    {
        path: '/home',
        name:'dashboard',
        component: Dashboard
    },
    {
        path: '/profile',
        name: 'profile',
        component: Profile
    },
    {
        path: '/users',
        name: 'users',
        component: Users
    },
]

const router = new VueRouter({
    mode: 'history',
    routes,
})


new Vue({
    el: '#app',
    router,
});
