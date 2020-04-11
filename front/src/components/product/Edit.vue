<template>
  <Form :product="product" @submit="submit" v-loading="loading"></Form>
</template>

<script>
import Form from './Form'

export default {
  name: 'Edit',
  data () {
    return {
      loading: true,
      product: {}
    }
  },
  mounted () {
    this.getProduct()
  },
  methods: {
    submit (productData) {
      console.log('Submit ' + JSON.stringify(productData))
    },
    getProduct () {
      setTimeout(() => {
        this.product = {
          id: 1,
          name: 'Nombre',
          description: 'Descripción',
          category: { id: 1, name: 'Pan', description: '' },
          price: 1.5,
          photo: 'https://www.recetasdepan.net/wp-content/uploads/2019/05/Receta-de-pan-baguette.jpg'
        }
        this.loading = false
      }, 500)
    }
  },
  components: {
    Form
  }
}
</script>
