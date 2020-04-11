import Vue from 'vue'
import VueRouter from 'vue-router'
import { publicRoute } from './helpers'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    component: () => import('../layouts/MainLayout.vue'),
    children: [
      {
        path: '/',
        name: 'home',
        component: () => import('../views/Home.vue')
      },
      {
        path: '/about',
        name: 'about',
        component: () => import('../views/About.vue')
      },
      {
        path: '/shop',
        name: 'shop',
        component: () => import('../views/Shop.vue')
      },
      {
        path: '/login',
        name: 'login',
        component: () => import('../components/auth/Login')
      },
      {
        path: '/register',
        name: 'register',
        component: () => import('../components/auth/register/Register')
      }
    ].map(publicRoute)
  }
  /* {
    path: '/login',
    component: () => import('../layouts/LoginLayout.vue'),
    children: [
      {
        path: '/',
        name: 'Login',
        component: () => ('../views/login/Login.vue')
      }
    ].map(publicRoute)
  } */
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
