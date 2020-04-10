<template>
  <div class="home">
    <SearchBar></SearchBar>
  </div>
</template>

<script>
// @ is an alias to /src
import SearchBar from '@/components/home/SearchBar.vue'
export default {
  name: 'Home',
  components: {
    SearchBar
  }
}
</script>
