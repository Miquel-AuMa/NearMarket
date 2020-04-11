import { ShopService, ProductService } from '../services/Crud'

export function blankSearchBar ({ commit }) {
  commit('setSearchBar', { text: '', type: 'places' })
}

export function setSearchBar ({ commit }, payload) {
  commit('setSearchBar', payload)
}

export async function fetchShops ({ commit }) {
  const response = await ShopService.fetch()

  if (response.isOk) {
    commit('setShops', response.data)
  }

  return response
}
export async function getShop ({ commit }, id) {
  const response = await ShopService.get({ id })

  if (response.isOk) {
    commit('setShop', response.data)
  }

  return response
}
export async function storeShop ({ commit }, payload) {
  const response = await ShopService.create(payload)

  if (response.isOk) {
    commit('addShop', response.data)
  }

  return response
}
export async function editShop ({ commit }, payload) {
  const response = await ShopService.update(payload)

  if (response.isOk) {
    commit('setShop', response.data)
  }

  return response
}
export async function deleteShop ({ commit }, id) {
  const response = await ShopService.remove({ id })

  if (response.isOk) {
    commit('deleteShop', response.data)
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
