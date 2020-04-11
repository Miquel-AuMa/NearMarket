import Vue from 'vue'
import Vuex from 'vuex'

import products from './products'
import session from './session'

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
    session
  }
})
