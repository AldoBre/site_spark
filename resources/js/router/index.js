import { createRouter, createWebHistory } from "vue-router";
import store from "../store";
import invoiceIndex from '../components/invoices/Index.vue'
import notFound from '../components/invoices/NotFound.vue'
import LoginAdmin from '../components/views/admin/LoginAdmin.vue'
import HomeAdmin from '../components/views/admin/HomeAdmin.vue'
import AppAdmin from '../components/AppAdmin.vue'
import AppDefault from '../components/views/AppDefault.vue'
import ImagesCarrousel from '../components/views/admin/ImagesCarrousel.vue'
import Grafico from '../components/views/admin/GraphicRam.vue'
import MyAccount from '../components/views/admin/MyAccount.vue'
import RegisterUser from '../components/views/admin/RegisterUser.vue'
import RegisterCustumer from '../components/views/admin/RegisterCustumer.vue'

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
        meta: { title: 'Admin' },
        isMain: true,
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
            },
            {
                path: 'grafico',
                name: 'grafico',
                component: Grafico,
                meta: { title: 'grafico' }
            },
            {
                path: 'my-account',
                name: 'MyAccount',
                component: MyAccount,
                meta: { title: 'Minha Conta' }
            },
            {
                path: 'cadastro/usuario',
                name: 'RegisterUser',
                component: RegisterUser,
                meta: { title: 'Cadastro de usuário' }
            },
            {
                path: 'cadastro/clientes',
                name: 'RegisterCustumer',
                component: RegisterCustumer,
                meta: { title: 'Cadastro de usuário' }
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
