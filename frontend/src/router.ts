import { createRouter, createWebHistory } from 'vue-router'
import Login from './pages/login.vue'
import Register from './pages/register.vue'
import Home from './pages/home.vue'
import Dashboard from './pages/dashboard.vue'

const routes = [
    {
        path: '/',
        name: 'Login',
        component: Login
    },
    {
        path: '/register',
        name: 'Register',
        component: Register
    },
    {
        path: '/home',
        name: 'Home',
        component: Home
    },
        {
        path: '/dashboard',
        name: 'Dasboard',
        component: Dashboard
    },
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router