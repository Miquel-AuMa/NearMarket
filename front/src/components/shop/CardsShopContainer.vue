<template>
  <div class="card-container">
    <el-row :gutter="10" justify="center">
      <el-col :xs="24" :sm="12" :md="8" :lg="6" v-for="shop in shops" :key="shop.id" class="padding-10">
        <CardShop :shop="shop" ></CardShop>
      </el-col>
    </el-row>
  </div>
</template>

<script>
import CardShop from './CardShop'
export default {
  components: {
    CardShop
  },
  data () {
    return {
      shops: [
        {
          id: 1,
          name: 'Tienda Manolo',
          address: 'Calle Falsa 123',
          image: 'https://images.unsplash.com/photo-1546237769-6f84ec1a512a?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=80',
          category: { name: 'Category 1', id: 1 }
        },
        {
          id: 2,
          name: 'Tienda María',
          address: 'Calle Falsa 456',
          image: 'https://images.unsplash.com/photo-1515182629504-727d7753751f?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=676&q=80',
          category: { name: 'Category 2', id: 2 }
        },
        {
          id: 3,
          name: 'Tienda Manolo',
          address: 'Calle Falsa 123',
          image: 'https://images.unsplash.com/photo-1546237769-6f84ec1a512a?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=80',
          category: { name: 'Category 3', id: 3 }
        },
        {
          id: 4,
          name: 'Tienda María',
          address: 'Calle Falsa 456',
          image: 'https://images.unsplash.com/photo-1515182629504-727d7753751f?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=676&q=80',
          category: { name: 'Category 4', id: 4 }
        },
        {
          id: 5,
          name: 'Tienda Manolo',
          address: 'Calle Falsa 123',
          image: 'https://images.unsplash.com/photo-1546237769-6f84ec1a512a?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=80',
          category: { name: 'Category 5', id: 5 }
        },
        {
          id: 6,
          name: 'Tienda María',
          address: 'Calle Falsa 456',
          image: 'https://images.unsplash.com/photo-1515182629504-727d7753751f?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=676&q=80',
          category: { name: 'Category 6', id: 6 }
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
