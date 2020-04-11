<template>
  <el-card :body-style="{ padding: '0px' }">
    <img :src="element.image" class="image" />

    <div class="p-md">
      <span>{{ element.name }}</span>
      <div class="bottom clearfix">
        <address class="time">{{ element.address || '' }}</address>

        <p class="description-card">{{ element.description || ' '}}</p>

        <div class="separator"></div>

        <div class="p-sm">
          <el-tag>{{ element.category.name }}</el-tag>
        </div>
        <div v-if="type === 'products'">
          <el-button type="primary" @click="addToCart">
            <i class="el-icon-shopping-cart-1"></i>
            Agregar al carrito
          </el-button>
        </div>
      </div>
    </div>
  </el-card>
</template>

<script>
export default {
  props: {
    element: {
      type: Object
    },
    type: {
      type: String
    }
  },
  methods: {
    addToCart () {
      const shopId = parseInt(this.$route.params.id)
      this.$store.dispatch('carts/addCartItem', { shop: shopId, product: this.element, amount: 1 })
    }
  }
}
</script>

<style scoped>
  .description-card{
    font-size: .9rem;
    color: #999;
    text-align: justify;
  }

  .separator{
    border-bottom: 1px solid darkgrey;
    margin: .75rem .25rem;
  }

  .time {
    font-size: .9rem;
    color: #999;
  }

  .bottom {
    margin-top: .9rem;
    line-height: 12px;
  }

  /* .button {
    padding: 0;
    float: right;
  } */

  .image {
    width: 100%;
    display: block;
    max-height: 150px;
    object-fit: cover;
  }

  /* .clearfix:before,
  .clearfix:after {
    display: table;
    content: "";
  }
  .clearfix:after {
    clear: both
  } */
</style>
