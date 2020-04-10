import Vue from 'vue'
import VueRouter from 'vue-router'
import { publicRoute } from './helpers'

Vue.use(VueRouter)

const routes = [
  publicRoute({ path: '/', name: 'Home' }, 'Home'),
  publicRoute({ path: '/about', name: 'About' }, 'About')
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
