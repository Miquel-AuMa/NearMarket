export function addCartItem ({ commit }, payload) {
  commit('addCartItem', payload)
}

export function removeCartItem ({ commit }, payload) {
  commit('removeCartItem', payload)
}

export function changeCartItemAmount ({ commit }, payload) {
  commit('changeCartItemAmount', payload)
}
