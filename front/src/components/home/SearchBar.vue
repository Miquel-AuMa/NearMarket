<template>
  <div>
    <el-input
        placeholder="Buscador"
        v-model="searchText"
        clearable
        @keyup.native="prepareSearch">
    </el-input>
    <el-radio v-model="searchType" label="1" @change="search">Producto</el-radio>
    <el-radio v-model="searchType" label="2" @change="search">Lugar</el-radio>
  </div>
</template>

<script>
export default {
  name: 'SearchBar',
  data () {
    return {
      searchText: '',
      searchType: '1',
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
</style>
