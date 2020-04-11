import { PlaceService, ProductService } from '../services/Crud'

export function blankSearchBar ({ commit }) {
  commit('setSearchBar', { text: '', type: '' })
}

export function setSearchBar ({ commit }, payload) {
  commit('setSearchBar', payload)
}

export async function fetchPlaces ({ commit }) {
  const response = await PlaceService.fetch()

  if (response.isOk) {
    commit('setPlaces', response.data)
  }

  return response
}
export async function getPlace ({ commit }, id) {
  const response = await PlaceService.get({ id })

  if (response.isOk) {
    commit('setPlace', response.data)
  }

  return response
}
export async function storePlace ({ commit }, payload) {
  const response = await PlaceService.create(payload)

  if (response.isOk) {
    commit('addPlace', response.data)
  }

  return response
}
export async function editPlace ({ commit }, payload) {
  const response = await PlaceService.update(payload)

  if (response.isOk) {
    commit('setPlace', response.data)
  }

  return response
}
export async function deletePlace ({ commit }, id) {
  const response = await PlaceService.remove({ id })

  if (response.isOk) {
    commit('deletePlace', response.data)
  }

  return response
}

export async function fetchProducts ({ commit }) {
  const response = await ProductService.fetch()

  if (response.isOk) {
    commit('setProducts', response.data)
  }

  return response
}
export async function getProduct ({ commit }, id) {
  const response = await ProductService.get({ id })

  if (response.isOk) {
    commit('setProduct', response.data)
  }

  return response
}
export async function storeProduct ({ commit }, payload) {
  const response = await ProductService.create(payload)

  if (response.isOk) {
    commit('addProduct', response.data)
  }

  return response
}
export async function editProduct ({ commit }, payload) {
  const response = await ProductService.update(payload)

  if (response.isOk) {
    commit('setProduct', response.data)
  }

  return response
}
export async function deleteProduct ({ commit }, id) {
  const response = await ProductService.remove({ id })

  if (response.isOk) {
    commit('deleteProduct', response.data)
  }

  return response
}
