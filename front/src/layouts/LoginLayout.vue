<template>
  <el-container>
    <el-header>
      <nav-bar />
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
  name: 'MainLayout',

  components: { NavBar }
}
