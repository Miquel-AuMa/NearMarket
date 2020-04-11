export function setSearchBar (state, { text, type }) {
  state.searchText = text
  state.searchType = type
}

export function setShops (state, shops) {
  state.shops = shops
}

export function setShop (state, shop) {
  const index = state.shops.findIndex(x => x.id === shop.id)

  if (index !== -1) {
    state.shops = [
      ...state.shops.slice(0, index),
      shop,
      ...state.shops.slice(index + 1)
    ]
  } else {
    state.shops = [
      ...state.shops,
      shop
    ]
  }
}

export function addShop (state, shop) {
  const index = state.shops.findIndex(x => x.id === shop.id)

  if (index !== -1) {
    state.shops = [
      ...state.shops,
      shop
    ]
  }
}

export function deleteShop (state, shop) {
  const index = state.shops.findIndex(x => x.id === shop.id)

  if (index !== -1) {
    state.shops = [
      ...state.shops.slice(0, index),
      ...state.shops.slice(index + 1)
    ]
  }
}

export function setProducts (state, products) {
  state.products = products
}

export function setProduct (state, product) {
  const index = state.products.findIndex(x => x.id === product.id)

  if (index !== -1) {
    state.products = [
      ...state.products.slice(0, index),
      product,
      ...state.products.slice(index + 1)
    ]
  } else {
    state.products = [
      ...state.products,
      product
    ]
  }
}

export function addProduct (state, product) {
  const index = state.products.findIndex(x => x.id === product.id)

  if (index !== -1) {
    state.products = [
      ...state.products,
      product
    ]
  }
}

export function deleteProduct (state, product) {
  const index = state.products.findIndex(x => x.id === product.id)

  if (index !== -1) {
    state.products = [
      ...state.products.slice(0, index),
      ...state.products.slice(index + 1)
    ]
  }
}
