import { createRouter, createWebHistory } from "vue-router";
import store from "../store";
import invoiceIndex from '../components/invoices/Index.vue'
import notFound from '../components/invoices/NotFound.vue'
import LoginAdmin from '../components/views/admin/LoginAdmin.vue'
import HomeAdmin from '../components/views/admin/HomeAdmin.vue'
import AppAdmin from '../components/AppAdmin.vue'
import AppDefault from '../components/views/AppDefault.vue'
import ImagesCarrousel from '../components/views/admin/ImagesCarrousel.vue'

const routes = [
    {
        path: '/',
        component: AppDefault,
        children: [
            {
                path: '',
                component: invoiceIndex,
            },
        ],
    },

    {
        path: '/admin',
        component: AppAdmin,
        children: [
            {
                path: 'login',
                name: 'Login',
                component: LoginAdmin,
                meta: { title: 'Login Admin' }
            },
            {
                path: 'home',
                name: 'Home',
                component: HomeAdmin,
                meta: { title: 'Home Admin' }
            },
            {
                path: 'images/carrousel',
                name: 'ImagesCarrousel',
                component: ImagesCarrousel,
                meta: { title: 'Carrousel' }
            }

        ]
    },
    {
        path: '/:pathMatch(.*)',
        component: notFound
    },

]

const router = createRouter({
    history: createWebHistory(),
    routes
})

router.beforeEach((to, from, next) => {
    let baseTitle = "Belmira Tech";

    let pageTitle = to.meta && to.meta.title ? `${baseTitle} | ${to.meta.title}` : baseTitle;

    document.title = pageTitle;

    next();
});

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
