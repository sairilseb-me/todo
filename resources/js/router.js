import {createRouter, createWebHistory} from 'vue-router';
import Login from '../js/components/pages/Login.vue';
import Register from '../js/components/pages/Register.vue';
import Todo from '../js/components/pages/Todo.vue';

const routes = [
    {
        path: '/login',
        component: Login,
        name: 'login'
    },
    {
        path: '/register',
        component: Register,
        name: 'register',
    },
    {
        path: '/',
        component: Todo,
        name: 'home'
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;