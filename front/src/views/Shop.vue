<template>
  <div class="home">
    <SearchBar :showButtons="showButtons" :default="type"/>
    <ShopInfo/>
    <CardsContainer :default="type"/>
  </div>
</template>

<script>
// @ is an alias to /src
import CardsContainer from '@/components/home/CardsContainer.vue'
import SearchBar from '@/components/home/SearchBar.vue'
import ShopInfo from '@/components/shop/ShopInfo.vue'

export default {
  name: 'Home',
  props: {
    id: {
      type: String,
      required: true
    }
  },
  data () {
    return {
      showButtons: false,
      type: 'products'
    }
  },
  components: {
    CardsContainer,
    SearchBar,
    ShopInfo
  }
}
</script>
