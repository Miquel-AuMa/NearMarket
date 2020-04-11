export function blankSearchBar ({ commit }) {
  commit('setSearchBar', { text: '', type: '' })
}

export function setSearchBar ({ commit }, payload) {
  commit('setSearchBar', payload)
}
