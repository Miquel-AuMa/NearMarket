<template>
  <el-container>
    <el-header>
      <NavBar />
    </el-header>

    <el-main>
      <router-view />
        <!-- <home /> -->
    </el-main>
  </el-container>
</template>

<script>
import NavBar from '@/components/generic/NavBar.vue'

export default {
  name: 'LoginLayout',

  components: { NavBar }
}
</script>
