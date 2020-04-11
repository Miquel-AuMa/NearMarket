<template>
  <div class="card-container">
    <el-row :gutter="10" justify="center">
      <el-col :xs="24" :sm="12" :md="8" :lg="6" v-for="(element, index) in filteredElements" :key="index" class="p-sm">
        <router-link :to="{ name: link, params: {id: element.id} }" class="card-style" v-if="getSearchType === 'places'">
          <Card :element="element" :type="getSearchType"/>
        </router-link>
        <Card :element="element" :type="getSearchType" v-else/>
      </el-col>
    </el-row>
  </div>
</template>

<script>
import { mapGetters } from 'vuex'
import Card from './Card'

export default {
  name: 'CardsContainer',
  props: {
    default: {
      type: String
    }
  },
  components: { Card },

  computed: {
    link () {
      return this.getSearchType === 'places' ? 'shop' : 'product'
    },
    getSearchType () {
      return this.default ? this.default : this.getSearchType
    },
    ...mapGetters('products', ['filteredElements', 'getSearchType'])
  }

}
</script>
<style scoped>
  .card-style {
    text-decoration: none;
  }
</style>
