import shuffle from 'lodash/shuffle'

export function filteredElements ({ products, shops, searchText, searchType }, { shuffledElement }) {
  const textValidation = (a, b) => b.toLowerCase().includes(a.toLowerCase())

  const filterPredicate = list => list.filter(x => textValidation(searchText, x.name))

  switch (searchType) {
    case 'products':
      return filterPredicate(products)

    case 'places':
      return filterPredicate(shops)

    default:
      return filterPredicate(shuffledElement)
  }
}

export function getSearchType ({ searchType }) {
  return searchType
}

export function shuffledElement ({ products, shops }) {
  return shuffle([
    ...products,
    ...shops
  ])
}

export function shop ({ shops }, _, { route }) {
  const { name, params } = route

  if (!name.includes('shop') || !params.id) {
    return null
  }

  return shops.find(x => x.id === parseInt(params.id))
}

export function product ({ products }, _, { route }) {
  const { name, params } = route

  if (!name.includes('product') || !params.id) {
    return null
  }

  return products.find(x => x.id === parseInt(params.id))
}
