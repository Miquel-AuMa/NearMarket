<template>
  <Form :product="product" @submit="submit"></Form>
</template>

<script>
import Form from './Form'

export default {
  name: 'Create',
  data () {
    return {
      product: {}
    }
  },
  methods: {
    submit (productData) {
      console.log('Submit ' + JSON.stringify(productData))
    }
  },
  components: {
    Form
  }
}
</script>

<style scoped>
</style>
