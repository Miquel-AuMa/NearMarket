<template>
  <div class="card-container">
    <el-row :gutter="10" :justify="'center'">
      <el-col :xs="24" :sm="12" :md="8" :lg="6" :xl="1" v-for="shop in shops" :key="shop.id" class="padding-10">
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
          image: 'https://shadow.elemecdn.com/app/element/hamburger.9cf7b091-55e9-11e9-a976-7f4d0b07eef6.png',
          category: { name: 'Category 1', id: 1 }
        },
        {
          id: 2,
          name: 'Tienda María',
          address: 'Calle Falsa 456',
          image: 'https://shadow.elemecdn.com/app/element/hamburger.9cf7b091-55e9-11e9-a976-7f4d0b07eef6.png',
          category: { name: 'Category 2', id: 2 }
        },
        {
          id: 3,
          name: 'Tienda Manolo',
          address: 'Calle Falsa 123',
          image: 'https://shadow.elemecdn.com/app/element/hamburger.9cf7b091-55e9-11e9-a976-7f4d0b07eef6.png',
          category: { name: 'Category 3', id: 3 }
        },
        {
          id: 4,
          name: 'Tienda María',
          address: 'Calle Falsa 456',
          image: 'https://shadow.elemecdn.com/app/element/hamburger.9cf7b091-55e9-11e9-a976-7f4d0b07eef6.png',
          category: { name: 'Category 4', id: 4 }
        },
        {
          id: 5,
          name: 'Tienda Manolo',
          address: 'Calle Falsa 123',
          image: 'https://shadow.elemecdn.com/app/element/hamburger.9cf7b091-55e9-11e9-a976-7f4d0b07eef6.png',
          category: { name: 'Category 5', id: 5 }
        },
        {
          id: 6,
          name: 'Tienda María',
          address: 'Calle Falsa 456',
          image: 'https://shadow.elemecdn.com/app/element/hamburger.9cf7b091-55e9-11e9-a976-7f4d0b07eef6.png',
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
