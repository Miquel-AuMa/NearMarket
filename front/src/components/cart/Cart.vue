<template>
  <div>
    <div
      v-for="item in cart.cartItems"
      :key="item.id"
      class="cart-item-row"
    >
      <el-row>
        <el-col :xs="{ span: 24 }" class="cart-item-name">
          {{ item.product.name }} {{ item.product.id }} ({{item.amount}})
        </el-col>
        <el-col :xs="{ span: 8 }">
          <el-button
            type="secondary"
            plain
            size="small"
            icon="el-icon-remove"
            @click="changeCartItemAmount(item, -1)"
          />
        </el-col>
        <el-col :xs="{ span: 8 }">
          <el-button
            type="secondary"
            plain
            size="small"
            icon="el-icon-circle-plus"
            @click="changeCartItemAmount(item, 1)"
          />
        </el-col>
        <el-col :xs="{ span: 8 }">
          <el-button
            type="danger"
            size="small"
            icon="el-icon-delete"
            @click="removeCartItem(item)"
          />
        </el-col>
      </el-row>
    </div>
    <div class="total-amount">Total: {{ totalAmount }} €</div>
    <el-button
      type="primary"
      @click="submitOrder"
      v-if="cart.cartItems.length > 0"
    >
      Finalizar pedido
    </el-button>
  </div>
</template>

<script>
import { mapGetters } from 'vuex'

export default {
  name: 'Cart',
  props: {
    shop: {
      default: null
    }
  },
  data () {
    return {
      cart: { shop: this.shop, cartItems: [] }
    }
  },
  updated () {
    this.cart = this.getCart()
  },
  mounted () {
    this.cart = this.getCart()
    this.initializeFakeData()
  },
  computed: {
    ...mapGetters('carts', ['getCarts']),
    totalAmount () {
      if (this.cart.cartItems.length === 0) {
        return 0
      }
      return this.cart.cartItems.reduce((sum, item) => {
        return { amount: sum.amount + item.product.price * item.amount }
      }).amount
    }
  },
  methods: {
    submitOrder () {
      console.log('Submit pedido')
    },
    changeCartItemAmount (item, amount) {
      if (item.amount + amount < 1) {
        if (!confirm('¿Eliminar ' + item.product.name + ' del carrito?')) {
          return
        }
      }
      this.$store.dispatch('carts/changeCartItemAmount', { shop: this.shop, product: item.product, amount: amount })
    },
    removeCartItem (item) {
      if (!confirm('¿Eliminar ' + item.product.name + ' del carrito?')) {
        return
      }
      this.$store.dispatch('carts/removeCartItem', { shop: this.shop, product: item.product })
    },
    getCart () {
      return this.getCarts.find(cart => cart.shopId === this.shop) || { shopId: this.shop, cartItems: [] }
    },
    initializeFakeData () {
      if (this.cart.cartItems.length > 0) {
        return
      }
      this.$store.dispatch('carts/addCartItem', { shop: this.shop, product: { id: 1, name: 'Nombre', description: 'Desc', price: 1 }, amount: 1 })
      this.$store.dispatch('carts/addCartItem', { shop: this.shop, product: { id: 2, name: 'Nombre', description: 'Desc', price: 2 }, amount: 2 })
      this.$store.dispatch('carts/addCartItem', { shop: this.shop, product: { id: 3, name: 'Nombre', description: 'Desc', price: 3 }, amount: 3 })
      this.$store.dispatch('carts/addCartItem', { shop: this.shop, product: { id: 4, name: 'Nombre', description: 'Desc', price: 4 }, amount: 4 })
    }
  }
}
</script>

<style scoped>
  .cart-item-row {
    border-bottom: 1px solid #555;
    padding: 10px 0;
  }
  .cart-item-name {
    text-align: left;
    padding: 0 0 10px 0;
    margin: 0 0 10px 0;
    border-bottom: 1px solid #eee;
  }
  .total-amount {
    text-align: right;
    font-weight: bold;
    font-size: 1.5rem;
    border-bottom: 1px solid #555;
    margin: 10px 0;
  }
</style>
