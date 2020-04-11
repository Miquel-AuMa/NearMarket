<template>
  <router-link :to="{ name: 'element-home' }" class="card-style">
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
        </div>
      </div>
    </el-card>
  </router-link>
</template>

<script>
export default {
  props: {
    element: {
      type: Object
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

  .card-style {
    text-decoration: none;
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
