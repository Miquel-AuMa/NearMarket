<template>
  <div class="navbar">
    <el-menu :default-active="activeIndex" class="el-menu-demo" mode="horizontal" @select="handleSelect">
      <el-menu-item index="home"><img src="/near-market.svg" width="50" height="50"></el-menu-item>
      <el-menu-item index="cart" class="right-float" v-if="$route.name === 'shop'"><span class="el-icon-shopping-cart-2"></span>({{findCart.cartItems.length}})</el-menu-item>
      <el-menu-item index="login" class="right-float">Entrar</el-menu-item>
      <el-menu-item index="register" class="right-float">Registro</el-menu-item>
    </el-menu>
    <div class="line"></div>
  </div>
</template>

<script>
import { mapGetters } from 'vuex'

export default {
  name: 'NavBar',
  data () {
    return {
      activeIndex: '1',
      activeIndex2: '1'
    }
  },
  computed: {
    ...mapGetters('carts', ['getCarts']),
    findCart () {
      const id = parseInt(this.$route.params.id)
      return this.getCarts.find(cart => cart.shopId === id)
    }
  },
  methods: {
    handleSelect (key) {
      if (key === 'cart') {
        this.$router.push({ name: key, params: { shopId: this.$route.params.id } })
      } else {
        this.$router.push({ name: key })
      }
    }
  }
}
</script>
<style>
  .navbar{
    position: sticky;
    top:0;
  }
  .right-float{
    float:right!important;
  }
</style>
