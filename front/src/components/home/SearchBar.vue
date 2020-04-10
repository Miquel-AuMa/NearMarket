<template>
  <div>
    <div class="searchbar">
      <el-row justify="center">
        <el-input
          placeholder="Buscador"
          v-model="searchText"
          clearable
          @keyup.native="prepareSearch">
        </el-input>
        <div class="padding-10">
          <el-radio v-model="searchType" label="products" @change="search">Producto</el-radio>
          <el-radio v-model="searchType" label="places" @change="search">Lugar</el-radio>
        </div>

      </el-row>
    </div>
    <div>
      <CardsShopContainer v-if="searchType === 'places'"></CardsShopContainer>
      <CardsProductContainer v-if="searchType === 'products'"></CardsProductContainer>
    </div>
  </div>

</template>

<script>
import CardsShopContainer from '@/components/shop/CardsShopContainer.vue'
import CardsProductContainer from '@/components/product/CardsProductContainer.vue'
export default {
  name: 'SearchBar',
  components: {
    CardsProductContainer,
    CardsShopContainer
  },
  data () {
    return {
      searchText: '',
      searchType: 'places',
      searchTimeout: {}
    }
  },
  methods: {
    search: function () {
      console.log('Buscador [' + this.searchType + ']: ' + this.searchText)
    },
    prepareSearch: function () {
      window.clearTimeout(this.searchTimeout)
      this.searchTimeout = window.setTimeout(this.search, 500)
    }
  }
}
</script>

<style scoped>
  .searchbar {
    width: 80%;
    margin: 0 auto;
  }
  .padding-10{
    padding:10px;
  }
</style>
