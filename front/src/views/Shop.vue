<template>
  <div class="home">
    <SearchBar :showButtons="showButtons" :default="type"/>
    <ShopInfo :shop="shop"/>
    <CardsContainer :default="type"/>
  </div>
</template>

<script>
// @ is an alias to /src
import CardsContainer from '@/components/home/CardsContainer.vue'
import SearchBar from '@/components/home/SearchBar.vue'
import ShopInfo from '@/components/shop/ShopInfo.vue'
import { mapGetters } from 'vuex'
export default {
  name: 'Home',
  data () {
    return {
      showButtons: false,
      type: 'products'
    }
  },
  computed: {
    ...mapGetters('products', ['shop'])
  },
  components: {
    CardsContainer,
    SearchBar,
    ShopInfo
  }
}
</script>
