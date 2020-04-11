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
        path: '/shop/:id',
        parameters: true,
        name: 'shop',
        component: () => import('../views/Shop.vue')
      }
    ].map(publicRoute)
  },
  publicRoute({
    path: '/login',
    name: 'login',
    component: () => import('../views/login/Login.vue')
  })
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
