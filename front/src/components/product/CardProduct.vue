<template>
  <router-link :to="{ name: 'product-home' }" class="card-style">

  <el-card :body-style="{ padding: '0px' }">
    <img :src="product.image" class="image">
    <div style="padding: 14px;">
      <span>{{product.name}}</span>
      <div class="bottom clearfix">
        <address class="time">{{product.address}}</address>
        <p class="description-card">
          {{product.description}}
        </p>
        <div class="separator"></div>
        <div class="padding-10">
          <el-tag>{{product.category.name}}</el-tag>
        </div>
      </div>
    </div>
  </el-card>
  </router-link>

</template>

<script>

export default {
  props: {
    product: {
      type: Object
    }
  }
}
</script>

<style scoped>
  .description-card{
    font-size: 13px;
    color: #999;
    text-align: justify;
  }
  .card-style {
    text-decoration: none;
  }
  .separator{
    border-bottom: 2px solid darkgrey;
    padding: 10px 4px;
  }
  .time {
    font-size: 13px;
    color: #999;
  }

  .bottom {
    margin-top: 13px;
    line-height: 12px;
  }

  .button {
    padding: 0;
    float: right;
  }

  .image {
    width: 100%;
    display: block;
    max-height: 150px;
    object-fit: cover;
  }

  .clearfix:before,
  .clearfix:after {
    display: table;
    content: "";
  }

  .clearfix:after {
    clear: both
  }
  .padding-10 {
    padding:10px;
  }
</style>
