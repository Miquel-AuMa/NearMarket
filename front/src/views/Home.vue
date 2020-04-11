<template>
  <div class="home">
    <SearchBar />
    <CardsContainer />
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
  }
}
</script>
