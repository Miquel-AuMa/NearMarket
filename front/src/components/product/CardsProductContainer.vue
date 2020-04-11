<template>
  <div class="card-container">
    <el-row :gutter="10" justify="center">
      <el-col :xs="24" :sm="12" :md="8" :lg="6" v-for="product in products" :key="product.id" class="padding-10">
        <CardProduct :product="product" ></CardProduct>
      </el-col>
    </el-row>
  </div>
</template>

<script>
import CardProduct from './CardProduct'
// import { mapGetters } from 'vuex'

export default {
  components: {
    CardProduct
  },
  data () {
    return {
      products: [
        {
          id: 1,
          name: 'Pan',
          description: 'Pan de pueblo',
          image: 'https://images.unsplash.com/photo-1509440159596-0249088772ff?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1352&q=80',
          category: { name: 'pan', id: 1 }
        },
        {
          id: 2,
          name: 'Gasolina',
          description: 'Gasolina',
          image: 'https://images.unsplash.com/photo-1516024851043-da0e0fba8983?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80',
          category: { name: 'Gasolina', id: 2 }
        },
        {
          id: 1,
          name: 'Pan',
          description: 'Pan de pueblo',
          image: 'https://images.unsplash.com/photo-1509440159596-0249088772ff?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1352&q=80',
          category: { name: 'pan', id: 1 }
        },
        {
          id: 2,
          name: 'Gasolina',
          description: 'Gasolina',
          image: 'https://images.unsplash.com/photo-1516024851043-da0e0fba8983?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80',
          category: { name: 'Gasolina', id: 2 }
        },
        {
          id: 1,
          name: 'Pan',
          description: 'Pan de pueblo',
          image: 'https://images.unsplash.com/photo-1509440159596-0249088772ff?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1352&q=80',
          category: { name: 'pan', id: 1 }
        },
        {
          id: 2,
          name: 'Gasolina',
          description: 'Gasolina',
          image: 'https://images.unsplash.com/photo-1516024851043-da0e0fba8983?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80',
          category: { name: 'Gasolina', id: 2 }
        }
      ]
    }
  }
}
</script>

<style scoped>
  .card-container{
    width: 80%;
    margin: 0 auto;
  }
  .padding-10{
    padding:10px;
  }
</style>
