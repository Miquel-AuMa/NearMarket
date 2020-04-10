<template>
  <div id="app">
    <el-container>
      <el-header>
        <NavBar/>
      </el-header>
      <el-main>
          <Home></Home>
      </el-main>
    </el-container>
  </div>

</template>

<script>
import Home from '@/views/Home.vue'
import NavBar from '@/components/generic/NavBar.vue'

export default {
  name: 'app',
  components: {
    Home,
    NavBar
  }
}
</script>

<style>
  #app {
    font-family: 'Avenir', Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    text-align: center;
    color: #2c3e50;
  }
</style>
