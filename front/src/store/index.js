import Vue from 'vue'
import Vuex from 'vuex'

import products from './products'
import session from './session'
import carts from './carts'

Vue.use(Vuex)

export default new Vuex.Store({
  strict: process.env.NODE_ENV !== 'production',

  state: {
  },

  mutations: {
  },

  actions: {
  },

  modules: {
    products,
    carts,
    session
  }
})
