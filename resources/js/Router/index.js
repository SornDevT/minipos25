import { createRouter, createWebHistory } from "vue-router";

import Product from "../Pages/Product.vue";
import Category from "../Pages/Category.vue";
import Pos from "../Pages/Pos.vue";
import Transection from "../Pages/Transection.vue";
import Report from "../Pages/Report.vue";
import NoPage from "../Pages/NoPage.vue";
import Login from "../Pages/Login.vue";
import Register from "../Pages/Register.vue";


// Check Authentication
import { useAuthStore } from "../Store/auth.js";

const isAuthenticated = () => {
    const authStore = useAuthStore();
    return !!authStore.isLogin;
}

const routes =[
    {
        name: 'Login',
        path: '/login',
        component: Login,
    },
    {
        name: 'Register',
        path: '/register',
        component: Register,
    },
    {
        path: '/',
        redirect: '/product'
    },
    {
        name: 'Product',
        component: Product,
        path: '/product',
        meta: { isAuthenticated: true },

    },
    {
        name: 'Category',
        component: Category,
        path: '/category',
        meta: { isAuthenticated: true },
    },
    {
        name: 'Pos',
        component: Pos,
        path: '/pos',
        meta: { isAuthenticated: true },
    },
    {
        name: 'Transection',
        component: Transection,
        path: '/transection',
        meta: { isAuthenticated: true },
    },
    {
        name: 'Report',
        component: Report,
        path: '/report',
        meta: { isAuthenticated: true },
    },
    {
        name: 'NoPage',
        component: NoPage,
        path: '/:pathMatch(.*)*'
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
    scrollBehavior(to, from, savedPosition) {
        return savedPosition || { top: 0 };
    }
});

// Navigation Guard
router.beforeEach((to, from, next) => {
    if (to.meta.isAuthenticated && !isAuthenticated()) {
        next({ name: 'Login' });
    } else if((to.name === 'Login') && isAuthenticated()) {
        next({ name: 'Product' });
    } else {
        next();
    }
});

export default router;