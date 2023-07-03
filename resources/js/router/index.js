import { createRouter, createWebHistory } from "vue-router";
import store from "../store";

import invoiceIndex from '../components/invoices/Index.vue'
import notFound from '../components/invoices/NotFound.vue'
import LoginAdmin from '../components/views/admin/LoginAdmin.vue'
import HomeAdmin from '../components/views/admin/HomeAdmin.vue'

const routes = [
    {
        path:'/',
        component: invoiceIndex
    },
    {
       path:'/:pathMatch(.*)',
       component: notFound
    },
    {
       path:'/admin/login',
       name: 'Login',
       component: LoginAdmin
    },
    {
       path:'/admin/home',
       name: 'Home',
       component: HomeAdmin
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

router.beforeResolve(async (to, from, next) => {
    store.dispatch('loading');
    await new Promise(resolve => {
      setTimeout(() => {
        store.dispatch('ignoreLoading');
        store.commit('DONE');
        resolve();
      }, 100);
    });
    next();
  });

export default router
