<template>
  <div class="home">
    <SearchBar></SearchBar>
    <CardsShopContainer></CardsShopContainer>
  </div>
</template>

<script>
// @ is an alias to /src
import CardsShopContainer from '@/components/CardsShopContainer'
import SearchBar from '@/components/home/SearchBar.vue'
export default {
  name: 'Home',
  components: {
    CardsShopContainer,
    SearchBar
  }
}
</script>
