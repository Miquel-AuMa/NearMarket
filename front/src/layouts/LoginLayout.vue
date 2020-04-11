<template>
  <el-container>
    <el-header>
      <nav-bar />
    </el-header>

    <el-main>
      <router-view />
        <!-- <login /> -->
    </el-main>
  </el-container>
</template>

<script>
import NavBar from '@/components/generic/NavBar.vue'

export default {
  name: 'MainLayout',

  components: { NavBar }
}
</script>
