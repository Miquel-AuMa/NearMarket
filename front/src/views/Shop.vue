<template>
  <div class="home">
    <SearchBar />
    <ShopInfo/>
    <CardsContainer :default="'products'"/>
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
  components: {
    CardsContainer,
    SearchBar,
    ShopInfo
  }
}
</script>
