import Vue from 'vue'
import VueRouter from 'vue-router'
import { publicRoute } from './helpers'

Vue.use(VueRouter)

const routes = [
  publicRoute({ path: '/', name: 'home' }, 'Home'),
  publicRoute({ path: '/about', name: 'about' }, 'About'),
  publicRoute({ path: '/shop', name: 'shop' }, 'Shop')
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
