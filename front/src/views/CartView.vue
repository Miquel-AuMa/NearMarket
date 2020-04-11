<template>
  <Cart :shop="$route.params.shopId"></Cart>
</template>

<script>
import Cart from '@/components/cart/Cart'
export default {
  name: 'CartView',
  components: {
    Cart
  }
}
</script>

<style scoped>

</style>
