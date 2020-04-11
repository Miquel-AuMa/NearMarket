<template>
  <div class="searchbar">
    <el-row justify="center">
      <el-input placeholder="Buscador" v-model="searchText" clearable @input="search" />

      <div class="p-sm">
        <el-radio v-model="searchType" label="products" @change="search">
          Producto
        </el-radio>
        <el-radio v-model="searchType" label="places" @change="search">
          Lugar
        </el-radio>
      </div>
    </el-row>
  </div>
</template>

<script>

export default {
  name: 'SearchBar',

  data () {
    return {
      searchText: '',
      searchType: 'places',
      searchTimeout: {}
    }
  },

  methods: {
    search () {
      this.$store.dispatch('products/setSearchBar', {
        text: this.searchText,
        type: this.searchType
      })
    }
  },

  mounted () {
    this.$store.dispatch('products/blankSearchBar')
  }
}
</script>

<style scoped>
  .searchbar {
    width: 80%;
    margin: 0 auto;
  }
</style>
