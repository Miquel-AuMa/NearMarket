<template>
  <div class="card-container">
    <el-row :gutter="10" justify="center">
      <el-col :xs="24" :sm="12" :md="8" :lg="6" v-for="(element, index) in filteredElements" :key="index" class="p-sm">
        <Card :element="element" :type="getSearchType"/>
      </el-col>
    </el-row>
  </div>
</template>

<script>
import { mapGetters } from 'vuex'
import Card from './Card'

export default {
  name: 'CardsContainer',

  components: { Card },

  computed: mapGetters('products', ['filteredElements', 'getSearchType'])

}
</script>
