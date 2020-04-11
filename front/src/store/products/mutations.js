export function setPlaces (state, places) {
  state.places = places
}

export function setProducts (state, products) {
  state.products = products
}

export function setSearchBar (state, { text, type }) {
  state.searchText = text
  state.searchType = type
}
