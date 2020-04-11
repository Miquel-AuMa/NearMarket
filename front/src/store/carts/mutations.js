export function addCartItem (state, payload) {
  const { shop, product, amount } = payload
  const otherCarts = state.carts.filter((shopCart) => shopCart.shopId !== shop)
  const cart = state.carts.find(shopCart => shopCart.shopId === shop) || { shopId: shop, cartItems: [] }
  cart.cartItems.push({ product: product, amount: amount })
  state.carts = [
    ...otherCarts,
    cart
  ]

  localStorage.setItem('carts', JSON.stringify(state.carts))
}

export function removeCartItem (state, payload) {
  const { shop, product } = payload
  const otherCarts = state.carts.filter((shopCart) => shopCart.shopId !== shop)
  const cart = state.carts.find(shopCart => shopCart.shopId === shop) || { shopId: shop, cartItems: [] }
  cart.cartItems = [
    ...cart.cartItems.filter(item => item.product.id !== product.id)
  ]

  state.carts = [
    ...otherCarts,
    cart
  ]

  localStorage.setItem('carts', JSON.stringify(state.carts))
}

export function changeCartItemAmount (state, payload) {
  const { shop, product, amount } = payload
  const otherCarts = state.carts.filter((shopCart) => shopCart.shopId !== shop)
  const cart = state.carts.find(shopCart => shopCart.shopId === shop) || { shopId: shop, cartItems: [] }
  const item = cart.cartItems.find(cartItem => cartItem.product.id === product.id)
  item.amount += amount

  state.carts = [
    ...otherCarts,
    cart
  ]

  if (item.amount < 1) {
    removeCartItem(state, payload)
  }

  localStorage.setItem('carts', JSON.stringify(state.carts))
}
