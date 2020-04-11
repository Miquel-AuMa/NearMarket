<template>
  <div class="centered">
    <login />
  </div>
</template>

<script>
import Login from '@/components/auth/Login.vue'

export default {
  name: 'LoginView',

  components: { Login }
}
</script>

<style scoped>
  .centered {
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
  }
</style>
