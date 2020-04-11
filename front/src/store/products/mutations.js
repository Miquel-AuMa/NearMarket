export function setSearchBar (state, { text, type }) {
  state.searchText = text
  state.searchType = type
}

export function setPlaces (state, places) {
  state.places = places
}

export function setPlace (state, place) {
  const index = state.places.findIndex(x => x.id === place.id)

  if (index !== -1) {
    state.places = [
      ...state.places.slice(0, index),
      place,
      ...state.places.slice(index + 1)
    ]
  } else {
    state.places = [
      ...state.places,
      place
    ]
  }
}

export function addPlace (state, place) {
  const index = state.places.findIndex(x => x.id === place.id)

  if (index !== -1) {
    state.places = [
      ...state.places,
      place
    ]
  }
}

export function deletePlace (state, place) {
  const index = state.places.findIndex(x => x.id === place.id)

  if (index !== -1) {
    state.places = [
      ...state.places.slice(0, index),
      ...state.places.slice(index + 1)
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
