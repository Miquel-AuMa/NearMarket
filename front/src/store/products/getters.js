import shuffle from 'lodash/shuffle'

export function filteredElements ({ products, places, searchText, searchType }, { shuffledElement }) {
  const textValidation = (a, b) => b.toLowerCase().includes(a.toLowerCase())

  const filterPredicate = list => list.filter(x => textValidation(searchText, x.name))

  switch (searchType) {
    case 'products':
      return filterPredicate(products)

    case 'places':
      return filterPredicate(places)

    default:
      return filterPredicate(shuffledElement)
  }
}

export function shuffledElement ({ products, places }) {
  return shuffle([
    ...products,
    ...places
  ])
}
