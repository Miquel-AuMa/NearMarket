<template>
  <div id="app">
    <el-container>
      <el-header>
        <NavBar/>
      </el-header>
      <el-main>
          <Home />
      </el-main>
    </el-container>
  </div>

</template>

<script>
import Home from '@/views/Home.vue'
import NavBar from '@/components/generic/NavBar.vue'
import './assets/style.scss'

export default {
  name: 'app',
  components: {
    Home,
    NavBar
  }
}
</script>
