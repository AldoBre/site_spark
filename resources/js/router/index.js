import {createRouter, createWebHistory} from "vue-router";
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
import PasswordReset from '../components/views/admin/PasswordReset.vue'
import SendEmail from '../components/invoices/SendEmail.vue'
import AboutUs from '../components/invoices/AboutUs.vue'

const routes = [
  {
    path: '/',
    component: AppDefault,
    children: [
      {
        path: '',
        component: invoiceIndex,
      },
      {
        path: 'email-send',
        name: 'SendEmail',
        component: SendEmail,
        meta: {title: 'E-mail Enviado'}
      },
      {
        path: 'aboutus',
        name: 'AboutUs',
        component: AboutUs,
        meta: {title: 'Sobre Nós'}
      }
    ],
  },

  {
    path: '/admin',
    component: AppAdmin,
    meta: {title: 'Admin'},
    isMain: true,
    children: [
      {
        path: 'login',
        name: 'Login',
        component: LoginAdmin,
        meta: {title: 'Login Admin'}
      },
      {
        path: 'password/reset/:token',
        name: 'PasswordReset',
        component: PasswordReset,
        meta: {title: 'Redefinição de Senha'}
      },
      {
        path: 'home',
        name: 'Home',
        component: HomeAdmin,
        meta: {title: 'Home Admin', requiresAuth: true}
      },
      {
        path: 'images/carrousel',
        name: 'ImagesCarrousel',
        component: ImagesCarrousel,
        meta: {title: 'Carrousel', requiresAuth: true}
      },
      {
        path: 'grafico',
        name: 'grafico',
        component: Grafico,
        meta: {title: 'grafico', requiresAuth: true}
      },
      {
        path: 'minhaconta',
        name: 'MyAccount',
        component: MyAccount,
        meta: {title: 'Minha Conta', requiresAuth: true}
      },
      {
        path: 'cadastro/usuario',
        name: 'RegisterUser',
        component: RegisterUser,
        meta: {title: 'Cadastro de usuário', requiresAuth: true}
      },
      {
        path: 'cadastro/clientes',
        name: 'RegisterCustumer',
        component: RegisterCustumer,
        meta: {title: 'Cadastro de usuário', requiresAuth: true}
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

router.beforeEach(async (to, from, next) => {
  let baseTitle = "Belmira Tech";
  let pageTitle = to.meta && to.meta.title ? `${baseTitle} | ${to.meta.title}` : baseTitle;
  document.title = pageTitle;

  if (to.meta.requiresAuth) {
    const isAuthenticated = await store.dispatch('checkAuth')

    if (!isAuthenticated) {
      store.dispatch("message", {
        text: 'Usuário não autenticado',
        color: "blue",
      });
      next('/admin/login');
    } else {
      next();
    }
  } else {
    next();
  }
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
