<template>
  <div class="container-shop">
    <div class="margin-10">

      <el-row>
        <el-col :xs="24" :sm="24" :md="12">
          <h1 class="padding-10">{{shop.name}}</h1>
          <h3>Horario: {{shop.schedule}}</h3>
          <address>{{shop.address}}</address>
          <p>{{shop.description}}</p>
        </el-col>
        <el-col :xs="24" :sm="24" :md="12">
          <div>
            <el-avatar :size="150" :src="shop.image"></el-avatar>
          </div>
          <div>
            <el-button icon="el-icon-phone" type="secondary">Llámame</el-button>
          </div>
        </el-col>
      </el-row>
      <p></p>
    </div>
  </div>

</template>

<script>
export default {
  name: 'ShopInfo',
  props: {
    shop: {
      type: Object,
      default: () => {
        return {
          id: 1,
          name: 'Tienda Manolo',
          address: 'Calle Falsa 123',
          schedule: '9:00 a 18:00 de L-S',
          description: 'La tienda de manolo de toda la vida del seño, que tiene de todo lo que necesitas, bueno, bonito y barato',
          image: 'https://images.unsplash.com/photo-1546237769-6f84ec1a512a?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=80',
          category: {
            name: 'Category 1',
            id: 1
          }
        }
      }
    }
  }
}
</script>

<style scoped>
  .container-shop {
    height: 300px;
    background-image: linear-gradient(to bottom, transparent, rgba(170, 249, 169, 0.44), transparent);
    padding: 0 20px;
  }

  .avatar-shop {
    display: flex;
    align-items: center;
  }

  .padding-10 {
    padding: 10px;
  }

  .margin-10 {
    margin: 10px;
  }
</style>
