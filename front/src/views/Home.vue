<template>
  <div class="home">
    <SearchBar :showButtons="showButtons" :default="type"/>
    <CardsContainer :default="type"/>
  </div>
</template>

<script>
// @ is an alias to /src
import CardsContainer from '@/components/home/CardsContainer.vue'
import SearchBar from '@/components/home/SearchBar.vue'

export default {
  name: 'Home',
  components: {
    CardsContainer,
    SearchBar
  },
  data () {
    return {
      showButtons: false,
      type: 'places'
    }
  },
  mounted () {
    this.$store.dispatch('products/fetchShops')
  }
}
</script>
